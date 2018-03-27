<?php namespace DrMVC\Interfaces;

interface Config
{
    /**
     * Load configuration file, show config path if needed
     *
     * @param   string $filename
     * @return  Config
     */
    public function load(string $filename): Config;

    /**
     * Set some parameter of configuration
     *
     * @param   string $key
     * @param   mixed $value
     * @return  Config
     */
    public function set(string $key, $value): Config;

    /**
     * Get single parameter by name, or all available parameters
     *
     * @param   string|null $key
     * @return  mixed
     */
    public function get(string $key = null);

}