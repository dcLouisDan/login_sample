<?php
// include('class-autoload.inc.php');
include('../vendor/autoload.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $first_name = $_POST['firstName'];
  $last_name = $_POST['lastName'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $repeatPassword = $_POST['repeatPassword'];

  $signUp = new MyApp\Signup\Control($first_name, $last_name, $email, $password, $repeatPassword);

  $signUp->signupUser();

  header("location: ../index.php?error=none");
}
