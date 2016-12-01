<?php

require 'vendor/autoload.php';
require 'functions.php';
Router::load('routes.php');
Session::start();

try {
  Router::direct(Request::uri(), Request::method());
} catch (Exception $e) {
    die($e->getMessage());
}

 ?>
