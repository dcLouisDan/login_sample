<?php

namespace Login;

class Control extends Model
{
  private $email;
  private $password;

  public function __construct(
    string $email,
    string $password
  ) {
    $this->email = $email;
    $this->password = $password;
  }

  public function loginUser()
  {
    if ($this->emptyInput() == false) {
      header("location: ../index.php?error=emptyInput");
      exit();
    }

    $this->getUser($this->email, $this->password);
  }

  private function emptyInput()
  {
    if (
      empty($this->email) ||
      empty($this->password)
    ) {
      return false;
    } else {
      return true;
    }
  }
}
