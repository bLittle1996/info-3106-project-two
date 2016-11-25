<?php

require 'vendor/autoload.php';
require 'functions.php';
Router::load('routes.php');
try {
  foreach(Test::all() as $test) {
    echo "<div>ID: {$test->id} Name: {$test->name}</div>";
  }
} catch (Exception $e) {
  die($e->getMessage());
}

try {
  Router::direct(Request::uri(), Request::method());
} catch (Exception $e) {
    die($e->getMessage());
}

 ?>
