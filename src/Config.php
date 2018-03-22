<?php namespace DrMVC\Core;

/**
 * Class Config for access to application and system configs
 * @package System\Core
 */
class Config
{
    /**
     * Default path to configs folder
     */
    const folder = 'Configs';

    /**
     * Load configuration file, show config path if needed
     *
     * @param  string $name - Config name without (dot)php
     * @param  string $path - Path to config folder, if not set then get from const
     * @return mixed|null
     */
    public static function load($name, $path = null)
    {
        // If path is not set, then get default path
        if (empty($path)) $path = self::folder;

        switch (true) {
            case (defined('APPPATH')):
                // File path if APPPATH global const is defined
                $file = APPPATH
                    . DIRECTORY_SEPARATOR
                    . $path
                    . DIRECTORY_SEPARATOR
                    . $name
                    . '.php';
                break;
            default:
                error_log("APPPATH is not defined\n");
                // Default file path
                $file = null;
                break;
        }

        switch (true) {
            // If we found the config and config is not null
            case (!empty($file) && file_exists($file)):
                // Include the config by path
                $config = include($file);
                // If we need show file path
                if (@key_exists('path', $config) && true === $config['path'])
                    $config['path'] = $file;
                break;

            // If config not found
            default:
                $config = false;
                //if (empty($file)) $file = 'file';
                //error_log("$file not found\n");
                break;
        }

        return $config;
    }

}
