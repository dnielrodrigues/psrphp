<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

// debug mode
ini_set('display_errors', true);
ini_set('error_reporting', E_ALL);

// basic params
define('BASE_URL', $_SERVER['HTTP_HOST']);
define('BASE_PATH', dirname(__DIR__));
define('SITE_PATH', BASE_PATH.'/public');
define('THEME_PATH', SITE_PATH.'/themes/my-theme');
define('THEME_URL', BASE_URL.'/themes/my-theme');

// route config
$request = Laminas\Diactoros\ServerRequestFactory::fromGlobals($_SERVER, $_GET, $_POST, $_COOKIE, $_FILES);
$responseFactory = new \Laminas\Diactoros\ResponseFactory();
$strategy = new League\Route\Strategy\JsonStrategy($responseFactory);
$router   = (new League\Route\Router)->setStrategy($strategy);

// route map
require_once BASE_PATH . '/routes.php';

// dispatch route
$response = $router->dispatch($request);
(new Laminas\HttpHandlerRunner\Emitter\SapiEmitter)->emit($response);