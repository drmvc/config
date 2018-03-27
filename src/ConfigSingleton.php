<?php namespace DrMVC;

class ConfigSingleton implements Interfaces\ConfigSingleton
{
    /**
     * Load configuration file, show config path if needed
     *
     * @param   string $filename
     * @return  Interfaces\ConfigSingleton
     */
    public function load(string $filename): Interfaces\ConfigSingleton
    {
        Config::load($filename);
        return $this;
    }

    /**
     * Set some parameter of configuration
     *
     * @param   string $key
     * @param   mixed $value
     * @return  Interfaces\ConfigSingleton
     */
    public function set(string $key, $value): Interfaces\ConfigSingleton
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
     * @return  Interfaces\ConfigSingleton
     */
    public function clean(string $key = null): Interfaces\ConfigSingleton
    {
        Config::clean($key);
        return $this;
    }
}