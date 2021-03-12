<?php
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
        $user = getUser($username);
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
            }
        }

    }

};

function getUser($username)
{
    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=php_test', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare('SELECT * FROM users WHERE username=:username');
    $stmt->execute([':username' => $username]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
};


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
  <?php if ($error_message)
{
    echo '<div class="alert alert-danger" role="alert">' . $error_message . '</div>';
};
if ($success)
{
    echo '<div class="alert alert-success" role="alert">Welcome ' . $username . '!</div>';
}
?>

  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <h1>Login</h1>
    <div class="form-group">
    <label for="username">Username</label>
    <input type="username" name="username" class="form-control" id="username" placeholder="Enter username">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
  </div>
    
  <button type="submit" class="btn btn-primary">Login</button>
</form>
</div>
</body>
</html>
