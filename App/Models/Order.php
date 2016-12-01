<?php

class Order extends Model {
  public $id;
  public $user_id;
  public $total_price;

  public function save() {
    try {
      $stmt = $this->pdo->prepare("INSERT INTO orders (user_id, total_price) VALUES (:user_id, :total_price)");
      $stmt->bindValue(':user_id', $this->user_id);
      $stmt->bindValue(':total_price', $this->total_price);
      return $stmt->execute();
    } catch(Exception $e) {
      echo 'Exception: ' . $e->getMessage();
      Session::set('errors', 'Unable to save user! ' . $e->getMessage());
      return false;
    }
  }
}
