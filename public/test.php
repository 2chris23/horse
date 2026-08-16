<?php
echo "=== DESACTIVANDO MODO MANTENIMIENTO ===\n";

$down = __DIR__.'/../storage/framework/down';
$maintenance = __DIR__.'/../storage/framework/maintenance.php';

if (file_exists($down)) {
    if (unlink($down)) {
        echo "Eliminado: storage/framework/down\n";
    } else {
        echo "ERROR: No se pudo eliminar storage/framework/down. Verifica los permisos.\n";
    }
} else {
    echo "El archivo 'down' no existe.\n";
}

if (file_exists($maintenance)) {
    if (unlink($maintenance)) {
        echo "Eliminado: storage/framework/maintenance.php\n";
    } else {
        echo "ERROR: No se pudo eliminar storage/framework/maintenance.php. Verifica los permisos.\n";
    }
} else {
    echo "El archivo 'maintenance.php' no existe.\n";
}

echo "\n¡LISTO! Ahora intenta acceder a https://horsesworldsale.com/\n";
