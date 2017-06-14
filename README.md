# DrMVC Config loader

[![Latest Stable Version](https://poser.pugx.org/drmvc/config/v/stable)](https://packagist.org/packages/drmvc/config)
[![Build Status](https://travis-ci.org/drmvc/config.svg?branch=master)](https://travis-ci.org/drmvc/config)
[![Total Downloads](https://poser.pugx.org/drmvc/config/downloads)](https://packagist.org/packages/drmvc/config)
[![License](https://poser.pugx.org/drmvc/config/license)](https://packagist.org/packages/drmvc/config)
[![PHP 7 ready](https://php7ready.timesplinter.ch/drmvc/config/master/badge.svg)](https://travis-ci.org/drmvc/config)

Class for work with configuration files.

## How to use

First what you need know: **application directory path** should be already defined.

    define('APPPATH', __DIR__ . '/../app/');

Your **APPPATH** should contain the **Configs** folder, into **Configs**
folder you need put your configuration file with filename like **some_config**.php

Example of directories tree:

    app/
     |-Configs/
        |-some_config.php

How to load the config file from "app/Configs" folder:

    \DrMVC\Core\Config::load('some_config');
    $config = \DrMVC\Core\Config::load('some_config');

Also you can set a custom path to folder with configs (path - it's a relative path):

    \DrMVC\Core\Config::load('some_config', 'path');
    $config = \DrMVC\Core\Config::load('some_config', 'path');

For example if your configs stored into application root: 

    \DrMVC\Core\Config::load('some_config', '.');
    $config = \DrMVC\Core\Config::load('some_config', '.');

### Config example with array

    <?php
    /**
     * Config with array
     */
    return array(
        'SOME' => 'ITEM'
    );

After you load the config into `$config` variable you can read the array for example via `foreach` function

    foreach ($config as $key => $value) {
        if ($key == 'path') continue;
        define($key, $value);
    }

### Config example with defined variables

    <?php
    /**
     * Config with defined variable
     */
    define('SOME', 'ITEM');

Defined variables available from any plaice of your code.

## How to install

### Via composer

    composer require drmvc/config

### Classic style

* Download the latest [DrMVC Config](https://github.com/drmvc/config/releases) package
* Extract the archive
* Initiate the scripts, just run `composer update` from directory with sources

## About PHP Unit Tests

You can run tests by hands from source directory via `vendor/bin/phpunit` command. 

## Developers

* [Paul Rock](https://github.com/EvilFreelancer)
