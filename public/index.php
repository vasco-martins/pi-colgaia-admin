<?php
$basePath = dirname(__DIR__);

/**
* ----------------------------------------
* Projeto colégio
* ----------------------------------------
*/

require_once '../vendor/autoload.php';
require_once '../Framework/Helpers/helpers.php';


$router = new \Framework\Router\Router(strtok($_SERVER["REQUEST_URI"], '?'));

$app = new \Framework\Kernel\App($basePath);

$app->run($router);