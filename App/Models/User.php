<?php

class User extends Model {
  public $id;
  public $name;
  public $email;
  public $address;
  public $city;
  public $province;
  public $postal_code;

  public static function all() {
    try {
      $pdo = (new self)->pdo;
      $stmt = $pdo->prepare("SELECT * FROM users");
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_CLASS, 'User');
    } catch(Exception $e) {
      return null;
    }
  }

  public static function find($userId) {
    try {
      $stmt = (new self)->pdo->prepare("SELECT * FROM users WHERE id = :id");
      $stmt->bindValue(":id", $userId, PDO::PARAM_INT);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_CLASS, 'User')[0];
    } catch(Exception $e) {
      return null;
    }
  }

  public static function findByEmail($email) {
    try {
      $stmt = (new self)->pdo->prepare("SELECT * FROM users WHERE email LIKE :email");
      $stmt->bindValue(":email", $email);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_CLASS, 'User')[0];
    } catch(Exception $e) {
      return null;
    }
  }

  public function orders() {
    try {
      $stmt = $this->pdo->prepare("SELECT * FROM orders WHERE user_id = :id");
      $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_CLASS, 'Order');
    } catch (Exception $e) {

    }

  }

  public function save() {
    try {
      $stmt = $this->pdo->prepare("INSERT INTO users (name, email, address, postal_code, city, province) VALUES (:name, :email, :address, :postal_code, :city, :province)");
      $stmt->bindValue(':name', $this->name);
      $stmt->bindValue(':email', $this->email);
      $stmt->bindValue(':address', $this->address);
      $stmt->bindValue(':postal_code', $this->postal_code);
      $stmt->bindValue(':city', $this->city);
      $stmt->bindValue(':province', $this->province);
      return $stmt->execute();
    } catch(Exception $e) {
      echo 'Exception: ' . $e->getMessage();
      Session::set('errors', 'Unable to save user! ' . $e->getMessage());
      return false;
    }
  }
}
