<?php 

require_once "config.php";

class Database {
	private $host = DB_SERVER;
    private $db_name = DB_NAME;
    private $username = DB_USERNAME;
    private $password = DB_PASSWORD;
    private $port = DB_PORT;
    public $connection;

    private $sql_db = "CREATE DATABASE IF NOT EXISTS ".DB_NAME;

    private $sql_table = "CREATE TABLE IF NOT EXISTS users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(30) NOT NULL UNIQUE,
    password VARCHAR(100) NOT NULL,
    date DATETIME DEFAULT CURRENT_TIMESTAMP
	)";

	private function connect_db(){
		try {
			$conn = new PDO("mysql:host=".DB_SERVER, DB_USERNAME, DB_PASSWORD);
			// set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$conn->exec($sql_db);
			} catch(PDOException $e) {
			echo '<div class="alert alert-danger" role="alert">'."Connection failed: " . $e->getMessage().'</div>';
		}
	}

	private function create_table(){
		try {
			$conn = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME, DB_USERNAME, DB_PASSWORD);
			// set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$conn->exec($sql_table);
			} catch(PDOException $e) {
			echo '<div class="alert alert-danger" role="alert">'.$e->getMessage().'</div>';
		}
	}
}


?>