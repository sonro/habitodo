<?php

namespace App\Tools;

use Predis\Client;

class Locker
{
    /**
     * @var Client
     */
    private $redis;

    /**
     * @var string
     */
    private $mutex;

    public function __construct(Client $redis, string $mutex)
    {
        $this->redis = $redis;
        $this->mutex = $mutex;
    }

    public function lock(int $seconds = 30): string
    {
        $key = random_bytes(8);

        $cmdArgs = ['set', $this->mutex, $key, 'EX', $seconds, 'NX'];

        if (!$this->redis->executeRaw($cmdArgs)) {
            throw new \Exception('Worker already running', 1);
        }

        return $key;
    }

    public function unlock(string $key)
    {
        if ($this->redis->get($this->mutex) === $key) {
            $this->redis->del($this->mutex);
        }
    }
}
