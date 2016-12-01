<?php

class Sauce extends Model {
  public $id;
  public $name;

  public static function all() {
    try {
      $stmt = (new self)->pdo->prepare("SELECT * FROM sauces ORDER BY id");
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_CLASS, 'Sauce');
    } catch (Exception $e) {
      return null;
    }
  }
}
