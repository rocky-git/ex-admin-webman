<?php

namespace ExAdmin\webman\command;

use support\Db;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Filesystem\Filesystem;


class AdminInstall extends Command
{
    protected static $defaultName = 'admin:install';
    protected static $defaultDescription = 'Install the admin package';

    /**
     * @return void
     */
    protected function configure()
    {
        $this->addOption('force', 'f',InputOption::VALUE_NONE, 'Force overwrite file');
        $this->addOption('versions', null,InputOption::VALUE_REQUIRED, 'version number');
        $this->addOption('username', null,InputOption::VALUE_REQUIRED, 'username');
        $this->addOption('password', null,InputOption::VALUE_REQUIRED, 'password');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $filesystem = new Filesystem();
        $filesystem->mirror(base_path() .'/vendor/rockys/ex-admin-ui/resources',public_path('exadmin'),null,['override'=>$input->getOption('force')]);
        $path = plugin()->download('webman',$input->getOption('versions'));
        if ($path === false) {
            $output->writeln('下载插件失败');
            return 0;
        }
        $result = plugin()->install($path,$input->getOption('force'));
        if ($result !== true) {
            $output->writeln($result);
            return 0;
        }
        unlink($path);
        plugin()->buildIde();
        $username = $input->getOption('username');
        $password = $input->getOption('password');
        if($username && $password){
            $table = plugin()->webman->config('database.user_table');
            Db::table($table)->where('id',1)
                ->update([
                    'username' => $username,
                    'password' => password_hash($password,PASSWORD_DEFAULT),
                ]);
        }

        $input  = new ArrayInput(['webman']);
        $output = new ConsoleOutput();
        $this->getApplication()->find('plugin:composer')->run($input,$output);
        $output->writeln('install success');
        return self::SUCCESS;
    }

}
