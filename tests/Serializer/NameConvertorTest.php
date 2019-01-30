<?php

namespace App\Tests\Serializer;

use App\Model\Task;
use App\Serializer\NameConvertor;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use JMS\Serializer\SerializerInterface;

class NameConvertorTest extends WebTestCase
{
    /**
     * @var NameConvertor
     */
    private $convertor;

    /**
     * @var SerializerInterface
     */
    private $serializer;

    public function setUp()
    {
        self::bootKernel();
        $this->convertor = self::$container->get('App\Serializer\NameConvertor');
        $this->serializer = self::$container->get('jms_serializer.serializer');
    }

    public function testConvertToApp()
    {
        $task = new Task();
        $task->setTitle('A Test Title');
        $task = json_decode($this->serializer->serialize($task, 'json'), true);

        $data = $this->convertor->convertToApp($task, Task::class, 'test');

        $this->assertArrayHasKey('convertedTitle', $data);
        $this->assertArrayNotHasKey('title', $data);
    }

    public function testConvertFromApp()
    {
        $task = [
            'convertedTitle' => 'A Test Title',
        ];

        $data = $this->convertor->convertFromApp($task, Task::class, 'test');

        $this->assertArrayHasKey('title', $data);
        $this->assertArrayNotHasKey('convertedTitle', $data);
    }
}
