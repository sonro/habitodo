<?php

namespace App\Model;

use JMS\Serializer\Annotation as JMS;

class TaskApp
{
    /**
     * @JMS\Type("string")
     *
     * @var string
     */
    private $baseUri;

    /**
     * @JMS\Type("string")
     *
     * @var string|null
     */
    private $userId;

    /**
     * @JMS\Type("string")
     *
     * @var string
     */
    private $apiToken;

    /**
     * @JMS\Type("string")
     *
     * @var string|null
     */
    private $userAgent;

    /**
     * @JMS\Type("string")
     *
     * @var string|null
     */
    private $clientSecret;

    /**
     * Get the value of baseUri.
     *
     * @return string
     */
    public function getBaseUri()
    {
        return $this->baseUri;
    }

    /**
     * Set the value of baseUri.
     *
     * @param string $baseUri
     *
     * @return self
     */
    public function setBaseUri(string $baseUri)
    {
        $this->baseUri = $baseUri;

        return $this;
    }

    /**
     * Get the value of apiToken.
     *
     * @return string
     */
    public function getApiToken()
    {
        return $this->apiToken;
    }

    /**
     * Set the value of apiToken.
     *
     * @param string $apiToken
     *
     * @return self
     */
    public function setApiToken(string $apiToken)
    {
        $this->apiToken = $apiToken;

        return $this;
    }

    /**
     * Get the value of userAgent.
     *
     * @return string|null
     */
    public function getUserAgent()
    {
        return $this->userAgent;
    }

    /**
     * Set the value of userAgent.
     *
     * @param string|null $userAgent
     *
     * @return self
     */
    public function setUserAgent($userAgent)
    {
        $this->userAgent = $userAgent;

        return $this;
    }

    /**
     * Get the value of clientSecret.
     *
     * @return string|null
     */
    public function getClientSecret()
    {
        return $this->clientSecret;
    }

    /**
     * Set the value of clientSecret.
     *
     * @param string|null $clientSecret
     *
     * @return self
     */
    public function setClientSecret($clientSecret)
    {
        $this->clientSecret = $clientSecret;

        return $this;
    }

    /**
     * Get the value of userId.
     *
     * @return string|null
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set the value of userId.
     *
     * @param string|null $userId
     *
     * @return self
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }
}
