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




