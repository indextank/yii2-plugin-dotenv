<?php
/*
 * PHP DotEnv for Yii2 framework
 *
 * Autoload .env at Composer autoloader.
 */

use indextank\dotenv\Loader;

if (! function_exists('value')) {
    /**
     * Return the default value of the given value.
     *
     * @param mixed $value
     */
    function value($value)
    {
        return $value instanceof \Closure ? $value() : $value;
    }
}

/*
 * Prevent duplicate definition of the same name function.
 */
if (!function_exists('penv')) {
    /**
     * Get a value from environment variable.
     *
     * @param string $name
     * @param bool   $default
     * @return array|bool|false|string
     */
    function penv($name, $default = false)
    {
        static $loaded = null;
        if ($loaded === null) {
            /**
             * If the constant DISABLE_DOTENV_LOAD is defined as true, any .env
             * files is not loaded.
             *
             * if (YII_ENV == 'prod') {
             *     define('DISABLE_DOTENV_LOAD', true)
             * }
             */
            if (defined('DISABLE_DOTENV_LOAD') && DISABLE_DOTENV_LOAD) {
                $loaded = false;
            } else {
                Loader::load(
                    defined('DOTENV_PATH') ? DOTENV_PATH : '',
                    defined('DOTENV_FILE') ? DOTENV_FILE : '',
                    defined('DOTENV_OVERLOAD') ? DOTENV_OVERLOAD : false);
                $loaded = true;
            }
        }
        $value = getenv($name);
        if ($value === false) {
            return value($default);
        }
        switch (strtolower($value)) {
//            case 'true':
//            case '(true)':
//                return true;
//            case 'false':
//            case '(false)':
//                return false;
            case 'empty':
            case '(empty)':
                return '';
            case 'null':
            case '(null)':
                return;
        }
        if (($valueLength = strlen($value)) > 1 && $value[0] === '"' && $value[$valueLength - 1] === '"') {
            return substr($value, 1, -1);
        }

        return $value ? $value : $default;
    }
}

if (!function_exists('p')) {
    function p(...$array)
    {
        echo "<pre>";

        if (count($array) == 1) {
            print_r($array[0]);
        } else {
            print_r($array);
        }
		echo "<br/><br/>";
        echo "-----------------------------";
        echo "<br/>";
    }
}


if (!function_exists('pp')) {
    function pp($name, $value)
    {
        echo "<pre>";

        print_r(string_pd($name));
        echo ' -------- ';
        print_r(string_pd($value));

        echo "<br/><br/>";
        echo "-----------------------------";
        echo "<br/>";
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