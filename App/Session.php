<?php

class Session {

  public static function start() {
    session_start();
  }

  public static function get($value) {
    return $_SESSION[$value];
  }

  public static function set($key, $value) {
    $_SESSION[$key] = $value;
  }

  public static function clear() {
    $_SESSION = [];
  }
}
