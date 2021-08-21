<?php

// 配置文件修改后立即生效(无须重启服务器)

return [
    // 是否开启调试模式
    'debug' => false,

    // 连接密钥
    'register_secret' => '123456',

    // 自动重载监听的文件或目录(配置文件已自动纳入)。
    'reload_watch' => [__DIR__ . '/event/'],

    // 服务标签(供gateway自定义路由选择参考)
    'tag_list' => [],

    // worker事件文件
    'worker_file' => __DIR__ . '/event/worker.php',

    // task事件文件
    'task_file' => __DIR__ . '/event/task.php',
];
