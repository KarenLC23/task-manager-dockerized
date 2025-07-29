<?php

class Database {
  public static function connect() {
    $host = getenv('DB_HOST');
    $name = getenv('MYSQL_DATABASE');
    $user = getenv('DB_USER');
    $pass = getenv('MYSQL_ROOT_PASSWORD');

    try {
      return new PDO("mysql:host=$host;dbname=$name", $user, $pass);
    } catch (PDOException $e) {
      die('Error de conexión: ' . $e->getMessage());
    }
  }
}
