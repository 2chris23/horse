<?php

namespace App\Legacy;

/**
 * Compatibilidad con laravelcollective/html (Form facade) para las vistas
 * heredadas de Laravel 5. El paquete original no esta instalado, por lo que
 * se emulan los metodos realmente utilizados por las vistas del proyecto.
 */
class Form
{
    public static function open(array $options = [])
    {
        $method = strtoupper($options['method'] ?? 'POST');
        $action = $options['action'] ?? url()->current();
        $attrs = [];
        if (isset($options['files']) && $options['files']) {
            $attrs[] = 'enctype="multipart/form-data"';
        }
        foreach (['id', 'class', 'name', 'role', 'target'] as $k) {
            if (isset($options[$k])) {
                $attrs[] = $k . '="' . e($options[$k]) . '"';
            }
        }
        $html = '<form method="' . e($method) . '" action="' . e($action) . '" ' . implode(' ', $attrs) . '>';
        if ($method !== 'GET') {
            $html .= '<input type="hidden" name="_token" value="' . e(csrf_token()) . '">';
        }
        return $html;
    }

    public static function close()
    {
        return '</form>';
    }

    public static function hidden($name, $value = null, array $options = [])
    {
        $attrs = '';
        foreach ($options as $k => $v) {
            if ($v === null || $v === false) {
                continue;
            }
            if ($v === true) {
                $attrs .= ' ' . e($k);
                continue;
            }
            $attrs .= ' ' . e($k) . '="' . e($v) . '"';
        }
        $val = ($value !== null) ? ' value="' . e($value) . '"' : '';
        return '<input type="hidden" name="' . e($name) . '"' . $val . $attrs . '>';
    }

    public static function submit($value, array $options = [])
    {
        $attrs = '';
        foreach ($options as $k => $v) {
            if ($v === null || $v === false) {
                continue;
            }
            if ($v === true) {
                $attrs .= ' ' . e($k);
                continue;
            }
            $attrs .= ' ' . e($k) . '="' . e($v) . '"';
        }
        return '<button type="submit"' . $attrs . '>' . e($value) . '</button>';
    }

    public static function label($name, $value = null, array $options = [])
    {
        $attrs = '';
        foreach ($options as $k => $v) {
            if ($v === null || $v === false) {
                continue;
            }
            $attrs .= ' ' . e($k) . '="' . e($v) . '"';
        }
        return '<label for="' . e($name) . '"' . $attrs . '>' . e($value ?? $name) . '</label>';
    }

    public static function text($name, $value = null, array $options = [])
    {
        return self::input('text', $name, $value, $options);
    }

    public static function email($name, $value = null, array $options = [])
    {
        return self::input('email', $name, $value, $options);
    }

    public static function password($name, array $options = [])
    {
        return self::input('password', $name, null, $options);
    }

    public static function number($name, $value = null, array $options = [])
    {
        return self::input('number', $name, $value, $options);
    }

    public static function file($name, array $options = [])
    {
        return self::input('file', $name, null, $options);
    }

    protected static function input($type, $name, $value, array $options)
    {
        $attrs = '';
        foreach ($options as $k => $v) {
            if ($v === null || $v === false) {
                continue;
            }
            if ($v === true) {
                $attrs .= ' ' . e($k);
                continue;
            }
            $attrs .= ' ' . e($k) . '="' . e($v) . '"';
        }
        $val = ($value !== null) ? ' value="' . e($value) . '"' : '';
        return '<input type="' . e($type) . '" name="' . e($name) . '"' . $val . $attrs . '>';
    }

    public static function textarea($name, $value = null, array $options = [])
    {
        $attrs = '';
        foreach ($options as $k => $v) {
            if ($v === null || $v === false) {
                continue;
            }
            if ($v === true) {
                $attrs .= ' ' . e($k);
                continue;
            }
            $attrs .= ' ' . e($k) . '="' . e($v) . '"';
        }
        return '<textarea name="' . e($name) . '"' . $attrs . '>' . e($value ?? '') . '</textarea>';
    }

    public static function select($name, array $list = [], $selected = null, array $options = [])
    {
        $attrs = '';
        foreach ($options as $k => $v) {
            if ($v === null || $v === false) {
                continue;
            }
            if ($v === true) {
                $attrs .= ' ' . e($k);
                continue;
            }
            $attrs .= ' ' . e($k) . '="' . e($v) . '"';
        }
        $html = '<select name="' . e($name) . '"' . $attrs . '>';
        foreach ($list as $value => $label) {
            $sel = ((string) $value === (string) $selected) ? ' selected="selected"' : '';
            $html .= '<option value="' . e($value) . '"' . $sel . '>' . e($label) . '</option>';
        }
        return $html . '</select>';
    }
}