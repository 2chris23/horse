<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Http\Request;

class TestAllSystem extends Command
{
    protected $signature = 'hws:test-all';
    protected $description = 'Ejecuta una batería completa de pruebas sobre base de datos, autenticación, rutas y paneles.';

    public function handle()
    {
        $this->info("=================================================");
        $this->info("   HORSES WORLD SALE - SUITE DE TEST INTEGRAL   ");
        $this->info("=================================================\n");

        // 1. Database
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

        // 2. Admin User
        $this->info("\n--- [2/4] Verificando Usuario Administrador ---");
        $admin = User::where('type', 0)->first() ?? User::where('email', 'admin@horse.com')->first();
        if (!$admin) {
            $this->warn("  [ALERTA] No se encontró usuario admin type=0. Buscando primer usuario...");
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

        // 3. Test Core Routes
        $this->info("\n--- [3/4] Probando Carga de Rutas y Vistas ---");

        $totalRoutes = count(app('router')->getRoutes());
        $this->line("  [INFO] Rutas registradas en memoria: {$totalRoutes}");
        foreach (['MyPage', 'MyInstalation', 'MyContact', 'MyGallery', 'MyVideo', 'MySell'] as $rn) {
            $this->line("  [INFO] Route::has('{$rn}') => " . (Route::has($rn) ? 'SI' : 'NO'));
        }
        if (is_file(base_path('bootstrap/cache/routes-v7.php'))) {
            $this->warn("  [ALERTA] Existe cache de rutas (bootstrap/cache/routes-v7.php). Si las rutas publicas fallan, ejecuta: php artisan route:clear");
        }

        $routesToTest = [
            ['uri' => '/', 'desc' => 'Portal Principal (portal.landing)'],
            ['uri' => '/login', 'desc' => 'Pantalla de Login (auth.login)'],
            ['uri' => '/admin/LogAs', 'desc' => 'Panel Admin - Usuarios (admin.landing)'],
            ['uri' => '/admin/Asociados', 'desc' => 'Panel Admin - Asociados'],
            ['uri' => '/panel/Caballos', 'desc' => 'Panel Ganadero - Listado Caballos'],
            ['uri' => '/panel/Caballos/Nuevo', 'desc' => 'Panel Ganadero - Publicar Caballo'],
            ['uri' => '/panel/MiPerfil', 'desc' => 'Panel Ganadero - Mi Perfil'],
            ['uri' => '/panel/Pais', 'desc' => 'Panel Ganadero - Países'],
            ['uri' => '/dnieves/Instalaciones', 'desc' => 'Pagina publica cliente - Instalaciones'],
            ['uri' => '/dnieves/Contacto', 'desc' => 'Pagina publica cliente - Contacto'],
        ];

        $passed = 0;
        $failed = 0;

        foreach ($routesToTest as $item) {
            $uri = $item['uri'];
            $desc = $item['desc'];

            try {
                $req = Request::create('https://horsesworldsale.com' . $uri, 'GET');
                app()->instance('request', $req);
                \Illuminate\Support\Facades\Request::swap($req);

                $response = app()->handle($req);
                $status = $response->getStatusCode();

                if ($status >= 200 && $status < 400) {
                    $this->line("  <info>[PASS {$status}]</info> {$uri} - {$desc}");
                    $passed++;
                } else {
                    $this->line("  <fg=red>[FAIL {$status}]</fg=red> {$uri} - {$desc}");
                    $failed++;
                }
            } catch (\Throwable $e) {
                $this->line("  <fg=red>[ERROR]</fg=red> {$uri} - {$desc}");
                $this->error("    " . $e->getMessage() . " en " . $e->getFile() . ":" . $e->getLine());
                $failed++;
            }
        }

        // 4. Summary
        $this->info("\n--- [4/4] Resumen de Pruebas ---");
        $this->line("  Total probadas: " . ($passed + $failed));
        $this->line("  Correctas: <info>{$passed}</info>");
        if ($failed > 0) {
            $this->line("  Con errores: <fg=red>{$failed}</fg=red>");
        } else {
            $this->info("  ¡TODAS LAS PRUEBAS PASARON EXITOSAMENTE!");
        }

        return $failed > 0 ? 1 : 0;
    }
}
