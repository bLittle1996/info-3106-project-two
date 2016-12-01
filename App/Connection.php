<?php
class Connection {
  public static function make() {
    $config = require 'config.php';
    $config = $config['database'];
    try {
      return new PDO(
        $config['DB_DRIVER'] . ':host=' . $config['DB_HOST'] . ';dbname=' . $config['DB_NAME'],
        $config['DB_USER'],
        $config['DB_PASSWORD'],
        $config['options']
      );
    } catch (PDOException $e) {
        die($e->getMessage());
    }
  }
}
