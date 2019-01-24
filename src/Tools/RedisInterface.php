<?php

namespace App\Tools;

use Predis\Client;

class RedisInterface
{
    /**
     * @var Client
     */
    private $redis;

    public function __construct(Client $redis)
    {
        $this->redis = $redis;
    }
}
