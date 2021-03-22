<?php

session_start();

$error_message = $username = $success = "";

if (!isset($_SESSION["loggedin"])){
  $error_message = "You are not logged in. Please log in and try again.";
} elseif ($_SESSION["loggedin"] == true) {
  $success = "Welcome";
  $username = $_SESSION["username"];
}

include_once "../views/index_view.php";
?>

