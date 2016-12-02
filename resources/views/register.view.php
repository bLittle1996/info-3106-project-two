<?php if(Session::get('logged_in_user')) {
  redirect('/order');
} ?>
<?php include 'includes/header.php' ?>

<div class="content wrapper">
  <form action="<?= url('/register') ?>" method="POST">
    <h2>Register</h2>
    <div class='input'>
      <label for="name">Enter name:</label>
      <input type="text" name="name" placeholder="John Doe">
    </div>
    <div class='input'>
      <label for="email">Enter email address:</label>
      <input type="email" name="email" placeholder="jdoe@gmail.com">
    </div>
    <div class='input'>
      <label for="address">Enter shipping address:</label>
      <input type="text" name="address" placeholder="123 Street Avenue Boulevard">
    </div>
    <div class='input'>
      <label for="postal_code">Enter postal code:</label>
      <input type="text" name="postal_code" placeholder="Y2K 8P0">
    </div>
    <div class='input'>
      <label for="city">Enter city:</label>
      <input type="text" name="city" placeholder="Toronto">
    </div>
    <div class='input'>
      <label for="province">Select province:</label>
      <select name="province">
        <option value="" disabled selected>Pick one</option>
        <option value="ON">Ontario</option>
        <option value="QC">Quebec</option>
        <option value="BC">British Columbia</option>
        <option value="SK">Saskatchewan</option>
        <option value="MN">Manitoba</option>
        <option value="AB">Alberta</option>
        <option value="PI">Prince Edward Island</option>
        <option value="NS">Nova Scotia</option>
        <option value="NB">New Brunswick</option>
        <option value="NF">Newfoundland & Labrador</option>
        <option value="YK">Yukon</option>
        <option value="NT">North West Territories</option>
        <option value="NV">Nunavut</option>
      </select>
    </div>
    <div>
      <button type="submit">Register</button>
    </div>
    <?php if(Session::get('errors')) : ?>
      <div class='errors'>
        <?= Session::get('errors') ?>
      </div>
    <?php endif ?>
  </form>
</div>
<?php include 'includes/footer.php' ?>
