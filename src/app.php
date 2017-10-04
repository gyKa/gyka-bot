<?php

require __DIR__ . '/../vendor/autoload.php';

use Command\SendMessageCommand;
use GuzzleHttp\Client;
use Symfony\Component\Console\Application;

$config = new Dotenv\Dotenv(dirname(__DIR__));
$config->load();
$config->required('API_KEY')->notEmpty();
$config->required('API_URL')->notEmpty();
$config->required('CHAT_ID')->notEmpty();

$application = new Application();
$client = new Client(['base_uri' => getenv('API_URL')]);

$application->add(new SendMessageCommand($client));

$application->run();
