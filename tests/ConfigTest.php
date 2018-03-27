<?php namespace DrMVC;

use PHPUnit\Framework\TestCase;

class ConfigTest extends TestCase
{
    private $file = __DIR__ . '/array.php';
    private $array;

    public function __construct(string $name = null, array $data = [], string $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->array = include $this->file;
    }

    public function testSet()
    {
        Config::clean();
        Config::set('param_int', 111);
        $config = Config::get();
        $this->assertTrue(is_array($config));
        $this->assertCount(1, $config);
        $this->assertEquals(Config::get('param_int'), 111);
    }

    public function testGet()
    {
        Config::clean();
        $config = Config::get();
        $this->assertTrue(is_array($config));
        $this->assertEmpty($config);
    }

    public function testClean()
    {
        Config::clean();
        $config = Config::get();
        $this->assertEmpty($config);
        $this->assertTrue(is_array($config));

        Config::set('param_bool', true);
        Config::set('param_int', 321);
        Config::clean('param_bool');
        $config = Config::get();
        $this->assertTrue(is_array($config));
        $this->assertCount(1, $config);
        $this->assertEquals(Config::get('param_int'), 321);
    }

    public function testLoad()
    {
        Config::clean();
        Config::load($this->file);
        $config = Config::get();
        $this->assertTrue(is_array($config));
        $this->assertCount(4, $config);
        $this->assertEquals(Config::get('param_text'), 'text');
    }

}