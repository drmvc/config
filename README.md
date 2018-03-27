# DrMVC\Config

[![Latest Stable Version](https://poser.pugx.org/drmvc/config/v/stable)](https://packagist.org/packages/drmvc/config)
[![Build Status](https://travis-ci.org/drmvc/config.svg?branch=master)](https://travis-ci.org/drmvc/config)
[![Total Downloads](https://poser.pugx.org/drmvc/config/downloads)](https://packagist.org/packages/drmvc/config)
[![License](https://poser.pugx.org/drmvc/config/license)](https://packagist.org/packages/drmvc/config)
[![PHP 7 ready](https://php7ready.timesplinter.ch/drmvc/config/master/badge.svg)](https://travis-ci.org/drmvc/config)

Library for manipulation with project configurations.

    composer require drmvc/config

## How to use

```php
<?php
require_once __DIR__ . '/../vendor/autoload.php';
use \DrMVC\Config;

// Load file with array inside from filesystem
Config::load(__DIR__ . '/array.php');

Config::set('param_new', 'value');  // Add new text parameter
Config::set('param_arr', [1,2,3]);  // Add new array parameter

$config = Config::get();            // Get all available parameters
$param = Config::get('param_new');  // Get single parameter
$arr = Config::get('param_arr');    // Get single parameter with array
```

More examples you can find [here](extra).

## About PHP Unit Tests

For first need to install all dev dependencies via `composer update`,
then you can run tests by hands from source directory via
`./vendor/bin/phpunit` command.
