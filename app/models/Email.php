<?php

class Email {
  private $db;

  public function __construct(){
    $this->db = new Database;
  }

  // Add Email
  public function addEmail($data){
    $this->db->query('INSERT INTO users (email) VALUES(:email)');
    //Bind values
    $this->db->bind(':email', $data['email']);

    //Execute
    if($this->db->execute()){
      return true;
    } else {
      return false;
    }
  }

  // Find Email
  public function findEmail($email){
    $this->db->query('SELECT * FROM users WHERE email = :email');
    //Bind values
    $this->db->bind(':email', $email);

    $row = $this->db->single();

    // Check row
    if($this->db->rowCount() > 0){
      return true;
    } else {
      return false;
    }
  }
}
