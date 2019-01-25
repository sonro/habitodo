<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Psr\Log\LoggerInterface;
use Predis\Client;
use App\Tools\CredentialsInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class WebhookController extends AbstractController
{
    /**
     * @var LoggerInterface
     */
    private $logger;

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
    private $queueKey;

    public function __construct(
        LoggerInterface $logger,
        Client $redis,
        CredentialsInterface $credentials,
        string $queueKey
    ) {
        $this->logger = $logger;
        $this->redis = $redis;
        $this->credentials = $credentials;
        $this->queueKey = $queueKey;
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
        $this->checkRequest($request);

        return new Response('good');
    }

    private function checkRequest(Request $request)
    {
        $queryToken = $request->query->get('token');
        $webhookToken = $this->credentials->getWebhookToken();
        if ($queryToken !== $webhookToken) {
            throw new AccessDeniedHttpException('Invalid webhook token');
        }

        if ($request->headers->get('Content-Type') !== 'application/json') {
            throw new BadRequestHttpException('Must be JSON');
        }
    }
}
