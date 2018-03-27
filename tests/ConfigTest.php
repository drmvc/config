<?php namespace DrMVC;

use PHPUnit\Framework\TestCase;

class ConfigTest extends TestCase
{
    private $file = __DIR__ . '/array.php';

    public function test__construct()
    {
        $array = include "$this->file";
        try {
            $object = new Config();
            $this->assertTrue(is_object($object));

            $object = new Config($this->file);
            $this->assertTrue(is_object($object));

            $object = new Config($array);
            $this->assertTrue(is_object($object));

        } catch (\Exception $e) {
            $this->assertContains('Must be initialized ', $e->getMessage());
        }

    }

    public function testGet()
    {
        $object = new Config();
        $object->load($this->file);
        $config = $object->get();
        $this->assertTrue(is_array($config));
        $this->assertCount(4, $config);
        $this->assertEquals($object->get('param_bool'), true);
    }

    public function testLoad()
    {
        $object = new Config();
        $object->load($this->file);
        $config = $object->get();
        $this->assertTrue(is_array($config));
        $this->assertCount(4, $config);
        $this->assertEquals($object->get('param_text'), 'text');
    }

    public function testSet()
    {
        $object = new Config();
        $object->set('param_int', 111);
        $config = $object->get();
        $this->assertTrue(is_array($config));
        $this->assertCount(1, $config);
        $this->assertEquals($object->get('param_int'), 111);
    }

}