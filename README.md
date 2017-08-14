# DrMVC Config loader

[![Latest Stable Version](https://poser.pugx.org/drmvc/config/v/stable)](https://packagist.org/packages/drmvc/config)
[![Build Status](https://travis-ci.org/drmvc/config.svg?branch=master)](https://travis-ci.org/drmvc/config)
[![Total Downloads](https://poser.pugx.org/drmvc/config/downloads)](https://packagist.org/packages/drmvc/config)
[![License](https://poser.pugx.org/drmvc/config/license)](https://packagist.org/packages/drmvc/config)
[![PHP 7 ready](https://php7ready.timesplinter.ch/drmvc/config/master/badge.svg)](https://travis-ci.org/drmvc/config)

Class for work with configuration files.

    composer require drmvc/config

## How to use

First what you need know: **application directory path** should be already defined.

```php
define('APPPATH', __DIR__ . '/../app/');
```

Your **APPPATH** should contain the **Configs** folder, into **Configs**
folder you need put your configuration file with filename like **some_config**.php

Example of directories tree:

    app/
     |-Configs/
        |-some_config.php
        |-array_config.php

How to load the config file from "APPPATH/Configs" folder:

```php
// Basic usage:
\DrMVC\Core\Config::load('some_config');
// Store variables from config inside variable
$config = \DrMVC\Core\Config::load('some_config');

// You can set a custom path (relative regarding APPPATH) to folder with configs:
\DrMVC\Core\Config::load('some_config', '/some/relative/path');

// Load configs stored inside application root: 
\DrMVC\Core\Config::load('some_config', '.');
```

### Load config file with array of parameters

For example in your config file with name **array_config**.php simple array like:

```php
<?php
/**
 * Config with array
 */
return array(
    'SOME' => 'ITEM'
);
```

You can load this array into the `$config` variable by command:

```php
$config = \DrMVC\Core\Config::load('array_config');

/* print_r($config); // should return
 * Array
 * (
 *     [SOME] => ITEM
 * )
 * 
 * echo $config['SOME']; // should return 'ITEM'
```

After this you can read array and define some constants, for example:

```php
foreach ($config as $key => $value) define($key, $value);
```

### Config example with defined variables

```php
<?php
/**
 * Config with defined constants
 */
define('SOME', 'ITEM');
```
    
Defined constants available from any plaice of your code.

## About PHP Unit Tests

You can run tests by hands from source directory via `vendor/bin/phpunit` command. 

## Developers

* [Paul Rock](https://github.com/EvilFreelancer)
