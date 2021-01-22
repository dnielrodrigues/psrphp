<?php
namespace App\Ctrls;
class SiteCtrl extends BaseCtrl {
  public function home($req) {
    return $this->html('<h1>Hello, World!</h1>');
  }
}