<?php

require __DIR__ . '/../vendor/autoload.php';


$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../');
$dotenv->Load();
use App\core\Application;

 
$app = new Application(dirname(__DIR__));

include_once Application::$ROOT_DIR."/routes/api.php";

$app->run();