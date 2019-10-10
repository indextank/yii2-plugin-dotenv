Yii2 DotEnv
===========
[![Build Status](https://travis-ci.org/indextank/yii2-plugin-env.svg)](https://travis-ci.org/indextank/yii2-plugin-env)
[![Latest Stable Version](https://poser.pugx.org/indextank/yii2-plugin-env/v/stable.svg)](https://packagist.org/packages/indextank/yii2-plugin-env) 
[![Total Downloads](https://poser.pugx.org/indextank/yii2-plugin-env/downloads.svg)](https://packagist.org/packages/indextank/yii2-plugin-env) 
[![Latest Unstable Version](https://poser.pugx.org/indextank/yii2-plugin-env/v/unstable.svg)](https://packagist.org/packages/indextank/yii2-plugin-env)
[![License](https://poser.pugx.org/indextank/yii2-plugin-env/license.svg)](https://packagist.org/packages/indextank/yii2-plugin-env)

Yii 2 框架添加.env功能，实现类似于Lavaral框架中的.env功能。使框架配置更简单，更利于维护。本项目基于yiithings/yii2-dotenv。

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist indextank/yii2-plugin-env "*"
```

or add

```
"indextank/yii2-plugin-env": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :
```
[
    'db' => [
        'password' => env('DB_PASS'),
    ],
]
```

The env function will autoload .env file, it uses the following search mechanism:

    If there is a Yii class, then pass the alias @vendor or @app or @yii, Otherwise 
    according to the project directory to determine.
    
But, if your application vendor directory is a symbol link and you no registered
@vendor or @app alias before call env function, the project will not working. So
you should set the @vendor alias before calling env function.
