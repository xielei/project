<?php

use Swoole\Server\PipeMessage;
use Swoole\Server\Task;
use Xielei\Swoole\Helper\TaskEvent as HelperTaskEvent;
use Xielei\Swoole\Worker;

class TaskEvent extends HelperTaskEvent
{
    public function onWorkerStart()
    {
    }

    public function onWorkerExit()
    {
    }

    public function onWorkerStop()
    {
    }

    public function onTask(Task $task)
    {
    }

    public function onPipeMessage(PipeMessage $pipeMessage)
    {
    }
}
