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
    <?php include_once "header.php"; ?>
    <h1>Register</h1>
    <?php if ($error_message){
    echo '<div class="alert alert-danger" role="alert">' . $error_message . '</div>';
    }?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <div class="form-group">
    <label for="username">Username</label>
    <input type="username" name="username" class="form-control" id="username" placeholder="Enter username" value="<?php echo $username; ?>">
    <?php if ($username_err){
      echo '<div class="alert alert-danger" role="alert">' . $username_err . '</div>';
    }?>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password" class="form-control" id="password" placeholder="Password" value="<?php echo $password; ?>">
    <?php if ($password_err){
      echo '<div class="alert alert-danger" role="alert">' . $password_err . '</div>';
    }?>
  </div>
  <div class="form-group">
    <label for="password">Confirm password</label>
    <input type="password" name="confirm_password" class="form-control" id="password" placeholder="Confirm password" value="<?php echo $confirm_password; ?>">
    <?php if ($confirm_password_err){
      echo '<div class="alert alert-danger" role="alert">' . $confirm_password_err . '</div>';
    }?>
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<p class="text-muted">Already have an account? <a href="login.php" class="link-primary">Login here</a>.
</p>
</div>


   
  </body>
</html>