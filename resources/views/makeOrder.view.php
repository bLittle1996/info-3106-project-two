<?php include 'includes\superAdvancedAuth.php' ?>

<?php include 'includes/header.php' ?>
<div class="content wrapper">
  <?php if(Session::get('pizzas')) : ?>
    <div class="order">
      <h2>Current Order</h2>
      <?php foreach(Session::get('pizzas') as $num => $pizza) : ?>
        <div class="pizza">
          <div class="pizza-num">
            Pizza #<?= $num + 1 ?>:
          </div>
          <div class="ingredients">
            <div class="dough">
              <?php foreach(Dough::all() as $dough) : ?>
                <?php if($dough->id == $pizza['dough']) : ?>
                  Crust: <?= $dough->name ?>
                <?php endif ?>
              <?php endforeach ?>
            </div>

            <div class="sauce">
              <?php foreach(Sauce::all() as $sauce) : ?>
                <?php if($sauce->id == $pizza['sauce']) : ?>
                  Sauce: <?= $sauce->name ?>
                <?php endif ?>
              <?php endforeach ?>
            </div>

            <div class="cheese">
              <?php foreach(Cheese::all() as $cheese) : ?>
                <?php if($cheese->id == $pizza['cheese']) : ?>
                  Cheese: <?= $cheese->name ?>
                <?php endif ?>
              <?php endforeach ?>
            </div>

            <div class="toppings">
              Toppings:
              <?php foreach(Topping::all() as $topping) : ?>
                <?php if(in_array($topping->id, $pizza['toppings'])) : ?>
                  <div class="topping">
                    <?= $topping->name ?>
                  </div>
                <?php endif ?>
              <?php endforeach ?>
            </div>
          </div>

        </div>
      <?php endforeach ?>
    </div>
  <?php endif ?>



  <form action="<?= url('/pizza/add') ?>" method="POST">
    <div class="pizza">
      <h2>Craft A Pizza</h2>
      <div class="input">
        <label for="dough">Select dough:</label>
        <select name="dough">
          <option value="" selected disabled>Select one</option>
          <?php foreach(Dough::all() as $dough) : ?>
            <option value="<?= $dough->id ?>"><?= $dough->name ?></option>
          <?php endforeach ?>
        </select>
      </div>

      <div class="input">
        <label for="sauce">Select sauce:</label>
        <select name="sauce">
          <option value="" disabled selected>Select one</option>
          <?php foreach(Sauce::all() as $sauce) : ?>
            <option value="<?= $sauce->id ?>"><?= $sauce->name ?></option>
          <?php endforeach ?>
        </select>
      </div>

      <div class="input">
        <label for="cheese">Select cheese:</label>
        <select name="cheese">
          <option value="" disabled selected>Select one</option>
          <?php foreach(Cheese::all() as $cheese) : ?>
            <option value="<?= $cheese->id ?>"><?= $cheese->name ?></option>
          <?php endforeach ?>
        </select>
      </div>

      <div class="input">
        <label for="toppings[]">Select toppings:</label>
        <div class="checkboxes">
          <?php foreach(Topping::all() as $topping) : ?>
            <div class="checkbox">
              <span class="label"><?= $topping->name ?></span>
              <input type="checkbox" name="toppings[]" value="<?= $topping->id ?>">
            </div>
          <?php endforeach ?>
        </div>
      </div>
    </div>
    <?php if(Session::get('errors')) : ?>
      <div class="errors">
        <?= Session::get('errors') ?>
      </div>
    <?php endif ?>
    <button type="submit">
      Add Pizzas To Order
    </button>
  </form>
  <form action="<?= url('/order/place') ?>" method="POST">
    <button type="submit">Buy Pizza</button>
  </form>
</div>
<?php include 'includes/footer.php' ?>
