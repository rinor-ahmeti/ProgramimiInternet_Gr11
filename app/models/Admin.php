<?php


class Admin
{
private $db;

public function __construct(){
    $this->db = new Database;
  }



public function getUsers()
{
    $this->db->query('SELECT *
    from users
    where status="User"
    ');

$results = $this->db->resultSet();

return $results;
}

public function addUser($data){
  $this->db->query('INSERT INTO users  (name, email,status, password) VALUES(:name, :email,:status, :password)');

  $this->db->bind(':name', $data['name']);
  $this->db->bind(':status',"User");
  $this->db->bind(':email',$data['email']);
  $this->db->bind(':password', $data['password']);

 
  if($this->db->execute()){
    return true;
  } else {
    return false;
  }
}
public function updateUser($data){
  $this->db->query('UPDATE users SET name = :name, email=:email,password=:password ,status = :status WHERE id = :id');
  
  $this->db->bind(':id', $data['id']);
  $this->db->bind(':name',$data['name']);
  $this->db->bind(':status', 'User');
  $this->db->bind(':password',$data['password']);
  $this->db->bind(':email', $data['email']);

  if($this->db->execute()){
    return true;
  } else {
    return false;
  }
}

public function getuserById($id){
  $this->db->query('SELECT * FROM users WHERE id = :id');
  $this->db->bind(':id', $id);

  $row = $this->db->single();

  return $row;
}



public function deleteUser($id){
  $this->db->query('DELETE FROM users WHERE id = :id');

  $this->db->bind(':id', $id);


  if($this->db->execute()){
    return true;
  } else {
    return false;
  }
}
}


?>