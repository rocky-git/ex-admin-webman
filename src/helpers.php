<?php
$filesystem = new \Symfony\Component\Filesystem\Filesystem();
$filesystem->mirror(dirname(__DIR__,1) . '/command',dirname(__DIR__,4).'/app/command');
        