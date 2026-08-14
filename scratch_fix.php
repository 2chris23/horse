<?php
$dir = new RecursiveDirectoryIterator('resources/views');
$iterator = new RecursiveIteratorIterator($dir);
$files = new RegexIterator($iterator, '/^.+\.blade\.php$/i', RecursiveRegexIterator::GET_MATCH);

$count = 0;
foreach ($files as $file) {
    $path = $file[0];
    $content = file_get_contents($path);
    $original = $content;
    
    $offset = 0;
    while (($pos = strpos($content, '@php(', $offset)) !== false) {
        $start = $pos;
        $open_parens = 1; // start with 1 because we consume '('
        $in_string = false;
        $string_char = '';
        $end = -1;
        
        for ($i = $pos + 5; $i < strlen($content); $i++) {
            $c = $content[$i];
            
            if (($c === '"' || $c === '\'') && ($content[$i-1] !== '\\')) {
                if (!$in_string) {
                    $in_string = true;
                    $string_char = $c;
                } else if ($string_char === $c) {
                    $in_string = false;
                }
            }
            
            if (!$in_string) {
                if ($c === '(') {
                    $open_parens++;
                } else if ($c === ')') {
                    $open_parens--;
                    if ($open_parens === 0) {
                        $end = $i;
                        break;
                    }
                }
            }
        }
        
        if ($end !== -1) {
            $expr = substr($content, $pos + 5, $end - ($pos + 5));
            $replacement = "<?php " . $expr . "; ?>";
            $content = substr($content, 0, $start) . $replacement . substr($content, $end + 1);
            $offset = $start + strlen($replacement);
        } else {
            $offset = $pos + 5;
        }
    }
    
    if ($content !== $original) {
        file_put_contents($path, $content);
        $count++;
        echo "Fixed: $path\n";
    }
}
echo "Total files fixed: $count\n";
