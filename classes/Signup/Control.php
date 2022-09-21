<?php

namespace MyApp\Signup;

class Control extends Model
{
  private $firstName;
  private $lastName;
  private $email;
  private $password;
  private $repeatPassword;

  public function __construct(
    string $firstName,
    string $lastName,
    string $email,
    string $password,
    string $repeatPassword
  ) {
    $this->firstName = $firstName;
    $this->lastName = $lastName;
    $this->email = $email;
    $this->password = $password;
    $this->repeatPassword = $repeatPassword;
  }

  public function signupUser()
  {
    if ($this->emptyInput() == false) {
      header("location: ../index.php?error=emptyInput");
      exit();
    }
    if ($this->invalidEmail() == false) {
      header("location: ../index.php?error=invalidEmail");
      exit();
    }
    if ($this->passwordMatch() == false) {
      header("location: ../index.php?error=passwordNotMatch");
      exit();
    }
    if ($this->checkTakenEmail() == false) {
      header("location: ../index.php?error=takenEmail");
      exit();
    }

    $this->setUser($this->firstName, $this->lastName, $this->email, $this->password);
  }

  private function emptyInput()
  {
    if (
      empty($this->firstName) ||
      empty($this->lastName) ||
      empty($this->email) ||
      empty($this->password) ||
      empty($this->repeatPassword)
    ) {
      return false;
    } else {
      return true;
    }
  }

  private function invalidEmail()
  {
    if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
      return false;
    } else {
      return true;
    }
  }

  private function passwordMatch()
  {
    if ($this->password !== $this->repeatPassword) {
      return false;
    } else {
      return true;
    }
  }

  private function checkTakenEmail()
  {
    if (!$this->checkUser($this->email)) {
      return false;
    } else {
      return true;
    }
  }
}
