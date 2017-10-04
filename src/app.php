<?php

require __DIR__ . '/../vendor/autoload.php';

use GuzzleHttp\Client;

$config = new Dotenv\Dotenv(dirname(__DIR__));
$config->load();
$config->required('API_KEY')->notEmpty();
$config->required('API_URL')->notEmpty();
$config->required('CHAT_ID')->notEmpty();

$client = new Client(['base_uri' => getenv('API_URL')]);
