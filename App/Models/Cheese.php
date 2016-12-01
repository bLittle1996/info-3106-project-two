<?php

class Cheese extends Model {
  public $id;
  public $name;

  public static function all() {
    try {
      $stmt = (new self)->pdo->prepare("SELECT * FROM cheeses ORDER BY id");
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_CLASS, 'Cheese');
    } catch (Exception $e) {
      return null;
    }
  }
}
