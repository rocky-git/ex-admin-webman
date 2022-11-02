<?php
namespace ExAdmin\webman;

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
        $config = admin_config('admin');
        $config['plugin']['namespace'] = 'addons';
        $config['plugin']['dir'] = base_path('addons');
        admin_config($config,'admin');
        \ExAdmin\ui\support\Container::getInstance()->plugin->register();
    }
}