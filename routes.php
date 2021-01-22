<?php

$router->get('/', 'App\Ctrls\SiteCtrl::home');
$router->group('/api', function (\League\Route\RouteGroup $route) {
  $route->get('/', 'App\Ctrls\ApiCtrl::home');
  foreach ([
    'usuarios' => 'App\Ctrls\UsuarioCtrl',
    'pessoas' => 'App\Ctrls\PessoaCtrl',
  ] as $slug => $ctrl) {
    $route->get("/$slug", "$ctrl::list");
    $route->get("/$slug/{id}", "$ctrl::get");
    $route->post("/$slug", "$ctrl::save");
    $route->post("/$slug/{id}", "$ctrl::save");
    $route->delete("/$slug/{id}", "$ctrl::delete");
  }
});
