<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Symfony\Component\Finder\Finder;
use ReflectionClass;

class HwsAudit extends Command
{
    protected $signature = 'hws:audit
        {--views : Solo verificar vistas (@include/@extends/make/view)}
        {--routes : Solo verificar llamadas route()}
        {--methods : Solo verificar metodos estaticos Class::method()}
        {--compile : Solo compilar todas las vistas Blade}
        {--http : Ejecutar smoke test HTTP de rutas GET}
        {--http-all : Smoke test incluyendo rutas con parametros (usa valores dummy)}';

    protected $description = 'Auditoria estatica completa: vistas faltantes, metodos inexistentes, parametros de ruta incorrectos, compilacion Blade y smoke test HTTP.';

    private $errors = 0;
    private $warnings = 0;
    private $checks = 0;

    public function handle()
    {
        $only = $this->option('views') || $this->option('routes') || $this->option('methods') || $this->option('compile') || $this->option('http') || $this->option('http-all');

        $this->info("=================================================");
        $this->info("  HORSES WORLD SALE - AUDITORIA ESTATICA 10/10  ");
        $this->info("=================================================\n");

        if (!$only || $this->option('views'))   $this->checkViews();
        if (!$only || $this->option('routes'))  $this->checkRoutes();
        if (!$only || $this->option('methods')) $this->checkMethods();
        if (!$only || $this->option('compile')) $this->checkCompile();
        if ($this->option('http') || $this->option('http-all')) $this->checkHttp();

        $this->info("\n=================================================");
        $this->line("  Verificaciones realizadas: <info>{$this->checks}</info>");
        $this->line("  Errores encontrados:        <fg=red>{$this->errors}</fg=red>");
        $this->line("  Avisos:                      <fg=yellow>{$this->warnings}</fg=yellow>");
        if ($this->errors === 0) {
            $this->info("  RESULTADO: SIN ERRORES CRITICOS");
        } else {
            $this->error("  RESULTADO: HAY ERRORES A CORREGIR (ver arriba)");
        }
        $this->info("=================================================");

        return $this->errors > 0 ? 1 : 0;
    }

    /**
     * Seccion 1: Vistas referenciadas pero inexistentes.
     * Detecta @include, @extends, $__env->make(), view(), View::make() con string literal.
     */
    private function checkViews()
    {
        $this->info("\n--- [1] Vistas: @include / @extends / make() / view() ---");
        $viewsDir = resource_path('views');
        $files = (new Finder())->in($viewsDir)->name('*.blade.php')->files();
        $referenced = [];
        $scanned = 0;

        foreach ($files as $f) {
            $scanned++;
            $content = file_get_contents($f->getRealPath());
            $patterns = [
                "/@include\s*\(\s*'([^']+)'/",
                "/@include\s*\(\s*\"([^\"]+)\"/",
                "/@includeIf\s*\(\s*'([^']+)'/",
                "/@includeWhen\s*\([^,]+,\s*'([^']+)'/",
                "/@includeFirst\s*\([^,]+,\s*'([^']+)'/",
                "/@extends\s*\(\s*'([^']+)'/",
                "/@extends\s*\(\s*\"([^\"]+)\"/",
                "/view\s*\(\s*'([^']+)'/",
                "/view\s*\(\s*\"([^\"]+)\"/",
                "/View::make\s*\(\s*'([^']+)'/",
                "/\\\$__env->make\s*\(\s*'([^']+)'/",
                "/->make\s*\(\s*'([^']+)'/",
            ];
            foreach ($patterns as $p) {
                if (preg_match_all($p, $content, $m)) {
                    foreach ($m[1] as $name) {
                        $referenced[] = [$name, $f->getRelativePathname()];
                    }
                }
            }
        }

        $unique = array_unique(array_map(fn($x) => $x[0], $referenced));
        $missing = [];
        foreach ($unique as $name) {
            $this->checks++;
            if (!View::exists($name)) {
                $missing[] = $name;
                $this->errors++;
            }
        }

        $this->line("  Vistas Blade escaneadas: {$scanned}");
        $this->line("  Vistas referenciadas (unicas): " . count($unique));
        if (empty($missing)) {
            $this->line("  <info>[OK] Todas las vistas referenciadas existen.</info>");
        } else {
            $this->line("  <fg=red>[FAIL] Vistas faltantes (" . count($missing) . "):</fg=red>");
            foreach ($missing as $m) {
                $this->line("    - {$m}");
            }
        }
    }

