<?php 
    const DB_HOST = 'db';
    const DB_USER = 'root';
    const DB_PASSWORD = 'password';
    try {
      $dsn = 'mysql:host=db;dbname=posse;charset=utf8;';
      $username = 'root';
      $password = 'password';
      $driver_options = [
          PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_EMULATE_PREPARES => false,
      ];
      $pdo = new PDO($dsn, $username, $password, $driver_options);
  } catch(Exception $e) {
      print($e->getTraceAsString());
  }
  // <!-- $idという変数にgetした値を返す -->
  $stmt = $pdo->prepare('SELECT * FROM carriculum');
  $stmt->execute();
  $test =  $stmt->fetchAll();
  