<?php 

require_once "config.php";

function get_user($username)
{
    $pdo = new PDO("mysql:host=".DB_SERVER.";port=".DB_PORT.";dbname=".DB_NAME, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare('SELECT * FROM users WHERE username=:username');
    $stmt->execute([':username' => $username]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
};

function write_user($username, $password)
{
	$pdo = new PDO("mysql:host=".DB_SERVER.";port=".DB_PORT.";dbname=".DB_NAME, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
    $stmt->execute([':username' => $username, ':password'=>$password]);
    return "success";
}

?>
