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
    private static $config = [];

    /**
     * Config constructor.
     * @param   null $autoload - File with array or array for auto loading
     */
    public function __construct($autoload = null)
    {
        if (!empty($autoload)) {
            // Read file from filesystem
            if (is_string($autoload)) {
                self::load("$autoload");
            }
            // Parse parameters if array
            if (is_array($autoload)) {
                self::setter($autoload);
            }
        }
    }

    /**
     * Put keys from array of parameters into internal array
     *
     * @param   array $parameters
     * @return  bool
     */
    private static function setter(array $parameters)
    {
        // Parse array and set values
        array_map(
            function ($key, $value) {
                self::set($key, $value);
            },
            array_keys($parameters),
            $parameters
        );
        return true;
    }

    /**
     * Load configuration file, show config path if needed
     *
     * @param   string $path - Path to file with array
     */
    public static function load($path)
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
            self::setter($parameters);

        } catch (ConfigException $e) {
        }
    }

    /**
     * Set some parameter of configuration
     *
     * @param   string $key
     * @param   mixed $value
     * @return  bool
     */
    public static function set(string $key, $value)
    {
        self::$config[$key] = $value;
        return true;
    }

    /**
     * Get single parameter by name, or all available parameters
     *
     * @param   string|null $key
     * @return  mixed
     */
    public static function get(string $key = null)
    {
        return empty($key)
            ? self::$config
            : self::$config[$key];
    }

    /**
     * @param string|null $key
     * @return bool
     */
    public static function clean(string $key = null)
    {
        if (!empty($key)) {
            // If key is set, then unset from array
            unset(self::$config[$key]);
        } else {
            // Or cleanup array with configs
            self::$config = [];
        }

        return true;
    }
}