<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Psr\Log\LoggerInterface;

class WebhookController extends AbstractController
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
        // $this->redis = $redis;
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
    public function custom(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        return $this->json($data);
    }
}