    /**
     * Seccion 2: Llamadas route('Name', [params]) en vistas.
     * Verifica que el nombre de ruta exista y que las claves coincidan con los parametros de la ruta.
     */
    private function checkRoutes()
    {
        $this->info("\n--- [2] Rutas: route('name', [...]) ---");
        $viewsDir = resource_path('views');
        $files = (new Finder())->in($viewsDir)->name('*.blade.php')->files();
        $routeNames = [];
        $scanned = 0;

        foreach ($files as $f) {
            $scanned++;
            $content = file_get_contents($f->getRealPath());
            // route('Name') y route('Name', [...])
            if (preg_match_all("/route\s*\(\s*'([^']+)'(?:\s*,\s*(\[.*?\]))?/", $content, $m, PREG_OFFSET_CAPTURE)) {
                foreach ($m[1] as $idx => $nameMatch) {
                    $name = $nameMatch[0];
                    $paramStr = isset($m[2][$idx][0]) ? $m[2][$idx][0] : '';
                    $routeNames[] = [$name, $paramStr, $f->getRelativePathname(), $nameMatch[1]];
                }
            }
        }

        $undefined = [];
        $paramMismatch = [];

        foreach ($routeNames as $entry) {
            [$name, $paramStr, $file, $col] = $entry;
            $this->checks++;
            if (!Route::has($name)) {
                $undefined[] = [$name, $file];
                $this->errors++;
                continue;
            }
            // Verificar parametros si se paso un array
            if ($paramStr !== '') {
                $route = Route::getRoutes()->getByName($name);
                if ($route) {
                    $expected = $route->parameterNames();
                    $passed = $this->extractArrayKeys($paramStr);
                    if ($passed !== null) {
                        foreach ($passed as $key) {
                            if (!in_array($key, $expected, true)) {
                                $paramMismatch[] = [$name, $key, implode(',', $expected), $file];
                                $this->errors++;
                            }
                        }
                    }
                }
            }
        }

        $this->line("  Vistas escaneadas: {$scanned}");
        $this->line("  Llamadas route() encontradas: " . count($routeNames));
        if (empty($undefined)) {
            $this->line("  <info>[OK] Todas las rutas referenciadas estan definidas.</info>");
        } else {
            $this->line("  <fg=red>[FAIL] Rutas no definidas (" . count($undefined) . "):</fg=red>");
            foreach ($undefined as $u) {
                $this->line("    - route('{$u[0]}') en {$u[1]}");
            }
        }
        if (empty($paramMismatch)) {
            $this->line("  <info>[OK] Parametros de ruta correctos.</info>");
        } else {
            $this->line("  <fg=red>[FAIL] Parametros incorrectos (" . count($paramMismatch) . "):</fg=red>");
            foreach ($paramMismatch as $p) {
                $this->line("    - route('{$p[0]}') usa '{$p[1]}' pero la ruta espera [{$p[2]}] en {$p[3]}");
            }
        }
    }

    /**
     * Extrae las claves de un array literal PHP pasado como string: ['slug'=>$x] -> ['slug']
     */
    private function extractArrayKeys($str)
    {
        if (!preg_match('/^\s*\[(.*)\]\s*$/s', $str, $m)) return null;
        $inner = $m[1];
        $keys = [];
        if (preg_match_all("/'([a-zA-Z_][a-zA-Z0-9_]*)'\s*=>/", $inner, $km)) {
            $keys = $km[1];
        }
        if (preg_match_all('/"([a-zA-Z_][a-zA-Z0-9_]*)"\s*=>/', $inner, $km2)) {
            $keys = array_merge($keys, $km2[1]);
        }
        return $keys;
    }

