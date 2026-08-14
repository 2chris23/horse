<?php
foreach (glob('routes/*.php') as $file) {
    $content = file_get_contents($file);
    if (strpos($content, 'cliente.') !== false || strpos($content, 'state.ajax') !== false) {
        echo "$file contains cliente. or state.ajax\n";
    }
}
