<?php
class User
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }


  //LOGIN USER
  public function login($email, $password)
  {
    $this->db->query('SELECT * FROM users WHERE email = :email');
    $this->db->bind(':email', $email);

    $row = $this->db->single();

    $hashed_password = $row->password;
    if (password_verify($password, $hashed_password)) {
      return $row;
    } else {
      return false;
    }
  }

  //FIND USER BY EMAIL
  public function findUserByEmail($email)
  {
    $this->db->query('SELECT * FROM users WHERE email = :email');
    
    $this->db->bind(':email', $email);

    $row = $this->db->single();

    // CHECK ROW
    if ($this->db->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }

  // GET USER BY ID
  public function getUserById($id)
  {
    $this->db->query('SELECT * FROM users WHERE id = :id');

    $this->db->bind(':id', $id);

    $row = $this->db->single();

    return $row;
  }
}
