<?php

namespace ExAdmin\webman;

class Install
{
    const WEBMAN_PLUGIN = true;
    
    public static function install()
    {
        
        $filesystem = new \Symfony\Component\Filesystem\Filesystem();
        $filesystem->mirror(dirname(__DIR__, 1) . '/config', config_path());
    }

    /**
     * Uninstall
     * @return void
     */
    public static function uninstall()
    {
        $filesystem = new \Symfony\Component\Filesystem\Filesystem();
        $filesystem->remove(base_path('config/plugin/rockys/ex-admin-webman'));
    }
}