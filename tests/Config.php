<?php

require_once(__DIR__ . '/../src/Config.php');

use PHPUnit\Framework\TestCase;

class ConfigTest extends TestCase
{
    /**
     * Load application config
     */
    public function testLoadApp()
    {
        define('APPPATH', __DIR__ . '/../src/');

        \DrMVC\Core\Config::load('app_define');
        $this->assertTrue(APPDEFINE == 'OK');

        $config = \DrMVC\Core\Config::load('app_array');
        foreach ($config as $key => $value) {
            if ($key == 'path') continue;
            define($key, $value);
        }
        $this->assertTrue(APPARRAY == 'OK');
    }

    /**
     * Load system config
     */
    public function testLoadSys()
    {
        define('SYSPATH', __DIR__ . '/../src/');

        \DrMVC\Core\Config::load('sys_define');
        $this->assertTrue(SYSDEFINE == 'OK');

        $config = \DrMVC\Core\Config::load('sys_array');
        foreach ($config as $key => $value) {
            if ($key == 'path') continue;
            define($key, $value);
        }
        $this->assertTrue(SYSARRAY == 'OK');
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
