<?php

require_once(__DIR__ . '/../src/Config.php');

use PHPUnit\Framework\TestCase;

class ConfigTest extends TestCase
{
    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        if (!defined('APPPATH')) define('APPPATH', __DIR__ . '/');
    }

    /**
     * Load application config
     */
    public function testLoad()
    {
        $config = \DrMVC\Core\Config::load('array', '.');
        foreach ($config as $key => $value) {
            if ($key == 'path') continue;
            define($key, $value);
        }
        $this->assertTrue(APPARRAY == 'OK');
    }

    /**
     * If file not found
     */
    public function testLoadDefault()
    {
        $config = \DrMVC\Core\Config::load('not_found');
        $this->assertFalse($config);
    }

}
