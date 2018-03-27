<?php
require_once __DIR__ . '/../vendor/autoload.php';

use \DrMVC\ConfigObject;
$configFile = __DIR__ . '/../tests/array.php';

$obj = new ConfigObject();
$obj->load($configFile);

// Get all available parameters
$config = $obj->get();
print_r($config);

// Get single parameter
$param = $obj->get('param_int');
echo "$param\n";

// Get single parameter with array inside
$array = $obj->get('param_array');
print_r($array);
