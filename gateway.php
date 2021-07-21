<?php

declare(strict_types=1);

use Xielei\Swoole\Gateway;

require_once __DIR__ . '/vendor/autoload.php';

$gateway = new Gateway();

// 配置register连接信息
$gateway->register_host = '127.0.0.1';
$gateway->register_port = 9327;
$gateway->register_secret_key = 'qwertyuiop';

// 设置内部连接地址端口
$gateway->lan_host = '127.0.0.1';
$gateway->lan_port = 9108;

// 监听
$gateway->listen('127.0.0.1', 8000, [
    'open_websocket_protocol' => true,
    'open_websocket_close_frame' => true,

    'heartbeat_idle_time' => 60,
    'heartbeat_check_interval' => 3,
]);

$gateway->start();
