<?php
/*
 * PHP DotEnv for Yii2 framework
 *
 * Autoload .env at Composer autoloader.
 */

use indextank\dotenv\Loader;
use indextank\dotenv\Env;

if (! function_exists('env')) {
    /**
     * Gets the value of an environment variable.
     *
     * @param $name
     * @param mixed $default
     * @return mixed
     */
    function env($name, $default = false)
    {
        Loader::load();
        $value = getenv($name);

        return $value ? $value : $default;
    }
}

if (! function_exists('penv')) {
    /**
     * Gets the value of an environment variable.
     *
     * @param $name
     * @param mixed $default
     * @return mixed
     */
    function penv($name, $default = false)
    {
        return \env($name, $default);
    }
}

if (! function_exists('value')) {
    /**
     * Return the default value of the given value.
     *
     * @param  mixed  $value
     * @return mixed
     */
    function value($value)
    {
        return $value instanceof Closure ? $value() : $value;
    }
}

if (!function_exists('p')) {
    function p($name, $value = '')
    {
        echo "<br/><pre>";

        print_r(string_pd($name));

        if ($value != '') {
            echo "\n\n--------------\n";
            print_r(string_pd($value));

            echo "<br/><br/>";
        }

        echo "<br/>" . unicode_decode('\u002d\u002d\u002d\u002d\u002d\u002d\u002d\u002d\u002d\u002d\u002d\u002d\u0020\u002f\u002f\u0020\u6253\u5370\u8f93\u51fa\u7ed3\u675f\u0020\u002f\u002f\u0020\u002d\u002d\u002d\u002d\u002d\u002d\u002d\u002d\u002d\u002d\u002d\u002d');
        echo "</pre>";
    }
}

if (!function_exists('pp')) {
    function pp($name, $value = '')
    {
        echo "<br/><pre>" . $name . unicode_decode('\u7ed3\u679c') . ": ";

        print_r(string_pd($value));

        echo "<br/>" . unicode_decode('\u002d\u002d\u002d\u002d\u002d\u002d\u002d\u002d\u002d\u002d\u002d\u002d\u0020\u002f\u002f\u0020\u6253\u5370\u8f93\u51fa\u7ed3\u675f\u0020\u002f\u002f\u0020\u002d\u002d\u002d\u002d\u002d\u002d\u002d\u002d\u002d\u002d\u002d\u002d');
        echo "</pre>";
    }
}

if (!function_exists('dd')) {
    function dd(...$vars)
    {
        foreach ($vars as $v) {
            \yii\helpers\VarDumper::dump($v);
        }

        exit(1);
    }
}

if (!function_exists('unicode_decode')) {
    function unicode_decode($name)
    {
        $json = '{"str":"' . $name . '"}';
        $arr = json_decode($json, true);
        if (empty($arr)) return '';
        return $arr['str'];
    }
}

if (!function_exists('string_pd')) {
    function string_pd($value) {
        if ($value != '') {
            if (is_string($value)) {
                return $value;
            } else if (is_array($value)) {
                if (count($value) == 1) {
                    return $value[0];
                } else {
                    return $value;
                }
            }
        }

        return '';
    }
}