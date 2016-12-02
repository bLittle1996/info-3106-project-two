<?php

class OrdersController {
  public function placeOrder() {
    if(empty(Session::get('pizzas'))) {
      Session::set('errors', 'Please add at least one pizza to the order before clicking "Buy Pizza"');
      return redirect('/order/make');
    }
    $order = new Order();
    $order->total_price = 9.99; //all orders
    $order->user_id = Session::get('logged_in_user')['id'];
    if($order->save() !== false) {
      foreach(Session::get('pizzas') as $pizza) {
        $orderedPizza = new Pizza();
        $orderedPizza->price = 0.00;
        $orderedPizza->dough_id = $pizza['dough'];
        $orderedPizza->sauce_id = $pizza['sauce'];
        $orderedPizza->cheese_id = $pizza['cheese'];
        $orderedPizza->order_id = $order->id;
        $orderedPizza->save();
        foreach(Topping::find($pizza['toppings']) as $topping) {
          $topping->associate($orderedPizza->id);
        }
      }
    }
    Session::set('pizzas', []);
    return redirect('/order');
  }
}
