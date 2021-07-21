<?php

use Xielei\Swoole\Helper\TaskEvent as HelperTaskEvent;

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
