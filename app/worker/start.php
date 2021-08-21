<?php

declare(strict_types=1);

use Xielei\Swoole\Worker;

require __DIR__ . '/../../vendor/autoload.php';

$worker = new Worker();

// 设置配置文件
$worker->config_file = __DIR__ . '/config.php';

// 设置服务端参数 参考:http://wiki.swoole.com/#/server/setting
$worker->set([
    'log_file' => __DIR__ . '/log/worker.log',
    'stats_file' => __DIR__ . '/log/worker.stats.log',
    'hook_flags' => SWOOLE_HOOK_ALL, // 建议开启
]);

// 设置注册中心连接参数
$worker->register_host = '127.0.0.1';
$worker->register_port = 9327;

$worker->start();
