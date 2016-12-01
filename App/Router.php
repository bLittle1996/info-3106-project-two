<?php
/*
This class handles all requests made to our server and handles it based on the routes defined in ../routes.php
If a route IS found, it executes the associate controller method.
*/


class Router {

  protected static $routes = [
    'GET' => [],
    'POST' => []
  ];

  //executes the code in a provided file, and returns a router with routes read to route
  public static function load($file) {
    require $file; //executes the code in the file, which presumably is valid router methods (../routes.php)
  }
  //sets a route that can be accessed via GET requests
  public static function get($uri, $controller) {
      self::$routes['GET'][trim(root() . '/' . $uri, '/')] = $controller;
  }
  //sets a route that can be accessed via POST requests
  public static function post($uri, $controller) {
    self::$routes['POST'][trim(root() . '/' . $uri, '/')] = $controller;
  }

  public static function direct($uri, $requestType) {
    //checks to see if the particular URI exists as a key in the appropriate set (GET or POST)in our $routes variable and returns the path of the associate controller
    if(array_key_exists($uri, self::$routes[$requestType])) {
      return self::callAction(
        ...explode('@', self::$routes[$requestType][$uri])
      );
    }
    throw new Exception("<h1>404</h1> <h3>Not Found - {$requestType} Route {$uri} Does Not Exist</h3>");
  }

  protected static function callAction($controller, $action) {
    if(!method_exists($controller, $action)) {
      throw new Exception("<h1>Uh oh,</h1> <h3>The {$controller} does not support the {$action} action.");
    }

    return (new $controller)->$action();
  }
}
