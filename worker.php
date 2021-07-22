<?php

declare(strict_types=1);

use Xielei\Swoole\Worker;

require_once __DIR__ . '/vendor/autoload.php';

$worker = new Worker();

// 设置服务端参数 参考:http://wiki.swoole.com/#/server/setting
$worker->set([
    'log_file' => __DIR__ . '/log/worker.log',
    'stats_file' => __DIR__ . '/log/worker.stats.log',
    'hook_flags' => SWOOLE_HOOK_ALL, // 建议开启
]);

// 设置注册中心连接参数
$worker->register_host = '127.0.0.1';
$worker->register_port = 9327;
$worker->register_secret_key = '123456';

// 设置自动软重启
$worker->auto_reload = true;
$worker->auto_reload_interval = 1;
$worker->auto_reload_dir = [__DIR__ . '/event'];

// 设置事件处理文件
$worker->worker_file = __DIR__ . '/event/worker.php';
$worker->task_file = __DIR__ . '/event/task.php';

$worker->start();
