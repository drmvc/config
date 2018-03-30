<?php
require_once __DIR__ . '/../vendor/autoload.php';

use \DrMVC\Config;
$configFile = __DIR__ . '/../tests/array.php';

$obj = new Config();

// Load file from filesystem
$obj->load($configFile);

// Load file from filesystem and put into array with specific key
$obj->load($configFile, 'subarray');

// Get all available parameters
$config = $obj->get();
print_r($config);

// Get single parameter
$param = $obj->get('param_int');
echo "$param\n";

// Get single parameter with array inside
$array = $obj->get('param_array');
print_r($array);
