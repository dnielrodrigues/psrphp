<?php
namespace App;
use Laminas\Diactoros\Response;
class Base {
  function __construct() {}
  public function html($str) {
    $res = new Response;
    $res->getBody()->write($str);
    return $res;
  }
  public function toSnakeCase($str) {
  	return ltrim(strtolower(preg_replace('/[A-Z]([A-Z](?![a-z]))*/', '_$0', $str)), '_');
  }
}