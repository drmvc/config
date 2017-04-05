<?php

require_once(__DIR__ . '/../src/Config.php');

use PHPUnit\Framework\TestCase;

class ConfigTest extends TestCase
{
    /**
     * Check the default workmode
     */
    public function testLoad()
    {
        define('APPPATH', __DIR__ . '/../src/');
        define('SYSPATH', __DIR__ . '/../src/');

        \DrMVC\Core\Config::load('test');

        $this->assertTrue(ALL == 'OK');
    }

}
