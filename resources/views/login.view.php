<?php if(Session::get('logged_in_user')) {
  redirect('/order');
} ?>
<?php include 'includes/header.php' ?>

<div class="content wrapper">
  <form action="<?= url('login') ?>" method="POST">
    <h2>Login</h2>
    <div class="input">
      <label for="email">Enter email address:</label>
      <input type="email" name="email" placeholder="jdoe@gmail.com">
    </div>
    <div class="input">
      <label for="password">Enter password:</label>
      <input type="password" placeholder="this is just for show">
    </div>
    <?php if(Session::get('errors')) : ?>
      <span class="errors"><?= Session::get('errors') ?></span>
    <?php endif ?>
    <div>
      <button type="submit">
        Login
      </button>
    </div>
  </form>
</div>

<?php include 'includes/footer.php' ?>
