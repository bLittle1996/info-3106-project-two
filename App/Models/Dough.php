<?php

class Dough extends Model {
  public $id;
  public $name;

  public static function all() {
    try {
      $stmt = (new self)->pdo->prepare("SELECT * FROM doughs ORDER BY id");
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_CLASS, 'Dough');
    } catch (Exception $e) {
      return null;
    }
  }
}
