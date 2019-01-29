<?php

namespace App\Worker;

use App\Tools\Locker;
use Psr\Log\LoggerInterface;
use Predis\Client;
use App\Tools\CredentialsInterface;
use JMS\Serializer\SerializerInterface;
use App\Model\Task;
use App\Facade\HabiticaTaskFacade;

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
     * @var CredentialsInterface
     */
    private $credentials;

    /**
     * @var string
     */
    private $prefix;

    /**
     * @var SerializerInterface
     */
    private $serializer;

    public function __construct(
        Locker $locker,
        LoggerInterface $logger,
        Client $redis,
        CredentialsInterface $credentials,
        SerializerInterface $serializer,
        string $prefix
    ) {
        $this->locker = $locker;
        $this->logger = $logger;
        $this->redis = $redis;
        $this->prefix = $prefix;
        $this->credentials = $credentials;
        $this->serializer = $serializer;
    }

    public function run(): int
    {
        $errorCode = 0;
        $lockerKey = null;

        // test Task
        $task = new Task();
        $task->setTitle('Test Task');
        $task->setChecklist([]);
        $task->setReminders([]);
        $task->setCreatedAt(new \DateTime());
        $task->setUpdatedAt($task->getCreatedAt());
        $task->setInfo('More infomation');
        $task->setPriority(1);
        $project = $this->credentials->getProjects()['life'];
        $task->setProject($project);

        $habiticaTask = HabiticaTaskFacade::createFromTask($task);
        dump($habiticaTask);
        die;

        try {
            // assign id and aquire lock
            $workerId = $this->redis->incr($this->prefix.'-id');
            $this->logger->info('Worker created', ['workerId' => $workerId]);
            $lockerKey = $this->locker->lock(30, true);
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage(), ['workerId', $workerId]);
            $errorCode = $e->getCode();
        }

        // unlock if aquired
        if ($lockerKey !== null) {
            $this->locker->unlock($lockerKey);
        }
        $this->logger->info('Worker stopped', ['workerId' => $workerId]);

        return $errorCode;
    }
}
