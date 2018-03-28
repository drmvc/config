<?php

namespace DrMVC\Config;

class Config implements ConfigInterface
{
    /**
     * Array with all parameters
     * @var array
     */
    private $_config = [];

    /**
     * Config constructor.
     * @param   null $autoload - File with array or array for auto loading
     */
    public function __construct($autoload = null)
    {
        if (!empty($autoload)) {
            // Read file from filesystem
            if (is_string($autoload)) {
                $this->load("$autoload");
            }
            // Parse parameters if array
            if (is_array($autoload)) {
                $this->setter($autoload);
            }
        }
    }

    /**
     * Load configuration file, show config path if needed
     *
     * @param   string $path - Path to file with array
     * @return  ConfigInterface
     */
    public function load(string $path): ConfigInterface
    {
        try {
            if (!file_exists($path)) {
                throw new ConfigException("Configuration file \"$path\" is not found");
            }
            if (!is_readable($path)) {
                throw new ConfigException("Configuration file \"$path\" is not readable");
            }
            $parameters = include "$path";

            if (!is_array($parameters)) {
                throw new ConfigException("Passed parameters is not array");
            }
            $this->setter($parameters);

        } catch (ConfigException $e) {
            // Error message implemented in exception
        }
        return $this;
    }

    /**
     * Put keys from array of parameters into internal array
     *
     * @param   array $parameters
     */
    private function setter(array $parameters)
    {
        // Parse array and set values
        array_map(
            function ($key, $value) {
                $this->set($key, $value);
            },
            array_keys($parameters),
            $parameters
        );
    }

    /**
     * Set some parameter of configuration
     *
     * @param   string $key
     * @param   mixed $value
     * @return  ConfigInterface
     */
    public function set(string $key, $value): ConfigInterface
    {
        $this->_config[$key] = $value;
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
        return empty($key)
            ? $this->_config
            : $this->_config[$key];
    }

    /**
     * Remove single value or clean config
     *
     * @param   string|null $key
     * @return  ConfigInterface
     */
    public function clean(string $key = null): ConfigInterface
    {
        $this->_config = [];
        return $this;
    }
}