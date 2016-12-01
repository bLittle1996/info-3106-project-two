<?php

class PizzaController {
  public function addTempPizza() {
    var_dump($_POST);
    if(empty($_POST['dough']) || empty($_POST['cheese']) || empty($_POST['sauce'])) {
      Session::set('errors', 'You must pick a dough, sauce, and cheese as a minimum. You waste Little Toni\'s skill otherwise.');
      return redirect('/order/make');
    }

    if(empty($_POST['toppings']) || count($_POST['toppings']) < 1 || count($_POST['toppings']) > 5 ) {
      Session::set('errors', 'You must pick at between 1 and 5 toppings, flavourless pizzas are an insult to the great Little Toni!');
      return redirect('/order/make');
    }

    $currentPizzas = Session::get('pizzas') ? Session::get('pizzas') : [];
    $currentPizzas[] = $_POST;
    Session::set('pizzas', $currentPizzas);
    Session::set('errors', 'Added pizza to order, there is no going back now. Feel free to add another, there is no challenge that Little Toni cannot complete!');
    return redirect('/order/make');
  }
}
