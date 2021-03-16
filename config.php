<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'php_test');
define('DB_PORT', '3306');

$sql_db = "CREATE DATABASE IF NOT EXISTS ".DB_NAME;

$sql_table = "CREATE TABLE IF NOT EXISTS users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(30) NOT NULL UNIQUE,
    password VARCHAR(100) NOT NULL,
    date DATETIME DEFAULT CURRENT_TIMESTAMP
)";
 
// Try to connect to database
try {
  $conn = new PDO("mysql:host=".DB_SERVER, DB_USERNAME, DB_PASSWORD);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $conn->exec($sql_db);
  } catch(PDOException $e) {
  echo '<div class="alert alert-danger" role="alert">'."Connection failed: " . $e->getMessage().'</div>';
}

$conn = null;

// Try to create table
try {
  $conn = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME, DB_USERNAME, DB_PASSWORD);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $conn->exec($sql_table);
  } catch(PDOException $e) {
  echo '<div class="alert alert-danger" role="alert">'.$e->getMessage().'</div>';
}
?>