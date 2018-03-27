<?php namespace DrMVC\Interfaces;

interface ConfigSingleton
{
    /**
     * Load configuration file, show config path if needed
     *
     * @param   string $filename
     * @return  ConfigSingleton
     */
    public function load(string $filename): ConfigSingleton;

    /**
     * Set some parameter of configuration
     *
     * @param   string $key
     * @param   mixed $value
     * @return  ConfigSingleton
     */
    public function set(string $key, $value): ConfigSingleton;

    /**
     * Get single parameter by name, or all available parameters
     *
     * @param   string|null $key
     * @return  mixed
     */
    public function get(string $key = null);

    /**
     * Remove single value or clean config
     *
     * @param   string|null $key
     * @return  ConfigSingleton
     */
    public function clean(string $key = null): ConfigSingleton;
}