    /**
     * Seccion 3: Llamadas estaticas Class::method() en controladores y vistas.
     * Verifica metodos inexistentes en clases App\* o que extiendan Model.
     */
    private function checkMethods()
    {
        $this->info("\n--- [3] Metodos: Class::method() en controladores y vistas ---");
        $dirs = [
            app_path('Http/Controllers'),
            app_path('Models'),
            resource_path('views'),
        ];
        $calls = [];
        foreach ($dirs as $dir) {
            if (!is_dir($dir)) continue;
            $files = (new Finder())->in($dir)->name('*.php')->files();
            foreach ($files as $f) {
                $content = file_get_contents($f->getRealPath());
                // ClassName::method(  (ClassName empieza en mayuscula)
                if (preg_match_all('/\b([A-Z][a-zA-Z0-9_]*)::([a-zA-Z_][a-zA-Z0-9_]*)\s*\(/', $content, $m)) {
                    foreach ($m[1] as $idx => $cls) {
                        $calls[] = [$cls, $m[2][$idx], $f->getRelativePathname()];
                    }
                }
            }
        }

        // Metodos magicos de Eloquent/Builder que se resuelven via __callStatic/__call.
        // No se pueden verificar estaticamente (no estan declarados en la clase) pero funcionan en runtime.
        $eloquentMagic = [
            'find','findOrFail','findOrNew','findornew','first','firstOrFail','firstOrNew','firstOrCreate','firstWhere',
            'get','all','count','exists','doesntExist','max','min','sum','avg','average','pluck','value',
            'toArray','toJson','toBase','toSql','toRawSql','dump','dd',
            'create','make','forceCreate','updateOrCreate','firstOrNew','findOrNew',
            'where','orWhere','whereIn','whereNotIn','whereNull','whereNotNull','whereBetween','whereNotBetween',
            'whereDate','whereMonth','whereDay','whereYear','whereTime','whereColumn','whereExists','whereNotExists',
            'whereHas','whereDoesntHave','wherePivot','wherePivotIn','wherePivotNotIn','whereJsonContains','whereJsonLength',
            'has','doesntHave','orHas','orDoesntHave','with','withCount','withMax','withMin','withSum','withAvg',
            'orderBy','orderByDesc','orderByRaw','latest','oldest','reorder','skip','take','limit','offset','forPage',
            'paginate','simplePaginate','cursorPaginate','chunk','chunkById','chunkMap','each','eachById','cursor','lazy','lazyById',
            'map','mapWithKeys','mapSpread','mapToDictionary','mapToGroups','mapInto','filter','reject',
            'sort','sortBy','sortByDesc','sortByMany','values','keys','flatten','unique','uniqueStrict','flip','reverse','pad','split',
            'groupBy','groupByRaw','having','havingRaw','havingBetween','distinct','select','addSelect','selectRaw','selectSub',
            'from','fromRaw','fromSub','join','leftJoin','rightJoin','crossJoin','joinSub','leftJoinSub','rightJoinSub','fullJoin',
            'union','unionAll','unionDistinct','insert','insertGetId','insertOrIgnore','insertUsing',
            'update','updateOrInsert','updateExistingPivot','delete','forceDelete','truncate','restore',
            'save','push','saveMany','saveManyQuietly','refresh','load','loadMissing','loadMorph','loadCount','loadAggregate',
            'fill','forceFill','fillAttributes','mergeFillable','mergeCasts','mergeHidden','mergeVisible',
            'setAttribute','getAttribute','getAttributes','getOriginal','getRawOriginal','setRawAttributes',
            'getVisible','setVisible','getHidden','setHidden','setAppends','getAppends','append','hasAppends',
            'getRelationValue','setRelation','setRelations','unsetRelation','unsetRelations','getRelations',
            'relationsToArray','attributesToArray','syncOriginal','syncOriginalAttribute','syncChanges',
            'isClean','isDirty','wasChanged','getChanges','getDirty','originalIsEquivalent','getMutatedAttributes',
            'observe','on','resolveConnection','getConnection','setConnection','table','setTable',
            'getKeyName','setKeyName','getQualifiedKeyName','getKey','getQueueableId','getQueueableRelations',
            'getRouteKey','getRouteKeyName','setKeyType','getKeyType','getIncrementing','setIncrementing','getPerPage','setPerPage',
            'scopes','withoutGlobalScopes','withoutGlobalScope','withGlobalScope','applyScopes','callScope',
            'newQuery','newModelQuery','newEloquentBuilder','newCollection','newPivot','newRelatedInstanceFor',
            'withTrashed','onlyTrashed','withoutTrashed','only','fresh','is','isNot',
            'when','unless','tap','pipe','unlessEmpty','whenEmpty','eachSpread','partition','collapse','combine','zip','wrap','unwrap',
            'beginTransaction','commit','rollBack','transaction','savepoint','rollbackToSavepoint','rollbackSavepoint',
            'getQualifiedDomainName','qualifyColumn','getColumnType','hasCast','hasGetMutator','hasSetMutator',
            'belongsToMany','hasManyThrough','hasOneThrough','morphToMany','morphedByMany','morphTo','morphOne','morphMany',
            'belongsTo','hasOne','hasMany','through',
        ];

        $unique = array_unique(array_map(fn($x) => $x[0] . '::' . $x[1], $calls));
        $missing = [];
        $checkedClasses = [];

        foreach ($unique as $key) {
            [$cls, $method] = explode('::', $key, 2);
            $this->checks++;

            $resolved = $this->resolveClass($cls);
            if ($resolved === null) continue; // clase no resolvable (facade, helper externo)

            // Solo auditar clases App\* o que extiendan Model
            $isApp = str_starts_with($resolved, 'App\\');
            $isModel = is_subclass_of($resolved, \Illuminate\Database\Eloquent\Model::class);
            if (!$isApp && !$isModel) continue;

            if (!class_exists($resolved)) continue;
            $checkedClasses[] = $resolved;
            $rc = new ReflectionClass($resolved);

            // 1. Metodo declarado (real, heredado o propio)
            if ($rc->hasMethod($method)) continue;

            // 2. Scope Eloquent: metodo 'valido' -> existe 'scopeValido'
            $scopeMethod = 'scope' . ucfirst($method);
            if ($rc->hasMethod($scopeMethod)) continue;

            // 3. Metodos magicos de Eloquent/Builder (find, where, get, first, etc.)
            if (in_array($method, $eloquentMagic, true)) continue;

            // 4. Metodos que empiezan con prefijos de Builder (where*, orderBy*, having*, join*, etc.)
            $builderPrefixes = ['where','order','group','having','join','left','right','inner','cross','union','select','from','insert','update','delete','distinct','limit','offset','skip','take','forPage','paginate','chunk','each','cursor','lazy','with','has','or','scope','setRaw','getRaw','sync'];
            $skip = false;
            foreach ($builderPrefixes as $pfx) {
                if (str_starts_with(strtolower($method), strtolower($pfx))) {
                    // Excepcion: setXxx, getXxx de dominio (no de Builder) -> no saltar
                    if (in_array($pfx, ['where','order','group','having','join','left','right','inner','cross','union','select','from','insert','update','delete','distinct','limit','offset','skip','take','forPage','paginate','chunk','each','cursor','lazy','with','has','or','scope'], true)) {
                        $skip = true;
                        break;
                    }
                }
            }
            if ($skip) continue;

            $missing[] = [$cls, $method, $resolved];
            $this->errors++;
        }

        $this->line("  Llamadas estaticas encontradas: " . count($unique));
        $this->line("  Clases App/Model verificadas: " . count(array_unique($checkedClasses)));
        if (empty($missing)) {
            $this->line("  <info>[OK] Todos los metodos de dominio existen.</info>");
        } else {
            $this->line("  <fg=red>[FAIL] Metodos inexistentes (" . count($missing) . "):</fg=red>");
            foreach ($missing as $m) {
                $this->line("    - {$m[0]}::{$m[1]}()  (resuelve a {$m[2]})");
            }
        }
    }

