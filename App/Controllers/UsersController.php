<?php

class UsersController {

  public function login() {
    $valid = true;
    if(empty($_POST['email'])) {
      Session::set('errors', 'Try filling in your email before logging in.');
      $valid = false;
    }
    if($valid) {
      $userEmails = array_map(function ($user) {
        return $user->email;
      }, User::all());
      if(in_array($_POST['email'], $userEmails)) {
        //user email is in DB, we don't believe in password auth so let's let them in
        $user = User::findByEmail($_POST['email']);
        Session::set('logged_in_user', json_decode(json_encode($user), true)); //from stackoverflow, we first encode our object to a json string, then we decode it to an associative array( what the true means). This convienently only includes public fields, how great is that?
        return redirect('/');
      } else {
        Session::set('errors', 'These credentials do not match our records.');
      }
    }
    return redirect('/login');
  }


  public function register() {
    $valid = true;
    if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['city']) || empty($_POST['province']) || empty($_POST['postal_code']) || empty($_POST['address'])) {
      $valid = false;
      Session::set('errors', 'One or more fields are not filled in!');
    } else {
      $users = User::all();
      $userEmails = array_map(function ($user) {
        return $user->email;
      }, $users);
      if(in_array($_POST['email'], $userEmails)) {
        Session::set('errors', 'This email is already in use.');
        $valid = false;
      }
    }
    //place other validation options here if you feel like it

    if($valid) {
      //create and save user;
      $user = new User();
      $user->name = $_POST['name'];
      $user->email = $_POST['email'];
      $user->address = $_POST['address'];
      $user->postal_code = $_POST['postal_code'];
      $user->city = $_POST['city'];
      $user->province = $_POST['province'];
      if($user->save()) {
        redirect('/');
      } else {
        redirect('/register');
      }
    } else {
      redirect('/register');
    }
  }

  public function update() {
    if(empty($_POST['name']) || empty($_POST['city']) || empty($_POST['province']) || empty($_POST['postal_code']) || empty($_POST['address'])) {
      Session::set('errors', 'Please make sure all fields are filled.');
      return redirect('/account');
    }
    try {
      $user = new User();
      $user = User::find(Session::get('logged_in_user')['id']);
      $stmt = Connection::make()->prepare("UPDATE users SET name = :name, address = :address, city = :city, province = :province, postal_code = :postal_code WHERE id = :id");
      $stmt->bindValue(":name", $_POST['name']);
      $stmt->bindValue(":address", $_POST['address']);
      $stmt->bindValue(":city", $_POST['city']);
      $stmt->bindValue(':province', $_POST['province']);
      $stmt->bindValue(":postal_code", $_POST['postal_code']);
      $stmt->bindValue(":id", $user->id, PDO::PARAM_INT);
      if($stmt->execute()) {
        $user = User::find($user->id);
        Session::set('logged_in_user', json_decode(json_encode($user), true));
        Session::set('errors', 'Updated your account.');
        return redirect('/account');
      } else {
        Session::set('errors', 'Unable to update your account.');
        return redirect('/account');
      }
    } catch (Exception $e) {
        Session::set('errors', 'Oops. ' . $e->getMessage());
        return redirect('/account');
    }

  }
}
