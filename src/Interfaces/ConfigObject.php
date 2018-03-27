<?php namespace DrMVC\Interfaces;

interface ConfigObject
{
    /**
     * Load configuration file, show config path if needed
     *
     * @param   string $filename
     * @return  ConfigObject
     */
    public function load(string $filename): ConfigObject;

    /**
     * Set some parameter of configuration
     *
     * @param   string $key
     * @param   mixed $value
     * @return  ConfigObject
     */
    public function set(string $key, $value): ConfigObject;

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
     * @return  ConfigObject
     */
    public function clean(string $key = null): ConfigObject;
}