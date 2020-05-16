<?php
class Comment
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    public function insertComments($content, $type, $id)
    {
        $this->db->query('INSERT INTO komentet(content,lloji,post_id) VALUES(:content,:lloji,:post_id)');
        $this->db->bind(':content', $content);
        $this->db->bind(':lloji', $type);
        $this->db->bind(':post_id', $id);

        return $this->db->execute();
    }
}



/*

   $this->db->query('INSERT INTO posts (title, image,lloji,user_id, body) VALUES(:title, :image,:lloji,:user_id, :body)');
      // Bind values
      $this->db->bind(':title', $data['title']);
      $this->db->bind(':image',$data['image']);
      $this->db->bind(':user_id', $data['user_id']);
      $this->db->bind(':body', $data['body']);
      $this->db->bind(':lloji',$data['lloji']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
        */
