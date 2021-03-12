<!-- <? php
class User {
	public $id;
	public $username;
	private $password;

	public function __construct($id, $username)
	{
		this->id = $id;
		this->username = $username;
	}

	public function setPassword($password)
	{
		this->password = $password;
	}
} ?> -->


<?php

$username = $password = $error_message = $success = "";

$user=null;

if($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"]) || empty($_POST["password"])){
    $error_message = "Enter username and password";
  } else {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $success = "success";
  }
  
};

function getUser($username){
  $pdo = new PDO(
  'mysql:host=localhost;port=3306;dbname=php_test','root','');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt =$pdo->prepare('SELECT * FROM users WHERE username=:username');
  $stmt->execute([':username'=>$username]);
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}
// echo var_dump($result);


// if ($result){
//   $user = $result[0]['username'];
//   $psswrd =  $result[0]['password'];
// }
// else {
//   $error_message = "User not found";
// }
// if($username=="ZZ")
// {
//   echo "RED ALERT!";
// }

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport"> 

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Login page</title>
</head>
<body>
 <div class="container">
  <?php if($error_message){
    echo '<div class="alert alert-danger" role="alert">'.$error_message.'</div>';
  };
  if($success){
    echo '<div class="alert alert-success" role="alert">Welcome '.$username.'!</div>';
  }
  ?>

  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  	<h1>Login</h1>
  	<div class="row g-3 align-items-center">
     <div class="col-auto">
      <label for="username" class="col-form-label">Username</label>
    </div>
    <div class="col-auto">
      <input type="username" name="username" class="form-control">
    </div>

  </div>
  <div class="row g-3 align-items-center">
   <div class="col-auto">
    <label for="inputPassword6" class="col-form-label">Password</label>
  </div>
  <div class="col-auto">
    <input type="password" name="password" class="form-control" aria-describedby="passwordHelpInline">
  </div>
  <div class="form-group">
    <input type="submit" class="btn btn-primary" value="Login">
  </div>

</div>
</form>
</div>
</body>
</html>
