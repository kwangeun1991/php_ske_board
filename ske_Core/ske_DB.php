<?php

class ske_DB extends PDO
{
  public function __construct()
  {
    try {
      $dsn = "mysql:host=localhost;dbname=kwang4585";
      $username = "kwang4585";
      $password = "ske201301";

      parent::__construct($dsn, $username, $password);

    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }
}
