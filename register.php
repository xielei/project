<?php

declare(strict_types=1);

use Xielei\Swoole\Register;

require_once __DIR__ . '/vendor/autoload.php';

$register = new Register('127.0.0.1', 9327, '123456');

// 设置服务端参数 参考:http://wiki.swoole.com/#/server/setting
$register->set([
    'log_file' => __DIR__ . '/log/register.log',
    'stats_file' => __DIR__ . '/log/register.stats.log',
]);

$register->start();
