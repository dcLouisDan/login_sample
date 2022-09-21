<?php

class Dbh
{
  private $db_host = "localhost";
  private $db_user = "root";
  private $db_password = "";
  private $db_name = "login_sample_db";

  protected function connect()
  {
    try {
      $connection = new PDO("mysql:host={$this->db_host};dbname={$this->db_name};charset=utf8", $this->db_user, $this->db_password);
      $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
      return $connection;
    } catch (PDOException $e) {
      print "Error: " . $e->getMessage() . "<br/>";
      die();
    }
  }
}
