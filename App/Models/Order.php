<?php

class Order extends Model {
  public $id;
  public $user_id;
  public $total_price;

  public function pizzas() {
    try {
      $stmt = $this->pdo->prepare("SELECT * FROM pizzas WHERE order_id = :id");
      $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_CLASS, 'Pizza');
    } catch (Exception $e) {
      return null;
    }

  }

  public function save() {
    try {
      $stmt = $this->pdo->prepare("INSERT INTO orders (user_id, total_price) VALUES (:user_id, :total_price)");
      $stmt->bindValue(':user_id', $this->user_id);
      $stmt->bindValue(':total_price', $this->total_price);
      if($stmt->execute()) {
        $this->id = self::getLastOrderId();
        return $this->id;
      } else {
        return false;
      }
    } catch(Exception $e) {
      echo 'Exception: ' . $e->getMessage();
      Session::set('errors', 'Unable to save user! ' . $e->getMessage());
      return false;
    }
  }

  private static function getLastOrderId() {
    try {
      $stmt = (new self)->pdo->prepare("SELECT * FROM orders ORDER BY id desc");
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_CLASS, 'Order')[0]->id;
    } catch(Exception $e) {
      return null;
    }
  }
}
