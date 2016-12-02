<?php include 'includes\superAdvancedAuth.php' ?>

<?php
$user = User::find(Session::get('logged_in_user')['id']);
?>

<?php include 'includes/header.php' ?>
<div class="content wrapper">
  <div class="orders-container">
    <div class="name">
      <h2>You've ordered:</h2>
    </div>
    <div class="orders">
      <?php if(count($user->orders())) : ?>
        <?php foreach($user->orders() as $order) : ?>
          <div class="order">
            <div class="number">
              <strong>Order #<?= $order->id ?>:</strong>
            </div>
            <?php foreach($order->pizzas() as $pizza) : ?>
              <div class="pizza">
                <div class="number">
                  Pizza #<?= $pizza->id ?>:
                </div>
                <div class="ingredients">
                  <div class="base-ingredients">
                    <div class="dough">
                      Crust: <?= $pizza->dough()->name ?>
                    </div>
                    <div class="sauce">
                      Sauce: <?= $pizza->sauce()->name ?>
                    </div>
                    <div class="cheese">
                      Cheese: <?= $pizza->cheese()->name ?>
                    </div>
                  </div>
                  <div class="toppings">
                    Toppings:
                    <?php foreach($pizza->toppings() as $topping) : ?>
                      <div class="topping">
                        <?= $topping->name ?>
                      </div>
                    <?php endforeach ?>
                  </div>
                </div>
              </div>
            <?php endforeach ?>
            <div class="shipping">
              <strong>Shipped To:</strong>
              <div class="shipping-info">
                <?= "$order->address, $order->postal_code in $order->city, $order->province" ?>
              </div>
            </div>
          </div>
        <?php endforeach ?>
      <?php else : ?>
        <div class="order">Nothing. Nothing at all.</div>
        <div class="order">:(</div>
      <?php endif ?>
    </div>
  </div>
</div>

<?php include 'includes/footer.php' ?>
