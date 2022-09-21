<?php

namespace Signup;

use Dbh;

class Model extends Dbh
{
  protected function setUser(
    string $firstName,
    string $lastName,
    string $email,
    string $password
  ) {
    $stmt = "INSERT INTO users(first_name, last_name, email, `password`) VALUES (?, ?, ?, ?);";
    $query = $this->connect()->prepare($stmt);

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    if (!$query->execute([$firstName, $lastName, $email, $hashedPassword])) {
      $query = null;
      header("header: ../index.php?error=stmtfailed");
      exit();
    }

    $query = null;
  }

  protected function checkUser(string $email)
  {
    $stmt = "SELECT * FROM users WHERE email = ?;";
    $query = $this->connect()->prepare($stmt);

    if (!$query->execute([$email])) {
      $query = null;
      header("header: ../index.php?error=stmtfailed");
      exit();
    }

    if ($query->rowCount() > 0) {
      return false;
    } else {
      return true;
    }
  }
}
