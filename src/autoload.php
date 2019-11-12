<?php
/*
 * PHP DotEnv for Yii2 framework
 *
 * Autoload .env at Composer autoloader.
 */

use indextank\dotenv\Loader;

/*
 * Prevent duplicate definition of the same name function.
 */
if (!function_exists('env')) {
    /**
     * Get a value from environment variable.
     *
     * @param string $name
     * @param bool   $default
     * @return array|bool|false|string
     */
    function env($name, $default = false)
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