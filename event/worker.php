<?php

declare(strict_types=1);

use Swoole\Server\PipeMessage;
use Swoole\Server\TaskResult;
use Xielei\Swoole\Api;
use Xielei\Swoole\Helper\WorkerEvent as HelperWorkerEvent;

class WorkerEvent extends HelperWorkerEvent
{
    public function onWorkerStart()
    {
    }

    public function onWorkerStop()
    {
    }

    public function onWorkerExit()
    {
    }

    public function onPipeMessage(PipeMessage $pipeMessage)
    {
    }

    public function onFinish(TaskResult $taskResult)
    {
    }

    public function onConnect(string $client, array $session)
    {
        Api::sendToAll("{$client} connect~\n");
    }

    public function onReceive(string $client, array $session, string $data)
    {
        Api::sendToAll("{$client} say {$data}\n");
    }

    public function onClose(string $client, array $session, array $bind)
    {
        Api::sendToAll("{$client} exit~\n");
    }
}
