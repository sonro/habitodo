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
     * @var array
     */
    private $data;

    /**
     * @var array
     */
    private $taskIds;

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

    /**
     * Get the value of data.
     *
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set the value of data.
     *
     * @param array $data
     *
     * @return self
     */
    public function setData(array $data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get the value of taskIds.
     *
     * @return array
     */
    public function getTaskIds()
    {
        return $this->taskIds;
    }

    /**
     * Set the value of taskIds.
     *
     * @param array $taskIds
     *
     * @return self
     */
    public function setTaskIds(array $taskIds)
    {
        $this->taskIds = $taskIds;

        return $this;
    }

    /**
     * Get the value of a specific task id.
     *
     * @param string $taskName
     *
     * @return array
     */
    public function getTaskId(string $taskName)
    {
        return $this->taskIds[$taskName];
    }

    /**
     * Add a task id.
     *
     * @param string $taskName
     * @param string $id
     *
     * @return self
     */
    public function addTaskId(string $taskName, string $id)
    {
        $this->taskIds[$taskName] = $id;

        return $this;
    }
}
