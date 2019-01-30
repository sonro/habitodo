<?php

namespace App\Serializer;

use JMS\Serializer\SerializerInterface;
use App\Model\Task;
use App\Tools\CredentialsInterface;

class TaskNormalizer
{
    /**
     * @var NameConvertor
     */
    private $nameConvertor;

    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * @var PriorityConvertor
     */
    private $priorityConvertor;

    /**
     * @var CredentialsInterface
     */
    private $credentials;

    public function __construct(
        SerializerInterface $serializer,
        PriorityConvertor $priorityConvertor,
        NameConvertor $nameConvertor,
        CredentialsInterface $credentials
    ) {
        $this->serializer = $serializer;
        $this->priorityConvertor = $priorityConvertor;
        $this->nameConvertor = $nameConvertor;
        $this->credentials = $credentials;
    }

    public function normalize(Task $task, string $target): array
    {
        $json = $this->serializer->serialize($task, 'json');
        $taskData = json_decode($json, true);

        $taskData['project'] = $taskData['project'][$target.'Id'];
        $taskData['priority'] = $this->priorityConvertor
            ->convertToApp($taskData['priority'], $target);

        $data = $this->nameConvertor
            ->convertToApp($taskData, Task::class, $target);

        return $data;
    }

    public function denormalize(array $taskData, string $source): Task
    {
        $data = $this->nameConvertor
            ->convertFromApp($taskData, Task::class, $source);

        $data['priority'] = $this->priorityConvertor
            ->convertFromApp($data['priority'], $source);

        $projects = $this->credentials->getProjects();
        foreach ($projects as $project) {
            $getter = 'get'.ucfirst($source).'Id';
            if ($data['project'] == $project->$getter()) {
                unset($data['project']);
                $data['project']['habiticaId'] = $project->getHabiticaId();
                $data['project']['todoistId'] = $project->getTodoistId();
                break;
            }
        }

        $json = json_encode($data);

        return $this->serializer->deserialize($json, Task::class, 'json');
    }
}
