<?php

class Test extends Model {
  public $id;
  public $name;

  public static function all() {
    $pdo = (new self)->pdo;
    $stmt = $pdo->prepare("SELECT * FROM test");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_CLASS, 'Test');
  }
}
