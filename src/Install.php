<?php

namespace ExAdmin\webman;

class Install
{
    const WEBMAN_PLUGIN = true;
    
    public static function install()
    {
        
        $filesystem = new \Symfony\Component\Filesystem\Filesystem();
        $filesystem->mirror(dirname(__DIR__, 1) . '/config', config_path());
        
        //静态
        $file = public_path('exadmin').DIRECTORY_SEPARATOR.'version';
        $update = false;
        if(!is_file($file)){
            $update = true;
        }
        if(!$update && file_get_contents($file) != ex_admin_version()){
            $update = true;
        }
        if($update){
            $filesystem = new Filesystem();
            $filesystem->mirror(dirname(__DIR__,2) . '/ex-admin-ui/resources',public_path('exadmin'),null,['override'=>true]);
            file_put_contents($file,ex_admin_version());
        }
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