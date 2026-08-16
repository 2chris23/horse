<?php
// Mostrar exactamente qué tiene el servidor en archivos críticos
echo "=== PUBLIC/INDEX.PHP EN SERVIDOR ===\n";
echo htmlspecialchars(file_get_contents(__DIR__ . '/index.php'));
echo "\n\n=== APP SERVICE PROVIDER EN SERVIDOR ===\n";
echo htmlspecialchars(file_get_contents(__DIR__ . '/../app/Providers/AppServiceProvider.php'));
echo "\n\n=== GIT HEAD COMMIT ===\n";
echo file_get_contents(__DIR__ . '/../.git/refs/heads/main');
