<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

header('Content-Type: text/html; charset=utf-8');

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>HWS - Super Test Suite</title>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif; background: #0f172a; color: #f8fafc; margin: 0; padding: 20px; }
        .container { max-width: 1200px; margin: 0 auto; }
        h1 { color: #38bdf8; font-size: 24px; border-bottom: 2px solid #1e293b; padding-bottom: 10px; }
        .card { background: #1e293b; border-radius: 8px; padding: 15px 20px; margin-bottom: 15px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1); }
        .success { color: #4ade80; font-weight: bold; }
        .danger { color: #f87171; font-weight: bold; }
        .warning { color: #fbbf24; font-weight: bold; }
        .badge { display: inline-block; padding: 2px 8px; border-radius: 4px; font-size: 12px; font-weight: bold; }
        .badge-get { background: #0284c7; color: white; }
        .badge-post { background: #16a34a; color: white; }
        .badge-200 { background: #15803d; color: white; }
        .badge-302 { background: #b45309; color: white; }
        .badge-500 { background: #b91c1c; color: white; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; font-size: 13px; }
        th, td { text-align: left; padding: 8px 12px; border-bottom: 1px solid #334155; }
        th { background: #0f172a; color: #94a3b8; }
        pre { background: #090d16; padding: 10px; border-radius: 4px; overflow-x: auto; font-size: 12px; color: #e2e8f0; }
        .stat-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px; margin-bottom: 20px; }
        .stat-box { background: #1e293b; padding: 15px; border-radius: 8px; text-align: center; }
        .stat-num { font-size: 28px; font-weight: bold; }
    </style>
</head>
<body>
<div class="container">
    <h1>🚀 HorsesWorldSale - Super Test Suite de Diagnóstico</h1>

<?php

require __DIR__ . '/../vendor/autoload.php';

$_SERVER['HTTPS'] = 'on';
$_SERVER['SERVER_PORT'] = 443;
$_SERVER['HTTP_X_FORWARDED_PROTO'] = 'https';
$_SERVER['HTTP_X_FORWARDED_SSL'] = 'on';
$_SERVER['HTTP_HOST'] = 'horsesworldsale.com';

/** @var \Illuminate\Foundation\Application $app */
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(\Illuminate\Contracts\Http\Kernel::class);

$initialRequest = \Illuminate\Http\Request::create('https://horsesworldsale.com/', 'GET');
$app->instance('request', $initialRequest);
\Illuminate\Support\Facades\Facade::clearResolvedInstance('request');
\Illuminate\Support\Facades\Request::swap($initialRequest);

$kernel->bootstrap();

echo "<div class='card'>";
echo "<h3>1. Verificación del Sistema y Base de Datos</h3>";

try {
    $dbName = \Illuminate\Support\Facades\DB::connection()->getDatabaseName();
    $userCount = \Illuminate\Support\Facades\DB::table('users')->count();
    $horseCount = \Illuminate\Support\Facades\DB::table('horses')->count();
    $studCount = \Illuminate\Support\Facades\DB::table('studs')->count();

    echo "<p class='success'>✅ Conexión a Base de Datos Exitosa: <code>{$dbName}</code></p>";
    echo "<ul>";
    echo "<li>Usuarios registrados: <strong>{$userCount}</strong></li>";
    echo "<li>Caballos en sistema: <strong>{$horseCount}</strong></li>";
    echo "<li>Ganaderías/Studs: <strong>{$studCount}</strong></li>";
    echo "</ul>";

    // Test Admin User
    $admin = \App\Models\User::where('type', 0)->first() ?? \App\Models\User::where('email', 'admin@horse.com')->first();
    if ($admin) {
        echo "<p class='success'>✅ Usuario Administrador encontrado: <code>{$admin->email}</code> (Tipo: {$admin->type})</p>";
    } else {
        echo "<p class='warning'>⚠️ No se encontró usuario administrador type=0 directo.</p>";
    }

} catch (\Throwable $e) {
    echo "<p class='danger'>❌ Error en Base de Datos: " . htmlspecialchars($e->getMessage()) . "</p>";
}
echo "</div>";

// Get all routes
$router = $app->make(\Illuminate\Routing\Router::class);
$allRoutes = $router->getRoutes()->getRoutes();

$totalRoutes = count($allRoutes);
$testedCount = 0;
$passedCount = 0;
$failedCount = 0;

$results = [];

// Authenticate as admin for testing protected routes
if (isset($admin) && $admin) {
    \Illuminate\Support\Facades\Auth::login($admin);
}

// Key routes to explicitly test
$testUrls = [
    '/' => 'Portal Principal',
    '/login' => 'Pantalla de Login',
    '/admin/LogAs' => 'Panel Admin - LogAs',
    '/admin/Asociados' => 'Panel Admin - Asociados',
    '/panel/Caballos' => 'Panel Ganadero - Listado Caballos',
    '/panel/MiPerfil' => 'Panel Ganadero - Perfil',
    '/panel/Pais' => 'Panel Ganadero - País',
];

echo "<div class='card'>";
echo "<h3>2. Test de Rutas Principales del Sistema</h3>";
echo "<table>";
echo "<thead><tr><th>Ruta</th><th>Descripción</th><th>Método</th><th>Estado</th><th>Detalle / Error</th></tr></thead><tbody>";

foreach ($testUrls as $uri => $desc) {
    $testedCount++;
    $fullUrl = 'https://horsesworldsale.com' . $uri;
    $req = \Illuminate\Http\Request::create($fullUrl, 'GET');

    $app->instance('request', $req);
    \Illuminate\Support\Facades\Facade::clearResolvedInstance('request');
    \Illuminate\Support\Facades\Request::swap($req);

    try {
        $response = $app->handle($req);
        $status = $response->getStatusCode();
        
        if ($status >= 200 && $status < 400) {
            $passedCount++;
            $badgeClass = $status === 200 ? 'badge-200' : 'badge-302';
            echo "<tr>";
            echo "<td><code>{$uri}</code></td>";
            echo "<td>{$desc}</td>";
            echo "<td><span class='badge badge-get'>GET</span></td>";
            echo "<td><span class='badge {$badgeClass}'>{$status}</span></td>";
            echo "<td class='success'>OK " . ($status === 302 ? "(Redirige a: " . htmlspecialchars($response->headers->get('Location')) . ")" : "") . "</td>";
            echo "</tr>";
        } else {
            $failedCount++;
            echo "<tr>";
            echo "<td><code>{$uri}</code></td>";
            echo "<td>{$desc}</td>";
            echo "<td><span class='badge badge-get'>GET</span></td>";
            echo "<td><span class='badge badge-500'>{$status}</span></td>";
            echo "<td class='danger'>Error HTTP {$status}</td>";
            echo "</tr>";
        }
    } catch (\Throwable $e) {
        $failedCount++;
        echo "<tr>";
        echo "<td><code>{$uri}</code></td>";
        echo "<td>{$desc}</td>";
        echo "<td><span class='badge badge-get'>GET</span></td>";
        echo "<td><span class='badge badge-500'>ERROR</span></td>";
        echo "<td class='danger'>" . htmlspecialchars($e->getMessage()) . "<br><small>" . htmlspecialchars($e->getFile() . ':' . $e->getLine()) . "</small></td>";
        echo "</tr>";
    }
}

echo "</tbody></table>";
echo "</div>";

// Summary
echo "<div class='stat-grid'>";
echo "<div class='stat-box'><div class='stat-num' style='color:#38bdf8;'>{$totalRoutes}</div><div>Total Rutas Registradas</div></div>";
echo "<div class='stat-box'><div class='stat-num success'>{$passedCount}</div><div>Rutas OK</div></div>";
echo "<div class='stat-box'><div class='stat-num " . ($failedCount > 0 ? "danger" : "success") . "'>{$failedCount}</div><div>Errores Detectados</div></div>";
echo "</div>";

?>
</div>
</body>
</html>
