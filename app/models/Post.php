<?php
  class Post {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getPosts(){
      $this->db->query('SELECT *,
                        posts.id as postId,
                        users.id as userId,
                        posts.created_at as postCreated,
                        users.created_at as userCreated
                        FROM posts
                        INNER JOIN users
                        ON posts.user_id = users.id
                        ORDER BY posts.created_at DESC
                        ');

      $results = $this->db->resultSet();

      return $results;
    }

 
//postComment(<?php echo $data['post']->id.'-'.$data['post']->lloji)


    public function addPost($data){
      $this->db->query('INSERT INTO posts (title, image,lloji,user_id, body) VALUES(:title, :image,:lloji,:user_id, :body)');
      // Bind values
      $this->db->bind(':title', $data['title']);
      $this->db->bind(':image',$data['image']);
      $this->db->bind(':user_id', $data['user_id']);
      $this->db->bind(':body', $data['body']);
      $this->db->bind(':lloji',$data['lloji']);

      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function updatePost($data){
      $this->db->query('UPDATE posts SET title = :title, image=:image, lloji=:lloji,body = :body WHERE id = :id');

      $this->db->bind(':id', $data['id']);
      $this->db->bind(':image',$data['image']);
      $this->db->bind(':title', $data['title']);
      $this->db->bind(':body', $data['body']);
      $this->db->bind(':lloji',$data['lloji']);


      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function getPostById($id){
      $this->db->query('SELECT * FROM posts WHERE id = :id');
      $this->db->bind(':id', $id);

      $row = $this->db->single();

      return $row;
    }

    public function deletePost($id){
      $this->db->query('DELETE FROM posts WHERE id = :id');
  
      $this->db->bind(':id', $id);

      
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function getFrontPosts($lloji)
    {
    $this->db->query('SELECT * FROM posts where lloji=:lloji LIMIT 1');
    $this->db->bind(':lloji',$lloji);
    $row = $this->db->single();
    
          return $row;
    
    }
    
    public function getallFrontPosts()
    {
     
      $frontPagePosts=
      ['Teknologji'=>$this->getFrontPosts('Teknologji'),
      'Bote'=>$this->getFrontPosts('Bote'),
      'Sport'=>$this->getFrontPosts('Sport'),
      'Kulture'=>$this->getFrontPosts('Kulture')
      
    ];
    return $frontPagePosts;
    }
    
    public function getTitlePosts($title)
    {
      $this->db->query('SELECT * FROM posts WHERE REPLACE(title," ","") like :title');
      $this->db->bind(':title','%'.$title.'%');
      $results=$this->db->resultSet();
      return $results;

    }

    
  }