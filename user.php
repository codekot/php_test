<?php 

function get_user($username)
{
    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=php_test', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare('SELECT * FROM users WHERE username=:username');
    $stmt->execute([':username' => $username]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
};

function write_user($username, $password)
{
	$pdo = new PDO('mysql:host=localhost;port=3306;dbname=php_test', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
    $stmt->execute([':username' => $username, ':password'=>$password]);
    return "success";
}

?>