    /**
     * Resuelve un nombre de clase corto a FQCN probando alias, App\Models\, App\Http\Controllers\.
     */
    private function resolveClass($shortName)
    {
        if (class_exists($shortName)) return $shortName;
        $candidates = [
            "App\\Models\\$shortName",
            "App\\Http\\Controllers\\$shortName",
            "App\\Models\\Base\\$shortName",
        ];
        foreach ($candidates as $c) {
            if (class_exists($c)) return $c;
        }
        return null;
    }

    /**
     * Seccion 4: Compila todas las vistas Blade para detectar errores de sintaxis.
     */
    private function checkCompile()
    {
        $this->info("\n--- [4] Compilacion Blade ---");
        $viewsDir = resource_path('views');
        $files = (new Finder())->in($viewsDir)->name('*.blade.php')->files();
        $compiler = app('blade.compiler');
        $failed = [];
        $total = 0;

        foreach ($files as $f) {
            $total++;
            $this->checks++;
            $path = $f->getRealPath();
            try {
                $compiler->compileString(file_get_contents($path));
            } catch (\Throwable $e) {
                $failed[] = [$f->getRelativePathname(), $e->getMessage()];
                $this->errors++;
            }
        }

        $this->line("  Vistas compiladas: {$total}");
        if (empty($failed)) {
            $this->line("  <info>[OK] Todas las vistas compilan sin errores.</info>");
        } else {
            $this->line("  <fg=red>[FAIL] Vistas con error de compilacion (" . count($failed) . "):</fg=red>");
            foreach ($failed as $f) {
                $this->line("    - {$f[0]}: {$f[1]}");
            }
        }
    }

