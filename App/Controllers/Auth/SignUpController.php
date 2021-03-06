<?php

namespace App\Controllers\Auth;

use App\Models\Session;
use App\Models\User\AuthModel;
use App\Controllers\Controller;

class SignUpController extends Controller {
  public static function view() {
    parent::show('auth/signUp');
  }

  public static function signUp($req) {
    $sesi = new Session();
    $user = new AuthModel();
    $data = $req->getBody();
    $data = [
      AuthModel::$uid => self::createNewUID(($data)),
      AuthModel::$name => $data[AuthModel::$name],
      AuthModel::$email => $data[AuthModel::$email],
      AuthModel::$password => $data[AuthModel::$password]
    ];

    $response = $user->signUp($data, substr($data[AuthModel::$uid], 0, 1));
    if ($response['message'] === 'success'){
      unset($data[AuthModel::$password]);
      $sesi->add($data);

      header("Location: /profile");
    } else {
      header("Location: /register");
    }
  }

  private static function createNewUID($param) {
    $param = (isset($param[AuthModel::$uid])) ? 'SELLER' : 'BUYER';
    return strtoupper(substr($param, 0, 1)). date('y'). date('W'). date('d'). date('H'). date('i');
  }
}
