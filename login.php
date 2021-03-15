<?php

require_once "user.php";
session_start();

$username = $password = $error_message = $success = "";


if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if (empty($_POST["username"]) || empty($_POST["password"]))
    {
        $error_message = "Enter username and password";
    }
    else
    {
        $username = $_POST["username"];
        $password = $_POST["password"];
        //$success = "success";
        $user = get_user($username);
        if (!$user)
        {
            $error_message = "User not found";
        }
        else
        {
            $hash_password = $user[0]["password"];
            if (password_verify($password, $hash_password))
            {
                $success = "success";
                $_SESSION["loggedin"] = true;
                $_SESSION["username"] = $username;
                header('location: index.php');
            } else {
                $error_message = "Wrong password";
            }
        }

    }

};


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport"> 

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Login page</title>
</head>
<body>
 <div class="container">
    <?php include_once "header.php"; ?>
    <h1>Login</h1>
    <?php if ($error_message)
    {
    echo '<div class="alert alert-danger" role="alert">' . $error_message . '</div>';
    };
    if ($success)
    {
    echo '<div class="alert alert-success" role="alert">Welcome ' . $username . '!</div>';
    }
    ?>

  <form method="post" action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>'>
    
    <div class="form-group">
    <label for="username">Username</label>
    <input name="username" class="form-control" id="username" placeholder="Enter username" value="<?php echo $username; ?>">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
  </div>
    
  <button type="submit" class="btn btn-primary">Login</button>
</form>
<p class="text-muted">Not registered? <a href="register.php" class="link-primary">Create an account</a>.
</p>
</div>


</body>
</html>
