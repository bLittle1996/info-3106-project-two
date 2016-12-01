<?php

class Pizza extends Model {
  public $id;
  public $order_id;
  public $cheese_id;
  public $sauce_id;
  public $dough_id;
  public $price;

  public function dough() {
    try {
      $stmt = $this->pdo->prepare("SELECT * FROM doughs WHERE id = :dough_id");
      $stmt->bindValue(':dough_id', $this->dough_id);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_CLASS, 'Dough')[0];
    } catch (Exception $e) {
      return null;
    }
  }

  public function sauce() {
    try {
      $stmt = $this->pdo->prepare("SELECT * FROM sauces WHERE id = :sauce_id");
      $stmt->bindValue(':sauce_id', $this->sauce_id);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_CLASS, 'Sauce')[0];
    } catch (Exception $e) {
      return null;
    }
  }

  public function cheese() {
    try {
      $stmt = $this->pdo->prepare("SELECT * FROM cheeses WHERE id = :cheese_id");
      $stmt->bindValue(':cheese_id', $this->cheese_id);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_CLASS, 'Cheese')[0];
    } catch (Exception $e) {
      return null;
    }
  }

  public function toppings() {
    try {
      $stmt = $this->pdo->prepare("SELECT toppings.* FROM toppings INNER JOIN pizza_topping ON toppings.id = pizza_topping.topping_id WHERE pizza_topping.pizza_id = :id");
      $stmt->bindValue(':id', $this->id);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_CLASS, 'Topping');
    } catch (Exception $e) {
      return null;
    }
  }

  public function save() {
    try {
      $stmt = $this->pdo->prepare("INSERT INTO pizzas (dough_id, sauce_id, cheese_id, price) VALUES (:dough_id, :sauce_id, :cheese_id, :price)");
      $stmt->bindValue('dough_id', $this->dough_id, PDO::PARAM_INT);
      $stmt->bindValue('sauce_id', $this->sauce_id, PDO::PARAM_INT);
      $stmt->bindValue('cheese_id', $this->cheese_id, PDO::PARAM_INT);
      $stmt->bindValue('price', $this->price);
    } catch (Exception $e) {
      return null;
    }

  }
}
