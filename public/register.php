<?php

require_once "../user.php";

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = $error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if(empty($_POST["username"])){
    $username_err = "Enter a username";
  } else {
    $username = $_POST["username"];
    $user = get_user($username);
    if($user) {
      $username_err = "This username is already taken";
    } else {
      if(empty($_POST["password"])){
        $password_err = "Please enter a password";
      } else {
        $password = $_POST["password"];
      }
      if(empty($_POST["confirm_password"])){
        $confirm_password_err = "Please confirm password";
      } else {
        $confirm_password = $_POST["confirm_password"];
        if($confirm_password != $password){
          $confirm_password_err = "Passwords should match";
        } elseif (!$user) {
          $hash_password = password_hash($password, PASSWORD_DEFAULT);
          if(write_user($username, $hash_password)){
            header('location: login.php');
          } else {
            $error_message = "Something went wrong";
          }
        }
      }
    }
  }
}

include_once "../views/register_view.php";
?>


