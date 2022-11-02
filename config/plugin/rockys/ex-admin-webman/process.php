<?php
return [
    'ex_admin_consumer'  => [
        'handler'     => Webman\RedisQueue\Process\Consumer::class,
        'count'       => 8, // 可以设置多进程同时消费
        'constructor' => [
            // 消费者类目录
            'consumer_dir' => base_path() . '/addons/webman/grid/Jobs'
        ]
    ]
];