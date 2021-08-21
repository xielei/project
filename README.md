# SwooleWorker脚手架

这是一个[【SwooleWorker】](https://swoole.plus)脚手架

## 安装

**方式1(推荐)：**

``` bash
composer create-project xielei/project
```

**方式2：**

[直接下载](https://github.com/xielei/project/archive/refs/heads/main.zip)本项目，然后执行:

``` bash
composer install
```

## 启动

``` bash
[root@VM-0-17-centos project]# php app/register/start.php start -d
the service is running with daemonize
[root@VM-0-17-centos project]# php app/worker/start.php start -d
the service is running with daemonize
[root@VM-0-17-centos project]# php app/gateway/start.php start -d
the service is running with daemonize
[root@VM-0-17-centos project]# 
```

## 体验测试

窗口1：

``` bash
[root@VM-0-17-centos project]# telnet 127.0.0.1 8000
Trying 127.0.0.1...
Connected to 127.0.0.1.
Escape character is '^]'.
7f000001239400000001 connect~
7f000001239400000002 connect~
7f000001239400000002 say 你好
嗯嗯 我很好
7f000001239400000001 say 嗯嗯 我很好
7f000001239400000002 say 拜拜
7f000001239400000002 exit~
```

窗口2

``` bash
[root@VM-0-17-centos project]# telnet 127.0.0.1 8000
Trying 127.0.0.1...
Connected to 127.0.0.1.
Escape character is '^]'.
7f000001239400000002 connect~
你好
7f000001239400000002 say 你好
7f000001239400000001 say 嗯嗯 我很好
拜拜
7f000001239400000002 say 拜拜
^]quit

telnet> quit
Connection closed.
[root@VM-0-17-centos project]# 
```
