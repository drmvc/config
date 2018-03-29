<?php

namespace DrMVC\Config;

/**
 * Class Config
 * @package DrMVC\Config
 */
class Config implements ConfigInterface
{
    /**
     * Array with all parameters
     * @var array
     */
    private $_config = [];

    /**
     * Config constructor.
     * @param null|string|array $data File with array or array for auto loading
     */
    public function __construct($data = null)
    {
        switch (true) {
            // If data is string, then need load file
            case (\is_string($data)):
                $this->load($data);
                break;
            // If data is array, the need to set
            case (\is_array($data)):
                $this->setter($data);
                break;
        }
    }

    /**
     * Load configuration file, show config path if needed
     *
     * @param   string $path path to file with array
     * @return  ConfigInterface
     */
    public function load(string $path): ConfigInterface
    {
        try {
            if (!file_exists($path)) {
                throw new Exception("Configuration file \"$path\" is not found");
            }
            if (!is_readable($path)) {
                throw new Exception("Configuration file \"$path\" is not readable");
            }
            $parameters = include $path;

            if (!\is_array($parameters)) {
                throw new Exception('Passed parameters is not array');
            }
            $this->setter($parameters);

        } catch (Exception $e) {
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
            function($key, $value) {
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
        $this->_config[$key] = \is_array($value)
            ? new Config($value)
            : $value;

        return $this;
    }

    /**
     * Get single parameter by name, or all available parameters
     *
     * @param   string|null $key
     * @return  string|array
     */
    public function get(string $key = null)
    {
        return (null === $key)
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
        if (null !== $key) {
            unset($this->_config[$key]);
        } else {
            $this->_config = [];
        }

        return $this;
    }
}
