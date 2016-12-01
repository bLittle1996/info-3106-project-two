<?php
//a utility file for useful things

//allows us to generate a url, similar to laravel {{ url('/admin/users/delete') }}
function url($uri) {
  return root() ? '/' . root() . '/' . trim($uri, '/') : $uri;
}

//gets the root path, basically the folder where the project is running. Could be server root, or /project2! Add on
function root() {
  return trim(explode('index.php', strtolower($_SERVER['PHP_SELF']))[0], '/');
}

//change the place we want to be!
function redirect($uri = '/') {
  var_dump($_SERVER['HTTP_HOST']);
  header('Location: ' . url($uri));
}
