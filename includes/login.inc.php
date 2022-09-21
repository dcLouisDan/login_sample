<?php
include('class-autoload.inc.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $login = new Login\Control($email, $password);

  $login->loginUser();

  echo "Login";

  header("location: ../index.php?error=none");
}
