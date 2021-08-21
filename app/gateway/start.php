<?php

declare(strict_types=1);

use Xielei\Swoole\Gateway;

require __DIR__ . '/../../vendor/autoload.php';

$gateway = new Gateway();

// 设置配置文件
$gateway->config_file = __DIR__ . '/config.php';

// 设置服务端参数 参考:http://wiki.swoole.com/#/server/setting
$gateway->set([
    'log_file' => __DIR__ . '/log/gateway.log',
    'stats_file' => __DIR__ . '/log/gateway.stats.log',
]);

// 设置注册中心连接参数
$gateway->register_host = '127.0.0.1';
$gateway->register_port = 9327;

// 设置内部连接参数
$gateway->lan_host = '127.0.0.1';
$gateway->lan_port = 9108;

// 监听一个裸TCP端口
$gateway->listen('127.0.0.1', 8000);

// // 监听一个自定义协议TCP端口
// $gateway->listen('127.0.0.1', 8001, [
//     'open_eof_split' => true,   //打开EOF_SPLIT检测
//     'package_eof'    => "\r\n", //设置EOF
// ]);

// // 监听一个websocket协议端口
// $gateway->listen('127.0.0.1', 8002, [
//     'open_websocket_protocol' => true,
//     'open_websocket_close_frame' => true,
// ]);

// // 监听一个加密websocket协议端口
// $gateway->listen('127.0.0.1', 8003, [
//     'open_websocket_protocol' => true,
//     'open_websocket_close_frame' => true,
//     'ssl_cert_file' => __DIR__ . '/cert/xxx.pem',
//     'ssl_key_file' => __DIR__ . '/cert/xxx.key',
// ], SWOOLE_SOCK_TCP | SWOOLE_SSL);

$gateway->start();
