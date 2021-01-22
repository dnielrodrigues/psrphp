<?php
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

// route config
$request = Laminas\Diactoros\ServerRequestFactory::fromGlobals($_SERVER, $_GET, $_POST, $_COOKIE, $_FILES);
$responseFactory = new \Laminas\Diactoros\ResponseFactory();
$strategy = new League\Route\Strategy\JsonStrategy($responseFactory);
$router   = (new League\Route\Router)->setStrategy($strategy);

// map route
$router->get('/', 'App\Ctrls\SiteCtrl::home');

$router->group('/api', function (\League\Route\RouteGroup $route) {
  $route->get('/', 'App\Ctrls\ApiCtrl::home');
  foreach ([
    'usuarios' => 'App\Ctrls\UsuarioCtrl',
    'pessoas' => 'App\Ctrls\PessoaCtrl',
  ] as $slug => $ctrl) {
    $route->get("/$slug", $ctrl.'::list');
    $route->get("/$slug/{id}", $ctrl.'::get');
    $route->post("/$slug", $ctrl.'::save');
    $route->post("/$slug/{id}", $ctrl.'::save');
    $route->delete("/$slug/{id}", $ctrl.'::delete');
  }
});

// end route
$response = $router->dispatch($request);
(new Laminas\HttpHandlerRunner\Emitter\SapiEmitter)->emit($response);