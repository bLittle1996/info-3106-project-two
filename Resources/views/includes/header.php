<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="<?= url('/public/styles/app.min.css') ?>">
</head>
<body>

  <header>
    <div class="wrapper">
      <div class="title">
        Little Toni's Lovely Livorno Pizza
      </div>
      <nav>
        <?php if(Session::get('logged_in_user')) : ?>
          <a href="#" style="cursor: default;">Welcome, <?= Session::get('logged_in_user')['name'] ?></a>
          <a href="<?= url('/order/make') ?>">Make Pizza</a>
          <a href="<?= url('/order') ?>">Past Orders</a>
          <a href="<?= url('/account') ?>">Account</a>
          <a href="<?= url('/logout') ?>">Logout</a>
        <?php else : ?>
          <a href="<?= url('/login') ?>">Login</a>
          <a href="<?= url('/register') ?>">Register</a>
        <?php endif ?>
      </nav>
    </div>
  </header>
