<?php

namespace App\Model;

class Project
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $habiticaId;

    /**
     * @var int
     */
    private $todoistId;

    /**
     * Get the value of name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name.
     *
     * @param string $name
     *
     * @return self
     */
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of habiticaId.
     *
     * @return string
     */
    public function getHabiticaId()
    {
        return $this->habiticaId;
    }

    /**
     * Set the value of habiticaId.
     *
     * @param string $habiticaId
     *
     * @return self
     */
    public function setHabiticaId(string $habiticaId)
    {
        $this->habiticaId = $habiticaId;

        return $this;
    }

    /**
     * Get the value of todoistId.
     *
     * @return int
     */
    public function getTodoistId()
    {
        return $this->todoistId;
    }

    /**
     * Set the value of todoistId.
     *
     * @param int $todoistId
     *
     * @return self
     */
    public function setTodoistId(int $todoistId)
    {
        $this->todoistId = $todoistId;

        return $this;
    }
}
