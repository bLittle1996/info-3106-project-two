<?php

class PagesController {
  public function home() {
    require 'resources/views/home.view.php';
  }

  public function register() {
    require 'resources/views/register.view.php';
  }

  public function login() {
    require 'resources/views/login.view.php';
  }

  public function logout() {
    require 'resources/views/logout.view.php';
  }

  public function order() {
    require 'resources/views/order.view.php';
  }

  public function makeOrder() {
    require 'resources/views/makeOrder.view.php';
  }
}
