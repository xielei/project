<?php

declare(strict_types=1);

use Xielei\Swoole\Gateway;

require_once __DIR__ . '/vendor/autoload.php';

$gateway = new Gateway();

// 设置服务端参数 参考:http://wiki.swoole.com/#/server/setting
$gateway->set([
    'log_file' => __DIR__ . '/log/gateway.log',
    'stats_file' => __DIR__ . '/log/gateway.stats.log',
]);

// 设置注册中心连接参数
$gateway->register_host = '127.0.0.1';
$gateway->register_port = 9327;
$gateway->register_secret_key = '123456';

// 设置内部连接参数
$gateway->lan_host = '127.0.0.1';
$gateway->lan_port = 9108;

// 设置限流参数,防止恶意刷服务器
$gateway->throttle_interval = 10000; // 流量发放间隔时间 毫秒
$gateway->throttle_times = 100; // 每次发放流量数
$gateway->throttle_close = 2; // 达到流量阈值的动作类型 0丢弃请求 1关闭客户端 2强制关闭客户端

// 监听一个裸TCP端口
$gateway->listen('127.0.0.1', 8000);

// 监听一个自定义协议TCP端口
$gateway->listen('127.0.0.1', 8001, [
    'open_eof_split' => true,   //打开EOF_SPLIT检测
    'package_eof'    => "\r\n", //设置EOF
]);

// 监听一个websocket协议端口
$gateway->listen('127.0.0.1', 8002, [
    'open_websocket_protocol' => true,
    'open_websocket_close_frame' => true,
]);

// 监听一个加密websocket协议端口
$gateway->listen('127.0.0.1', 8003, [
    'open_websocket_protocol' => true,
    'open_websocket_close_frame' => true,
    'ssl_cert_file' => __DIR__ . '/cert/xxx.pem',
    'ssl_key_file' => __DIR__ . '/cert/xxx.key',
], SWOOLE_SOCK_TCP | SWOOLE_SSL);

$gateway->start();
