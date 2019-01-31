<?php

namespace App\Tools;

use App\Model\Credentials;
use JMS\Serializer\SerializerInterface;
use App\Model\Project;
use App\Model\TaskApp;

class CredentialsInterface
{
    /**
     * @var Credentials
     */
    private $credentials;

    public function __construct(SerializerInterface $serilaizer, $credentialsFile)
    {
        $json = file_get_contents($credentialsFile);
        $this->credentials = $serilaizer->deserialize($json, Credentials::class, 'json');
    }

    /**
     * Get the value of webhookToken.
     *
     * @return string
     */
    public function getWebhookToken()
    {
        return $this->credentials->getWebhookToken();
    }

    /**
     * Get the value of taskApps.
     *
     * @return TaskApp[]
     */
    public function getTaskApps()
    {
        return $this->credentials->getTaskApps();
    }

    /**
     * Get the value of projects.
     *
     * @return Project[]
     */
    public function getProjects()
    {
        return $this->credentials->getProjects();
    }

    /**
     * Get a project accoding to it's name.
     *
     * @param string $name
     *
     * @return Project
     */
    public function getProject(string $name): Project
    {
        return ($this->credentials->getProjects())[$name];
    }

    public function getTaskApp(string $name): TaskApp
    {
        return ($this->credentials->getTaskApps())[$name];
    }

    public function getObject()
    {
        return $this->credentials;
    }
}
