<?php

namespace App\ApiRequest;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;

class ApiRequester
{
    /**
     * @var Request
     */
    private $request;

    /**
     * @var Client
     */
    private $client;

    /**
     * @var Response
     */
    private $response;

    public function __construct(
        Client $client,
        Request $request
    ) {
        $this->client = $client;
        $this->request = $request;
    }

    /**
     * Send.
     *
     * @return int
     */
    public function send(): int
    {
        $this->response = $this->client->send($this->request);

        return $this->response->getStatusCode();
    }

    /**
     * Get the value of response.
     *
     * @return Response
     */
    public function getResponse()
    {
        return $this->response;
    }
}
