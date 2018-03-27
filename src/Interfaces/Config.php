<?php namespace DrMVC\Interfaces;

interface Config
{
    /**
     * Load configuration file, show config path if needed
     *
     * @param   string|array $data - Path to file or array with configs
     */
    public static function load($data);

    /**
     * Set some parameter of configuration
     *
     * @param   string $key
     * @param   mixed $value
     */
    public static function set(string $key, $value);

    /**
     * Get single parameter by name, or all available parameters
     *
     * @param   string|null $key
     * @return  mixed
     */
    public static function get(string $key = null);

    /**
     * Remove single value or clean config
     *
     * @param   string|null $key
     * @return  bool
     */
    public static function clean(string $key = null);
}