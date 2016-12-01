<?php

class Topping extends Model {
  public $id;
  public $name;

  public static function all() {
    try {
      $stmt = (new self)->pdo->prepare("SELECT * FROM toppings ORDER BY id");
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_CLASS, 'Topping');
    } catch (Exception $e) {
      return null;
    }
  }
}
