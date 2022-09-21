<?php

namespace MyApp\Login;

use MyApp\Dbh;


class Model extends Dbh
{
  protected function getUser(
    string $email,
    string $password
  ) {
    $stmt = "SELECT * FROM users WHERE email = ?;";
    $query = $this->connect()->prepare($stmt);

    echo "1";

    if (!$query->execute([$email])) {
      $query = null;
      header("location: ../index.php?error=stmtfailed");
      exit();
    }

    echo "2";

    if ($query->rowCount() == 0) {
      $query = null;
      header("location: ../index.php?error=userNotFound");
      exit();
    }
    echo "3";

    $user = $query->fetchAll();
    $hashedPassword = $user[0]['password'];
    $checkPassword = password_verify($password, $hashedPassword);
    echo "4";

    if ($checkPassword === false) {
      $query = null;
      header("location: ../index.php?error=wrongPassword");
      exit();
    } elseif ($checkPassword === true) {
      session_start();

      $_SESSION["user_id"] = $user[0]['user_id'];
      $_SESSION["first_name"] = $user[0]['first_name'];
      $_SESSION["last_name"] = $user[0]['last_name'];
      $_SESSION["email"] = $user[0]['email'];

      $query = null;
    }
  }
}
