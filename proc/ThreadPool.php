<?php

namespace proc;


class ThreadPool extends \Pool{
    public $data = [];
    public function process()
    {
        // Run this loop as long as we have
        // jobs in the pool
        while (count($this->work)) {
            $this->collect(function ($task) {
                // If a task was marked as done
                // collect its results
                if ($task->isGarbage()) {
                    $tmpObj = new stdclass();
                    $tmpObj->complete = $task->complete;
                    //this is how you get your completed data back out [accessed by $pool->process()]
                    $this->data[] = $tmpObj;
                }
                return $task->isGarbage();
            });
        }
        // All jobs are done
        // we can shutdown the pool
        $this->shutdown();
        return $this->data;
    }
}