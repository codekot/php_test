<?php

require_once "../user.php";
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

include_once "../views/login_view.php";
?>

