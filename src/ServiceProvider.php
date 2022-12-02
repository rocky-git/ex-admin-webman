<?php
namespace ExAdmin\webman;

use ExAdmin\webman\exception\Error;
use support\Container;
use Symfony\Component\Filesystem\Filesystem;
use Webman\Bootstrap;
use Workerman\Worker;

class ServiceProvider implements Bootstrap
{
    /**
     * @param Worker $worker
     *
     * @return void
     */
    public static function start($worker){
        set_error_handler([Container::make(Error::class), 'appError']);
        self::updateVersion();
        self::init();
        \ExAdmin\ui\support\Container::getInstance()->plugin->register();
    }
    public static function init(){
        $config = admin_config('admin');
        $config['plugin']['namespace'] = 'addons';
        $config['plugin']['dir'] = base_path('addons');
        admin_config($config,'admin');
    }
    protected static function updateVersion(){
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
}