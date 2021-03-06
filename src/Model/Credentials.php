<?php

namespace App\Model;

use JMS\Serializer\Annotation as JMS;

class Credentials
{
    /**
     * @JMS\Type("string")
     *
     * @var string
     */
    private $webhookToken;

    /**
     * @JMS\Type("array<string, App\Model\TaskApp>")
     *
     * @var array
     */
    private $taskApps;

    /**
     * @JMS\Type("array<string, App\Model\Project>")
     *
     * @var array
     */
    private $projects;

    /**
     * Get the value of webhookToken.
     *
     * @return string
     */
    public function getWebhookToken()
    {
        return $this->webhookToken;
    }

    /**
     * Set the value of webhookToken.
     *
     * @param string $webhookToken
     *
     * @return self
     */
    public function setWebhookToken(string $webhookToken)
    {
        $this->webhookToken = $webhookToken;

        return $this;
    }

    /**
     * Get the value of taskApps.
     *
     * @return TaskApp[]
     */
    public function getTaskApps()
    {
        return $this->taskApps;
    }

    /**
     * Set the value of taskApps.
     *
     * @param TaskApp[] $taskApps
     *
     * @return self
     */
    public function setTaskApps(array $taskApps)
    {
        $this->taskApps = $taskApps;

        return $this;
    }

    /**
     * Get the value of projects.
     *
     * @return Project[]
     */
    public function getProjects()
    {
        return $this->projects;
    }

    /**
     * Set the value of projects.
     *
     * @param Project[] $projects
     *
     * @return self
     */
    public function setProjects(array $projects)
    {
        $this->projects = $projects;

        return $this;
    }
}
