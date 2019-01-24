<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use App\Worker\Worker;

class ProcessQueueCommand extends Command
{
    protected static $defaultName = 'app:process-queue';

    /**
     * @var Worker
     */
    private $worker;

    public function __construct(Worker $worker)
    {
        $this->worker = $worker;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setDescription('Starts up a Worker to process the jobQueue')
            ->setHelp('Initiate a Worker instance to pull jobs from the jobQueue')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->worker->run();
    }
}
