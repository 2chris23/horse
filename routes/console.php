<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
});

Artisan::command('hws:test-all', function () {
    $this->info("=================================================");
    $this->info("   HORSES WORLD SALE - SUITE DE TEST INTEGRAL   ");
    $this->info("=================================================\n");

    // 1. Base de datos
    $this->info("--- [1/4] Verificando Base de Datos ---");
    try {
        $dbName = DB::connection()->getDatabaseName();
        $userCount = DB::table('users')->count();
        $horseCount = DB::table('horses')->count();
        $studCount = DB::table('studs')->count();

        $this->line("  [OK] Conectado a BD: <info>{$dbName}</info>");
        $this->line("  [OK] Usuarios: {$userCount} | Caballos: {$horseCount} | Ganaderías: {$studCount}");
    } catch (\Throwable $e) {
        $this->error("  [ERROR DB] " . $e->getMessage() . " en " . $e->getFile() . ":" . $e->getLine());
        return 1;
    }

    // 2. Usuario Administrador
    $this->info("\n--- [2/4] Verificando Usuario Administrador ---");
    $admin = User::where('type', 0)->first() ?? User::where('email', 'admin@horse.com')->first();
    if (!$admin) {
        $admin = User::first();
    }

    if ($admin) {
        $this->line("  [OK] Usuario de prueba: <info>{$admin->email}</info> (ID: {$admin->id}, Tipo: {$admin->type})");
        Auth::login($admin);
        $this->line("  [OK] Autenticación simulada: " . (Auth::check() ? 'CORRECTO' : 'FALLIDO'));
    } else {
        $this->error("  [ERROR] No hay usuarios en la base de datos.");
        return 1;
    }

    // 3. Rutas principales
    $this->info("\n--- [3/4] Probando Carga de Controladores y Vistas ---");

    $routesToTest = [
        ['uri' => '/', 'desc' => 'Portal Principal (portal.landing)'],
        ['uri' => '/login', 'desc' => 'Pantalla de Login (auth.login)'],
        ['uri' => '/admin/LogAs', 'desc' => 'Panel Admin - Usuarios (admin.landing)'],
        ['uri' => '/admin/Asociados', 'desc' => 'Panel Admin - Asociados'],
        ['uri' => '/panel/Caballos', 'desc' => 'Panel Ganadero - Listado Caballos'],
        ['uri' => '/panel/Caballos/Nuevo', 'desc' => 'Panel Ganadero - Publicar Caballo'],
        ['uri' => '/panel/MiPerfil', 'desc' => 'Panel Ganadero - Mi Perfil'],
        ['uri' => '/panel/Pais', 'desc' => 'Panel Ganadero - Países'],
    ];

    $passed = 0;
    $failed = 0;

    foreach ($routesToTest as $item) {
        $uri = $item['uri'];
        $desc = $item['desc'];

        try {
            $req = Request::create('https://horsesworldsale.com' . $uri, 'GET');
            $req->setLaravelSession(app('session')->driver());
            app()->instance('request', $req);
            \Illuminate\Support\Facades\Request::swap($req);

            $route = app('router')->getRoutes()->match($req);

            if ($route->isControllerAction()) {
                $controllerClass = $route->getControllerClass();
                $method = $route->getActionMethod();
                $controller = app($controllerClass);
                $result = $controller->callAction($method, $route->parametersWithoutNulls());
            } else {
                $result = $route->run();
            }

            $content = '';
            if ($result instanceof \Illuminate\Contracts\View\View) {
                $content = $result->render();
            } elseif ($result instanceof \Symfony\Component\HttpFoundation\Response) {
                $content = $result->getContent();
            } elseif (is_string($result)) {
                $content = $result;
            }

            $this->line("  <info>[PASS 200]</info> {$uri} - {$desc} (" . strlen($content) . " bytes)");
            $passed++;
        } catch (\Throwable $e) {
            $this->line("  <fg=red>[FAIL 500]</fg=red> {$uri} - {$desc}");
            $this->error("    " . $e->getMessage() . " en " . $e->getFile() . ":" . $e->getLine());
            $failed++;
        }
    }

    // 4. Resumen
    $this->info("\n--- [4/4] Resumen de Pruebas ---");
    $this->line("  Total probadas: " . ($passed + $failed));
    $this->line("  Correctas: <info>{$passed}</info>");
    if ($failed > 0) {
        $this->line("  Con errores: <fg=red>{$failed}</fg=red>");
    } else {
        $this->info("  ¡TODAS LAS PRUEBAS PASARON EXITOSAMENTE!");
    }

    return $failed > 0 ? 1 : 0;
});
