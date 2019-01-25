<?php

namespace App\Model;

class Job
{
    const STATE_NEW = 1;
    const STATE_WORKING = 3;
    const STATE_SENT = 4;

    const TYPE_CREATE = 1;
    const TYPE_UPDATE = 2;
    const TYPE_COMPLETE = 3;
    const TYPE_UNCOMPLETE = 4;
    const TYPE_DELETE = 5;
    const TYPE_CHECKLIST_ITEM_COMPLETE = 6;
    const TYPE_CHECKLIST_ITEM_UNCOMPLETE = 7;

    /**
     * @var int
     */
    private $state;

    /**
     * @var int
     */
    private $type;

    /**
     * @var Task
     */
    private $task;

    /**
     * @var TaskApp
     */
    private $source;

    /**
     * @var array
     */
    private $targets;

    /**
     * Get the value of state.
     *
     * @return int
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set the value of state.
     *
     * @param int $state
     *
     * @return self
     */
    public function setState(int $state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get the value of type.
     *
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type.
     *
     * @param int $type
     *
     * @return self
     */
    public function setType(int $type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of task.
     *
     * @return Task
     */
    public function getTask()
    {
        return $this->task;
    }

    /**
     * Set the value of task.
     *
     * @param Task $task
     *
     * @return self
     */
    public function setTask(Task $task)
    {
        $this->task = $task;

        return $this;
    }

    /**
     * Get the value of source.
     *
     * @return TaskApp
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Set the value of source.
     *
     * @param TaskApp $source
     *
     * @return self
     */
    public function setSource(TaskApp $source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * Get the value of targets.
     *
     * @return array
     */
    public function getTargets()
    {
        return $this->targets;
    }

    /**
     * Set the value of targets.
     *
     * @param TaskApp[] $targets
     *
     * @return self
     */
    public function setTargets(array $targets)
    {
        $this->targets = $targets;

        return $this;
    }
}
