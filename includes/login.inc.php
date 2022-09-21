<?php
// include('class-autoload.inc.php');
include('../vendor/autoload.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $login = new MyApp\Login\Control($email, $password);

  $login->loginUser();

  echo "Login";

  header("location: ../index.php?error=none");
}
