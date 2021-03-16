<?php 

require_once "config.php";

class Database {
	private $host = DB_SERVER;
    private $db_name = DB_NAME;
    private $username = DB_USERNAME;
    private $password = DB_PASSWORD;
    private $port = DB_PORT;
    public $conn;
}


?>