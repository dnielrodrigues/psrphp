<?php
namespace App\Ctrls;
use App\Base;
class BaseCtrl extends Base {
  public $model = 'Base';
  function __construct() {
    $this->table = isset($this->table)
      ? $this->table
      : $this->toSnakeCase($this->model).'s';
  }
  public function list($req, $args) {
    $attr = $req->getAttributes(); // get URL data like URL/usuario/{id}
    $params = $req->getQueryParams(); // get GET data like URL?nome={nome}&sobrenome={sobrenome}
    // TODO - get POST data from form
    // TODO - get JSON data from request
    return [];
  }
  public function get($req, $args) {
    return $args;
  }
  public function save($req, $args) {
    return $this->html('true');
  }
  public function delete($req, $args) {
    return $this->html('true');
  }
}