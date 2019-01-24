<?php

namespace App\Worker;

use App\Tools\Locker;
use Psr\Log\LoggerInterface;

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
    private $lockerKey = null;

    public function __construct(Locker $locker, LoggerInterface $logger)
    {
        $this->locker = $locker;
        $this->logger = $logger;
    }

    public function run()
    {
        $this->lockerKey = $this->locker->lock();
        $this->logger->info('Worker running', ['lockerKey' => $this->lockerKey]);
    }

    public function stop()
    {
        $this->locker->unlock($this->lockerKey);
        $this->logger->info('Worker stopped', ['lockerKey' => $this->lockerKey]);
    }
}
