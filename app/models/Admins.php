<?php

class Admins {
  private $db;

    public function __construct(){
      $this->db = new Database;
    }

      // Find Login
    public function findLogin($login){
      $this->db->query('SELECT * FROM admin WHERE login = :login');
      //Bind values
      $this->db->bind(':login', $login);

      $row = $this->db->single();

      // Check row
      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }

    // Login User
  public function login($login, $password){
    $this->db->query('SELECT * FROM admin WHERE login = :login');
    $this->db->bind(':login', $login);

    $row = $this->db->single();

    $hashed_password = $row->password;
    if(password_verify($password, $hashed_password)){
      return $row;
    } else {
      return false;
    }
  }
}
