<?php

use Symfony\Component\Filesystem\Filesystem;

function updateVersion(){
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
$config = admin_config('admin');
$config['plugin']['namespace'] = 'addons';
$config['plugin']['dir'] = base_path('addons');
admin_config($config,'admin');
\ExAdmin\ui\support\Container::getInstance()->plugin->register();
updateVersion();