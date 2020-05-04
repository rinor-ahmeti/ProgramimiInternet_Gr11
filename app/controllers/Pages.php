<?php
  class Pages extends Controller {
    public function __construct(){
      $this->pageModel=$this->model('Page');
      $this->userModel=$this->model('Post');
    }
    
    public function index(){
      if(isLoggedIn()){
        redirect('posts');
      }

      $data = [
        'title' => 'PIK',
        'description' => 'Nje faqe e bere me shume sakrifica me 4 shoke te ngushte (te paraqitur ne foto)'
      ];
     
      $this->view('pages/index', $data);
    }

    public function about(){
      $data = [
        'title' => 'About Us',
        'description' => 'Bere nga Art Ahmetaj, Rinor Ahmeti,Adi SYYYYLEJMANIII dhe Samir Simnica'
      ];

      $this->view('pages/about', $data);
    }
  
  
  
    public function teknologji()
    {
      $posts=$this->pageModel->getSpecificPosts('Teknologji');
      $data = [
        'posts' => $posts,
        'title'=>'Teknologjia'
      ];

      $this->view('pages/teknologji', $data);


    }


    public function sport()
    {
      $posts=$this->pageModel->getSpecificPosts('Sport');
      $data = [
        'posts' => $posts,
        'title'=>'Sporti'
      ];

      $this->view('pages/sport', $data);


    }

    public function bote()
    {
      $posts=$this->pageModel->getSpecificPosts('Bote');
      $data = [
        'posts' => $posts,
        'title'=>'Bota'
        
      ];

      $this->view('pages/bote', $data);


    }

    public function kulture()
    {
      $posts=$this->pageModel->getSpecificPosts('Kulture');
      $data = [
        'posts' => $posts,
        'title'=>'Kultura'
      ];

      $this->view('pages/kulture', $data);


    }

    public function details($id){
      $post=$this->userModel->getPostById($id);
      $data=['post'=>$post];
      $this->view('pages/details',$data);

    }


  }