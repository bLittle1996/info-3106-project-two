<?php if(!Session::get('logged_in_user')) {
  echo 'hiii';
  redirect('/login');
} ?>

<?php
$user = User::find(Session::get('logged_in_user')['id']);
?>

<?php include 'includes/header.php' ?>
<div class="content">
  <div class="orders-container">
    <div class="name">
      You've ordered:
    </div>
    <div class="orders">
      <?php if(count($user->orders())) : ?>
        <?php foreach($user->orders() as $order) : ?>
          <div class="order">
            <?php foreach($order->pizzas() as $pizza) : ?>
              <div class="pizza">
                <div class="dough">
                  <?= $pizza->dough()->name ?>
                </div>
                <div class="sauce">
                  <?= $pizza->sauce()->name ?>
                </div>
                <div class="cheese">
                  <?= $pizza->cheese()->name ?>
                </div>
                <div class="toppings">
                  <?php foreach($pizza->toppings() as $topping) : ?>
                    <div class="topping">
                      <?= $topping->name ?>
                    </div>
                  <?php endforeach ?>
                </div>
                <?= $pizza->getToppingsAsString() ?>
              </div>
            <?php endforeach ?>
          </div>
        <?php endforeach ?>
      <?php else : ?>
        <div class="order">You do not have any orders</div>
      <?php endif ?>
    </div>
  </div>
</div>

<?php include 'includes/footer.php' ?>
