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

  public function associate($pizzaId) {
    try {
      $stmt = $this->pdo->prepare("INSERT INTO pizza_topping (pizza_id, topping_id) VALUES (:pizza_id, :topping_id)");
      $stmt->bindValue(':pizza_id', $pizzaId, PDO::PARAM_INT);
      $stmt->bindValue(':topping_id', $this->id, PDO::PARAM_INT);
      return $stmt->execute();
    } catch (Exception $e) {
      return null;
    }
  }

  public static function find($toppingIdArray) {
    try {
      $toppings = [];
      foreach($toppingIdArray as $topping) {
        $stmt = (new self)->pdo->prepare("SELECT * FROM toppings WHERE id = :id");
        $stmt->bindValue(':id', $topping, PDO::PARAM_INT);
        $stmt->execute();
        $toppings[] = $stmt->fetchAll(PDO::FETCH_CLASS, 'Topping')[0];
      }
      return $toppings;
    } catch (Exception $e) {
      return null;
    }

  }
}
