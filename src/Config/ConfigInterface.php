<?php

namespace DrMVC\Config;

/**
 * Interface ConfigInterface
 * @package DrMVC\Config
 */
interface ConfigInterface
{
    /**
     * Load configuration file, show config path if needed
     *
     * @param   string $path path to file with array
     * @return  ConfigInterface
     */
    public function load(string $path): ConfigInterface;

    /**
     * Set some parameter of configuration
     *
     * @param   string $key
     * @param   mixed $value
     * @return  ConfigInterface
     */
    public function set(string $key, $value): ConfigInterface;

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
     * @return  ConfigInterface
     */
    public function clean(string $key = null): ConfigInterface;
}
