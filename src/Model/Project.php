<?php

namespace App\Model;

use JMS\Serializer\Annotation as JMS;

class Project
{
    /**
     * @JMS\Type("string")
     *
     * @var string
     */
    private $habiticaId;

    /**
     * @JMS\Type("int")
     *
     * @var int
     */
    private $todoistId;

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
