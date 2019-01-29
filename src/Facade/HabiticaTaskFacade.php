<?php

namespace App\Facade;

use JMS\Serializer\Annotation as JMS;
use App\Model\Project;
use App\Model\Task;

class HabiticaTaskFacade
{
    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("text")
     *
     * @var string
     */
    private $title;

    /**
     * @JMS\Type("DateTime")
     * @JMS\SerializedName("date")
     *
     * @var \DateTime|null
     */
    private $dueDate;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("notes")
     *
     * @var string
     */
    private $info;

    /**
     * @JMS\Type("string")
     *
     * @var int
     */
    private $priority;

    /**
     * @JMS\Type("array")
     *
     * @var array
     */
    private $reminders;

    /**
     * @JMS\Type("array")
     *
     * @var array
     */
    private $checklist;

    /**
     * @JMS\Type("array<string>")
     * @JMS\SerializedName("tags")
     *
     * @var Project
     */
    private $project;

    /**
     * @JMS\Type("bool")
     *
     * @var bool
     */
    private $completed;

    /**
     * @JMS\Type("DateTime")
     *
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @JMS\Type("DateTime")
     *
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @JMS\Type("DateTime")
     *
     * @var \DateTime|null
     */
    private $dateCompleted;

    /**
     * Get the value of title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title.
     *
     * @param string $title
     *
     * @return self
     */
    public function setTitle(string $title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of dueDate.
     *
     * @return \DateTime|null
     */
    public function getDueDate()
    {
        return $this->dueDate;
    }

    /**
     * Set the value of dueDate.
     *
     * @param \DateTime|null $dueDate
     *
     * @return self
     */
    public function setDueDate($dueDate)
    {
        $this->dueDate = $dueDate;

        return $this;
    }

    /**
     * Get the value of info.
     *
     * @return string
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * Set the value of info.
     *
     * @param string $info
     *
     * @return self
     */
    public function setInfo(string $info)
    {
        $this->info = $info;

        return $this;
    }

    /**
     * Get the value of priority.
     *
     * @return string
     */
    public function getPriority()
    {
        $priority = '0.1';
        switch ($this->priority) {
            case 1:
                $priority = '1';
                break;
            case 2:
                $priority = '1.5';
                break;
            case 3:
            case 4:
                $priority = '2';
                break;
        }

        return $priority;
    }

    /**
     * Set the value of priority.
     *
     * @param $priority
     *
     * @return self
     */
    public function setPriority($priority)
    {
        if ($priority == '0.1' || $priority == '1') {
            $this->priority = 1;
        } elseif ($priority == '1.5') {
            $this->priority = 2;
        } else {
            $this->priority = 3;
        }

        return $this;
    }

    /**
     * Get the value of reminders.
     *
     * @return array
     */
    public function getReminders()
    {
        return $this->reminders;
    }

    /**
     * Set the value of reminders.
     *
     * @param array $reminders
     *
     * @return self
     */
    public function setReminders(array $reminders)
    {
        $this->reminders = $reminders;

        return $this;
    }

    /**
     * Get the value of checklist.
     *
     * @return array
     */
    public function getChecklist()
    {
        return $this->checklist;
    }

    /**
     * Set the value of checklist.
     *
     * @param array $checklist
     *
     * @return self
     */
    public function setChecklist(array $checklist)
    {
        $this->checklist = $checklist;

        return $this;
    }

    /**
     * Get the value of project.
     *
     * @return array
     */
    public function getProject()
    {
        return [$this->project->getHabiticaId()];
    }

    /**
     * Set the value of project.
     *
     * @param array $project
     *
     * @return self
     */
    public function setProject(array $project)
    {
        $this->project = new Project();
        $this->project->setHabiticaId($project);

        return $this;
    }

    /**
     * Get the value of completed.
     *
     * @return bool
     */
    public function isCompleted()
    {
        return $this->completed;
    }

    /**
     * Set the value of completed.
     *
     * @param bool $completed
     *
     * @return self
     */
    public function setCompleted(bool $completed)
    {
        $this->completed = $completed;

        return $this;
    }

    /**
     * Get the value of createdAt.
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set the value of createdAt.
     *
     * @param \DateTime $createdAt
     *
     * @return self
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get the value of updatedAt.
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set the value of updatedAt.
     *
     * @param \DateTime $updatedAt
     *
     * @return self
     */
    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get the value of dateCompleted.
     *
     * @return \DateTime|null
     */
    public function getDateCompleted()
    {
        return $this->dateCompleted;
    }

    /**
     * Set the value of dateCompleted.
     *
     * @param \DateTime|null $dateCompleted
     *
     * @return self
     */
    public function setDateCompleted($dateCompleted)
    {
        $this->dateCompleted = $dateCompleted;

        return $this;
    }

    public static function createFromTask(Task $task)
    {
        $properties = array_keys(get_class_vars(HabiticaTaskFacade::class));
        $facade = new self();
        foreach ($properties as $property) {
            $property = ucfirst($property);
            $taskMethod = 'get'.$property;
            $facadeMethod = 'set'.$property;
            $facade->$facadeMethod($task->$taskMethod());
        }

        return $facade;
    }
}
