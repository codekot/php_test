<?php

session_start();

$error_message = $username = $success = "";

if (!isset($_SESSION["loggedin"])){
  $error_message = "You are not logged in. Please log in and try again.";
} elseif ($_SESSION["loggedin"] == true) {
  $success = "Welcome";
  $username = $_SESSION["username"];
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport"> 

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Home page</title>
</head>
<body>
 <div class="container">
  <h1>Home page</h1>
  <?php if ($error_message)
{
    echo '<div class="alert alert-danger" role="alert">' . $error_message . '</div>';
    echo '<a href="login.php" class="link-primary">Login here</a>';
};
if ($success)
{
    echo '<div class="alert alert-success" role="alert">Welcome ' . $username . '!</div>';
    echo '<a href="logout.php" class="text-muted">To logout press here</a>';
}
?>

</div>


</body>
</html>
