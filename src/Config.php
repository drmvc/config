<?php namespace DrMVC;

/**
 * Class Config for access to application and system configs
 * @package DrMVC
 */
class Config implements Interfaces\Config
{
    /**
     * Array with all parameters
     * @var array
     */
    private $_config = [];

    /**
     * Config constructor.
     * @param null $autoload
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
     * Put keys from array of parameters into internal array
     *
     * @param   array $parameters
     * @return  Config
     */
    private function setter(array $parameters): Config
    {
        // Parse array and set values
        array_map(
            function ($key, $value) {
                $this->set($key, $value);
            },
            array_keys($parameters),
            $parameters
        );

        return $this;
    }

    /**
     * Load configuration file, show config path if needed
     *
     * @param   string $filename
     * @return  Interfaces\Config
     */
    public function load(string $filename): Interfaces\Config
    {
        try {
            if (!file_exists($filename)) {
                throw new ConfigException("Configuration file \"$filename\" is not found");
            }
            $parameters = include "$filename";

            if (!is_array($parameters)) {
                throw new ConfigException("Passed parameters is not array");
            }
            $this->setter($parameters);

        } catch (ConfigException $e) {
        }

        return $this;
    }

    /**
     * Set some parameter of configuration
     *
     * @param   string $key
     * @param   mixed $value
     * @return  Interfaces\Config
     */
    public function set(string $key, $value): Interfaces\Config
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

}
