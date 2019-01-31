<?php

namespace App\ApiRequest;

use App\Model\Job;
use App\Tools\CredentialsInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use App\Model\TaskApp;

class ApiRequesterFactory
{
    /**
     * @var CredentialsInterface
     */
    private $credentials;

    public function __construct(
        CredentialsInterface $credentials
    ) {
        $this->credentials = $credentials;
    }

    public function createFromJob(Job $job, string $target)
    {
        $taskApp = $this->credentials->getTaskApp($target);
        $client = $this->createClient($taskApp, $target);
        $headers = $this->createHeaders($taskApp, $target);

        if ($job->getType() !== Job::TYPE_CREATE) {
            if (empty($job->getTaskId($target))) {
                $id = $this->getTaskId();
                $job->addTaskId([$target], $id);
            }
        }

        $request = new Request($method, $uri, $headers, $body);

        return new ApiRequester($client, $request);
    }

    private function createClient(TaskApp $taskApp, string $target)
    {
        $guzzleConfig = [
            'base_uri' => $taskApp->getBaseUri(),
            'timeout' => 3,
        ];
        $client = new Client($guzzleConfig);

        return $client;
    }

    public function getTaskId(Job $job, string $target): string
    {
        $title = $job->getTask()->getTitle();
        $completed = $job->getTask()->isCompleted();

        $taskApp = $this->credentials->getTaskApp($target);
        $client = $this->createClient($taskApp, $target);
        $headers = $this->createHeaders($taskApp, $target);

        // TODO: Unable to fetch todoist app deleted task data. Best to add a database to this app

        // get list of tasks
        $queryString = '';
        if ($target === 'habitica') {
            $type = $completed ? 'completedTodos' : 'todos';
            $queryString = "?type=$type";
        }

        $request = new Reqeust($method, $uri, $headers, $body);

        return $taskId;
    }

    private function createHeaders(TaskApp $taskApp, string $target): array
    {
        $headers = [
            'Content-Type' => 'application/json',
            'accept' => 'application/json',
        ];
        if ($target === 'habitica') {
            $headers['x-api-user'] = $taskApp->getUserId();
            $headers['x-api-key'] = $taskApp->getApiToken();
        } elseif ($target === 'todoist') {
            $headers['Authorization'] = 'Bearer '.$taskApp->getApiToken();
        }

        return $headers;
    }
}
