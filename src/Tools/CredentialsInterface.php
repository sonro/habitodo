<?php

namespace App\Tools;

use App\Model\Credentials;
use Symfony\Component\Serializer\SerializerInterface;

class CredentialsInterface
{
    /**
     * @var Credentials
     */
    private $credentials;

    public function __construct(SerializerInterface $serilaizer, $credentialsFile)
    {
        $json = file_get_contents($credentialsFile);
        $this->credentials =
            $serilaizer->deserialize($json, Credentials::class, 'json');
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
        return $this->credentials->getTaskApps();
    }

    public function getObject()
    {
        return $this->credentials;
    }
}
