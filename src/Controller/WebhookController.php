<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Psr\Log\LoggerInterface;
use App\Tools\RedisInterface;
use App\Worker\Worker;

class WebhookController extends AbstractController
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var RedisInterface
     */
    private $redis;

    public function __construct(LoggerInterface $logger, RedisInterface $redis)
    {
        $this->logger = $logger;
        $this->redis = $redis;
    }

    /**
     * @Route("/webhook/habitica", methods={"POST"})
     */
    public function habitica(Request $request)
    {
    }

    /**
     * @Route("/webhook/todoist", methods={"POST"})
     */
    public function todoist(Request $request)
    {
    }

    /**
     * @Route("/webhook/custom", methods={"POST"})
     */
    public function custom(Request $request, Worker $worker)
    {
        $data = json_decode($request->getContent(), true);

        $worker->run();
        $worker->stop();

        return $this->json($data);
    }
}