    /**
     * Seccion 5: Smoke test HTTP de rutas GET.
     */
    private function checkHttp()
    {
        $this->info("\n--- [5] Smoke test HTTP (rutas GET) ---");
        $allRoutes = Route::getRoutes();
        $includeParam = $this->option('http-all');

        // Intentar login como admin si hay BD
        $admin = null;
        try {
            $admin = User::where('type', 0)->first() ?? User::first();
            if ($admin) Auth::login($admin);
        } catch (\Throwable $e) {
            $this->warn("  No se pudo autenticar (sin BD?): " . $e->getMessage());
        }

        $tested = 0;
        $passed = 0;
        $failed = [];
        $skipped = 0;

        foreach ($allRoutes as $route) {
            $methods = $route->methods();
            if (!in_array('GET', $methods, true)) continue;
            $uri = $route->uri();
            $params = $route->parameterNames();

            if (!empty($params)) {
                if (!$includeParam) {
                    $skipped++;
                    continue;
                }
                // Sustituir parametros con valores dummy
                foreach ($params as $p) {
                    $uri = str_replace('{' . $p . '}', '1', $uri);
                    $uri = preg_replace('/\{' . preg_quote($p, '/') . '\?}/', '1', $uri);
                }
            }

            $this->checks++;
            $tested++;
            try {
                $req = Request::create('https://horsesworldsale.com/' . ltrim($uri, '/'), 'GET');
                app()->instance('request', $req);
                \Illuminate\Support\Facades\Request::swap($req);
                $response = app()->handle($req);
                $status = $response->getStatusCode();
                if ($status >= 200 && $status < 400) {
                    $passed++;
                } elseif ($status == 401 || $status == 403) {
                    $passed++; // auth redirect es OK
                } else {
                    $failed[] = [$uri, $status, $route->getName() ?? ''];
                    $this->errors++;
                }
            } catch (\Throwable $e) {
                $failed[] = [$uri, 'EXC', $e->getMessage()];
                $this->errors++;
            }
        }

        $this->line("  Rutas GET probadas: {$tested} (saltadas con params: {$skipped})");
        $this->line("  Correctas: <info>{$passed}</info>");
        if (empty($failed)) {
            $this->line("  <info>[OK] Ninguna ruta devolvio error 5xx.</info>");
        } else {
            $this->line("  <fg=red>[FAIL] Rutas con errores (" . count($failed) . "):</fg=red>");
            foreach ($failed as $f) {
                $this->line("    - /{$f[0]} -> {$f[1]}" . (isset($f[2]) && $f[2] ? " ({$f[2]})" : ""));
            }
        }
    }
}
