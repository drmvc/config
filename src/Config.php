<?php namespace DrMVC\Core;

/**
 * Class Config for access to application and system configs
 * @package System\Core
 */
class Config
{
    /**
     * Load configuration file, show config path if needed
     *
     * @param  string $name
     * @param  boolean $show_path
     * @return mixed|null
     */
    public static function load($name, $show_path = false)
    {
        $appconfig = null;
        if (defined('APPPATH'))
            // Application config
            $appconfig = APPPATH . 'Configs' . DIRECTORY_SEPARATOR . $name . '.php';

        $sysconfig = null;
        if (defined('SYSPATH'))
            // System config
            $sysconfig = SYSPATH . 'Configs' . DIRECTORY_SEPARATOR . $name . '.php';

        switch (true) {
            // If we found the application config
            case file_exists($appconfig):
                $config = include($appconfig);
                if ($show_path) $config['path'] = $appconfig;
                break;

            // If we found the system config
            case file_exists($sysconfig):
                $config = include($sysconfig);
                if ($show_path) $config['path'] = $sysconfig;
                break;

            // If config not found
            default:
                $config = false;
                error_log("$appconfig not found");
                error_log("$sysconfig not found");
                break;
        }

        return $config;
    }

}
