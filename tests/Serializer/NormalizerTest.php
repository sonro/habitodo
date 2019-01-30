<?php

namespace App\Tests\Serializer;

use App\Serializer\Normalizer;
use App\Model\Task;
use PHPUnit\Framework\TestCase;

class NormalizerTest extends TestCase
{
    /**
     * @var Normalizer
     */
    private $normalizer;

    public function setUp()
    {
        $this->normalizer = new Normalizer(__DIR__.'/../../app-convertion.json');
    }

    public function testConvertingNormalization()
    {
        $task = new Task();
        $task->setTitle('A Test Title');
        $task->setDueDate(new \DateTime());

        $data = $this->normalizer->normalize($task, 'test');
        dump($data);
        $this->assertArrayHasKey('convertedTitle', $data);
    }
}
