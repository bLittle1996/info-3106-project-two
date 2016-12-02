<?php include 'includes\superAdvancedAuth.php' ?>
<?php include 'includes\header.php' ?>
<div class="content wrapper">
  <div class="update-user">
    <h2>Edit Your Account</h2>
    <div class="email">
      <?= Session::get('logged_in_user')['email'] ?>
    </div>
    <form action="<?= url('/user/update') ?>" method="POST">
      <div class='input'>
        <label for="name">Enter name:</label>
        <input type="text" name="name" placeholder="John Doe"  value="<?= Session::get('logged_in_user')['name'] ?>">
      </div>
      <div class='input'>
        <label for="address">Enter shipping address:</label>
        <input type="text" name="address" placeholder="123 Street Avenue Boulevard" value="<?= Session::get('logged_in_user')['address'] ?>">
      </div>
      <div class='input'>
        <label for="postal_code">Enter postal code:</label>
        <input type="text" name="postal_code" placeholder="Y2K 8P0" value="<?= Session::get('logged_in_user')['postal_code'] ?>">
      </div>
      <div class='input'>
        <label for="city">Enter city:</label>
        <input type="text" name="city" placeholder="Toronto" value="<?= Session::get('logged_in_user')['city'] ?>">
      </div>
      <div class='input'>
        <label for="province">Select province:</label>
        <select name="province">
          <option value="" disabled selected>Pick one</option>
          <option value="ON" <?= Session::get('logged_in_user')['province'] == "ON" ? 'selected' : '' ?>>Ontario</option>
          <option value="QC" <?= Session::get('logged_in_user')['province'] == "QC" ? 'selected' : '' ?>>Quebec</option>
          <option value="BC" <?= Session::get('logged_in_user')['province'] == "BC" ? 'selected' : '' ?>>British Columbia</option>
          <option value="SK" <?= Session::get('logged_in_user')['province'] == "SK" ? 'selected' : '' ?>>Saskatchewan</option>
          <option value="MN" <?= Session::get('logged_in_user')['province'] == "MN" ? 'selected' : '' ?>>Manitoba</option>
          <option value="AB" <?= Session::get('logged_in_user')['province'] == "AB" ? 'selected' : '' ?>>Alberta</option>
          <option value="PI" <?= Session::get('logged_in_user')['province'] == "PI" ? 'selected' : '' ?>>Prince Edward Island</option>
          <option value="NS" <?= Session::get('logged_in_user')['province'] == "NS" ? 'selected' : '' ?>>Nova Scotia</option>
          <option value="NB" <?= Session::get('logged_in_user')['province'] == "NB" ? 'selected' : '' ?>>New Brunswick</option>
          <option value="NF" <?= Session::get('logged_in_user')['province'] == "NF" ? 'selected' : '' ?>>Newfoundland & Labrador</option>
          <option value="YK" <?= Session::get('logged_in_user')['province'] == "YK" ? 'selected' : '' ?>>Yukon</option>
          <option value="NT" <?= Session::get('logged_in_user')['province'] == "NT" ? 'selected' : '' ?>>North West Territories</option>
          <option value="NV" <?= Session::get('logged_in_user')['province'] == "NV" ? 'selected' : '' ?>>Nunavut</option>
        </select>
      </div>
      <?php if(Session::get('errors')) : ?>
        <div class="errors">
          <?= Session::get('errors') ?>
        </div>
      <?php endif ?>
      <button type="submit">Update Account</button>
    </form>
  </div>
</div>
<?php include 'includes\footer.php' ?>
