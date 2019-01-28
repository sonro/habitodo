<?php

namespace App\Model;

class Task
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var \DateTime|null
     */
    private $dueDate;

    /**
     * @var string
     */
    private $info;

    /**
     * @var int
     */
    private $priority;

    /**
     * @var array
     */
    private $reminders;

    /**
     * @var array
     */
    private $checklist;

    /**
     * @var Project
     */
    private $project;

    /**
     * @var bool
     */
    private $completed;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
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
     * @return int
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Set the value of priority.
     *
     * @param int $priority
     *
     * @return self
     */
    public function setPriority(int $priority)
    {
        $this->priority = $priority;

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
     * @return Project
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * Set the value of project.
     *
     * @param Project $project
     *
     * @return self
     */
    public function setProject(Project $project)
    {
        $this->project = $project;

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
}
