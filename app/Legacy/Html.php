<?php

namespace App\Legacy;

/**
 * Compatibilidad con laravelcollective/html (Html facade) para las vistas
 * heredadas de Laravel 5. Emula los metodos realmente utilizados.
 */
class Html
{
    public static function script($url, array $attributes = [])
    {
        $attrs = '';
        foreach ($attributes as $k => $v) {
            if ($v === null || $v === false) {
                continue;
            }
            if ($v === true) {
                $attrs .= ' ' . e($k);
                continue;
            }
            $attrs .= ' ' . e($k) . '="' . e($v) . '"';
        }
        return '<script src="' . e($url) . '"' . $attrs . '></script>';
    }

    public static function link($url, $title = null, array $attributes = [])
    {
        $attrs = '';
        foreach ($attributes as $k => $v) {
            if ($v === null || $v === false) {
                continue;
            }
            if ($v === true) {
                $attrs .= ' ' . e($k);
                continue;
            }
            $attrs .= ' ' . e($k) . '="' . e($v) . '"';
        }
        return '<a href="' . e($url) . '"' . $attrs . '>' . e($title ?? $url) . '</a>';
    }

    public static function image($url, $alt = null, array $attributes = [])
    {
        $attrs = '';
        foreach ($attributes as $k => $v) {
            if ($v === null || $v === false) {
                continue;
            }
            if ($v === true) {
                $attrs .= ' ' . e($k);
                continue;
            }
            $attrs .= ' ' . e($k) . '="' . e($v) . '"';
        }
        return '<img src="' . e($url) . '" alt="' . e($alt ?? '') . '"' . $attrs . '>';
    }
}