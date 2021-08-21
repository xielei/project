<?php

// 配置文件修改后立即生效(无须重启服务器)

return [
    // 是否开启调试模式
    'debug' => false,

    // 连接密钥
    'register_secret' => '123456',

    // 自动重载监听的文件或目录(配置文件已自动纳入)。
    'reload_watch' => [],

    // 限流
    'throttle' => true, // 是否开启限流服务
    'throttle_interval' => 10000, // 流量发放间隔时间 单位:毫秒
    'throttle_times' => 100, // 每次发放流量数
    'throttle_close' => 2, // 达到流量阈值的动作类型 0丢弃请求 1关闭当前客户端 2关闭当前客户端（强制） 3关闭当前IP的所有客户端 4关闭当前IP的所有客户端（强制）

    // 自定义命令
    'command_extra_list' => [],

    // 设置路由
    'router' => function (int $fd, int $cmd, array $worker_list) {
        if ($worker_list) {
            return $worker_list[array_keys($worker_list)[$fd % count($worker_list)]];
        }
    },
];
