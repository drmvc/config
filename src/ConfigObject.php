<?php namespace DrMVC;

class ConfigObject implements Interfaces\ConfigObject
{
    /**
     * Config constructor.
     * @param   null $autoload - File with array or array for auto loading
     */
    public function __construct($autoload = null)
    {
        new Config($autoload);
    }

    /**
     * Load configuration file, show config path if needed
     *
     * @param   string $filename
     * @return  Interfaces\ConfigObject
     */
    public function load(string $filename): Interfaces\ConfigObject
    {
        Config::load($filename);
        return $this;
    }

    /**
     * Set some parameter of configuration
     *
     * @param   string $key
     * @param   mixed $value
     * @return  Interfaces\ConfigObject
     */
    public function set(string $key, $value): Interfaces\ConfigObject
    {
        Config::set($key, $value);
        return $this;
    }

    /**
     * Get single parameter by name, or all available parameters
     *
     * @param   string|null $key
     * @return  mixed
     */
    public function get(string $key = null)
    {
        return Config::get($key);
    }

    /**
     * Remove single value or clean config
     *
     * @param   string|null $key
     * @return  Interfaces\ConfigObject
     */
    public function clean(string $key = null): Interfaces\ConfigObject
    {
        Config::clean($key);
        return $this;
    }

    /**
     * Cleanup static class
     */
    public function __destruct()
    {
        $this->clean();
    }
}