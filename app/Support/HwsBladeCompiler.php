<?php

namespace App\Support;

use Illuminate\View\Compilers\BladeCompiler;

/**
 * Compilador Blade compatible con el codigo heredado de Laravel 5.
 *
 * Laravel 13 cambio el manejo de la directiva @php:
 *  - storePhpBlocks() usa la regex "@php(.*?)@endphp" (no codiciosa), que
 *    captura desde un @php(...) inline hasta el siguiente @endphp, engullendo
 *    directivas intermedias (@foreach, @if, etc.) y generando PHP invalido.
 *  - Ya no existe compilePhp(), por lo que @php(...) inline quedaba literal.
 *
 * Aqui se restaura el comportamiento de Laravel 5:
 *  - storePhpBlocks() ignora @php(...) inline (no captura como bloque).
 *  - compilePhp() compila @php(expr) inline a "<?php expr; ?>" y @php (bloque
 *    cerrado con "?>") a "<?php ".
 */
class HwsBladeCompiler extends BladeCompiler
{
    protected function storePhpBlocks($value)
    {
        return preg_replace_callback('/(?<!@)@php(?!\()(.*?)@endphp/s', function ($matches) {
            return $this->storeRawBlock("<?php{$matches[1]}?>");
        }, $value);
    }

    protected function compilePhp($expression)
    {
        $expression = trim($expression);

        if ($expression !== '') {
            $expr = trim(substr($expression, 1, -1));

            return "<?php {$expr}; ?>";
        }

        return '<?php ';
    }
}
