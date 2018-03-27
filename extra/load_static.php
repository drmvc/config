<?php
require_once __DIR__ . '/../vendor/autoload.php';

use \DrMVC\Config;
$configFile = __DIR__ . '/../tests/array.php';

// Load file from filesystem
Config::load($configFile);

// Get all available parameters
$config = Config::get();
print_r($config);

// Get single parameter
$param = Config::get('param_int');
echo "$param\n";

// Get single parameter with array inside
$array = Config::get('param_array');
print_r($array);
