<?php

  // GET ROUTES
  Router::get('', 'PagesController@home');
  Router::get('register', 'PagesController@register');
  Router::get('login', 'PagesController@login');
  Router::get('order', 'PagesController@order');
  Router::get('order/make', 'PagesController@makeOrder');
  Router::get('logout', 'PagesController@logout');
  //POST ROUTES
  Router::post('register', 'UsersController@register');
  Router::post('login', 'UsersController@login');
  Router::post('pizza/add', 'PizzaController@addTempPizza');
