<?php

namespace App\Worker;

use App\Tools\Locker;
use Psr\Log\LoggerInterface;
use Predis\Client;

class Worker
{
    /**
     * @var Locker
     */
    private $locker;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var string|null
     */
    private $lockerKey;

    /**
     * @var Client
     */
    private $redis;

    /**
     * @var string
     */
    private $prefix;

    public function __construct(
        Locker $locker,
        LoggerInterface $logger,
        Client $redis,
        string $prefix
    ) {
        $this->locker = $locker;
        $this->logger = $logger;
        $this->redis = $redis;
        $this->prefix = $prefix;
    }

    public function run(): int
    {
        $errorCode = 0;
        $lockerKey = 0;

        try {
            // assign id and aquire lock
            $workerId = $this->redis->incr($this->prefix.'-id');
            $this->logger->info('Worker created', ['workerId' => $workerId]);
            $lockerKey = $this->locker->lock();
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage(), ['workerId', $workerId]);
            $errorCode = $e->getCode();
        }

        // unlock if aquired
        if ($lockerKey) {
            $this->locker->unlock($lockerKey);
        }
        $this->logger->info('Worker stopped', ['workerId' => $workerId]);

        return $errorCode;
    }
}
