<?php

$username = $password = $error_message = $success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if(empty($_POST["username"])){
    $error_message = "Enter username";
  } else {
    $username = $_POST["username"];
  }
  if(empty($_POST["password"])){
    $error_message = "Please enter a password";
  }
  if
}
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Register</title>
  </head>
  <body>
    <div class="container">
    <h1>Register</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <div class="form-group">
    <label for="username">Username</label>
    <input type="username" name="username" class="form-control" id="username" placeholder="Enter username">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="password">Confirm password</label>
    <input type="password" name="confirm_password" class="form-control" id="password" placeholder="Repeat assword">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

    
  </body>
</html>