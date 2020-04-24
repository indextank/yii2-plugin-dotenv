<?php
/*
 * PHP DotEnv for Yii2 framework
 *
 * Autoload .env at Composer autoloader.
 */

use indextank\dotenv\Loader;
use indextank\dotenv\Env;

if (! function_exists('penv')) {
    /**
     * Gets the value of an environment variable.
     *
     * @param  string  $key
     * @param  mixed  $default
     * @return mixed
     */
    function penv($key, $default = null)
    {
        return Env::get($key, $default);
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

        echo "------------ // 打印输出结束 // ------------";
        echo "</pre>";
    }
}

if (!function_exists('dd')) {
    function dd(...$array)
    {
        echo "<pre>";

        if (count($array) == 1) {
            print_r($array[0]);
        } else {
            print_r($array);
        }

        echo "</pre>";
        exit();
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