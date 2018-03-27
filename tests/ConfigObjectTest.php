<?php namespace DrMVC\Tests;

use PHPUnit\Framework\TestCase;
use DrMVC\ConfigObject;

class ConfigObjectTest extends TestCase
{
    private $file = __DIR__ . '/array.php';
    private $array;

    public function __construct(string $name = null, array $data = [], string $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->array = include $this->file;
    }

    public function test__construct()
    {
        try {
            $obj = new ConfigObject();
            $this->assertTrue(is_object($obj));
        } catch (\Exception $e) {
            $this->assertContains('Must be initialized ', $e->getMessage());
        }
    }

    public function testSet()
    {
        $obj = new ConfigObject();
        $obj->set('param_int', 111);
        $config = $obj->get();
        $this->assertTrue(is_array($config));
        $this->assertCount(1, $config);
        $this->assertEquals($obj->get('param_int'), 111);
    }

    public function testGet()
    {
        $obj = new ConfigObject();
        $config = $obj->get();
        $this->assertTrue(is_array($config));
        $this->assertEmpty($config);
    }

    public function testClean()
    {
        $obj = new ConfigObject();
        $config = $obj->get();
        $this->assertEmpty($config);
        $this->assertTrue(is_array($config));

        $obj->set('param_bool', true);
        $obj->set('param_int', 321);
        $obj->clean('param_bool');
        $config = $obj->get();
        $this->assertTrue(is_array($config));
        $this->assertCount(1, $config);
        $this->assertEquals($obj->get('param_int'), 321);
    }

    public function testLoad()
    {
        $obj = new ConfigObject();
        $obj->load($this->file);
        $config = $obj->get();
        $this->assertTrue(is_array($config));
        $this->assertCount(4, $config);
        $this->assertEquals($obj->get('param_text'), 'text');
    }
}