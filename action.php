<?php

class Connection 
{
  private $conn;


  public function __construct(){
    $host = 'localhost';
    $username = 'root';
    $pass = '';
    $db = 'ukk_perpus';

    $this->conn = mysqli_connect($host, $username, $pass, $db);

    return $this->conn;
  }

  public function getConn(){
    return $this->conn;
  }
  
}