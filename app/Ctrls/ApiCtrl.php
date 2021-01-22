<?php
namespace App\Ctrls;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
class ApiCtrl extends BaseCtrl {
  public function home($req) {
    return [
      'title'   => 'My New Simple API',
      'version' => 1,
      'nodes' => [
        // TODO - get api nodes here...
      ]
    ];
  }
}