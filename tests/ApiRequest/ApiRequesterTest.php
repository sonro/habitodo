<?php

namespace App\Tests\ApiRequest;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use App\ApiRequest\ApiRequester;

class ApiRequesterTest extends WebTestCase
{
    public function testGetRequest()
    {
        $config = [
            'base_uri' => 'https://google.com',
            'timeout' => '3',
        ];
        $client = new Client($config);
        $request = new Request('GET', '');

        $requester = new ApiRequester($client, $request);
        $result = $requester->send();
        $response = $requester->getResponse();

        $this->assertEquals(200, $result);
    }
}
