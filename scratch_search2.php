<?php
foreach (glob('routes/*.php') as $file) {
    $content = file_get_contents($file);
    if (preg_match_all('/require.*?\.php/', $content, $m)) {
        echo "$file has requires: \n";
        print_r($m);
    }
}
$app = file_get_contents('bootstrap/app.php');
if (preg_match_all('/require.*?\.php/', $app, $m)) {
    echo "bootstrap/app.php has requires: \n";
    print_r($m);
}
