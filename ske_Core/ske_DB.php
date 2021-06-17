<?php

class ske_DB extends PDO
{
  public function __construct()
  {
    try {
      $dsn = "mysql:host=localhost;dbname=111111";
      $username = "111111";
      $password = "111111";

      parent::__construct($dsn, $username, $password);

    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }
}
