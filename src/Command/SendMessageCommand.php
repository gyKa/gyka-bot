<?php

namespace Command;

use GuzzleHttp\Client;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SendMessageCommand extends Command
{
    /** @var Client */
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;

        parent::__construct(null);
    }

    protected function configure()
    {
        $this
            ->setName('message:send')
            ->setDescription('Sends a message to Telegram.')
            ->addArgument('message', InputArgument::REQUIRED);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $message = $input->getArgument('message');
        $url = sprintf('%s/sendMessage?chat_id=%s&text=%s', getenv('API_URL'), getenv('CHAT_ID'), urlencode($message));

        $this->client->request('GET', $url);
    }
}
