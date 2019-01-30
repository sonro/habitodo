<?php

namespace App\Tests\Serializer;

use App\Model\Task;
use App\Serializer\TaskNormalizer;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Tools\CredentialsInterface;

class TaskNormalizerTest extends WebTestCase
{
    /**
     * @var TaskNormalizer
     */
    private $normalizer;

    /**
     * @var CredentialsInterface
     */
    private $credentials;

    public function setUp()
    {
        self::bootKernel();
        $this->normalizer = self::$container->get('App\Serializer\TaskNormalizer');
        $this->credentials = self::$container->get('App\Tools\CredentialsInterface');
    }

    public function testNormalizeHabitica()
    {
        $task = new Task();

        $task->setTitle('A Test Title');
        $task->setDueDate(new \DateTime('tomorrow'));
        $task->setPriority(1);

        $project = $this->credentials->getProject('life');
        $task->setProject($project);

        $data = $this->normalizer->normalize($task, 'habitica');

        $this->assertArrayHasKey('text', $data);
        $this->assertEquals($project->getHabiticaId(), $data['tags']);
        $this->assertEquals('1', $data['priority']);
        $this->assertEquals('1', $data['priority']);
    }

    public function testDenormalizeHabitica()
    {
        $project = $this->credentials->getProject('life');
        $data = [
            'text' => 'A Test Title',
            'date' => '2019-01-31T00:00:00+00:00',
            'priority' => '1',
            'tags' => $project->getHabiticaId(),
        ];

        $task = $this->normalizer->denormalize($data, 'habitica');

        $this->assertEquals($task->getTitle(), $data['text']);
    }
}
