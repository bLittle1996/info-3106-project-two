<?php
//a utility file for useful things

//allows us to generate a url, similar to laravel {{ url('/admin/users/delete') }}
function url($uri) {
  $rootPath = dirname($_SERVER['PHP_SELF']);
  if(strlen($rootPath) == 1) {
    //this means we are running in the root dir, but it is a \ or /, this messes with our links, so we empty it
    $rootPath = '';
  }
  if(substr($uri, 0, 1) == '/' || substr($uri, 0, 1) == '\\' ) {
    return parse_url($rootPath . $uri, PHP_URL_PATH);
  } else {
    return parse_url($rootPath . '/' . $uri, PHP_URL_PATH);
  }
}

//gets the root path, basically the folder where the project is running. Could be server root, or /project2! Add on
function root() {
  $rootPath = trim(dirname($_SERVER['PHP_SELF']), '/');
  if(strlen($rootPath) == 1) {
    //this means we are running in the root dir, but it is a \ or /, this messes with our links, so we empty it
    $rootPath = '';
  }

  return $rootPath;
}
