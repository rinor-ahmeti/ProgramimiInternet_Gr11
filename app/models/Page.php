<?php

class Page
{

    private $db;
public function __construct()
{
 $this->db= new Database;
}


public function getspecificPosts($data)
{
    $this->db->query('SELECT * from posts where lloji=:lloji');

        $this->db->bind(':lloji',$data);

            $results = $this->db->resultSet();

            return $results;
}
}
