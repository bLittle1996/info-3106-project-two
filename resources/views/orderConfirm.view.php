<?php include 'includes/superAdvancedAuth.php' ?>
<?php
$user = User::find(Session::get('logged_in_user')['id']);
$order = $user->orders()[count($user->orders()) - 1];
?>
<?php include 'includes/header.php' ?>
<div class="content wrapper">
  <div class="order">
    <h2>Order Placed</h2>
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
    <div class="arrival">
      <?php $date = getdate(); ?>
      Expect the pizza to arrive <strong><?= $date['month'] . ' ' . $date['mday'] . ', ' . ($date['year']+rand(50, 1000)) ?></strong>
    </div>
  </div>
</div>
<?php include 'includes/footer.php' ?>
