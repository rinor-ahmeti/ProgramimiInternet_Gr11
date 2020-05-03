<?php
  class Pages extends Controller {
    public function __construct(){
      $this->pageModel=$this->model('Page');
    }
    
    public function index(){
      if(isLoggedIn()){
        redirect('posts');
      }

      $data = [
        'title' => 'PIK',
        'description' => 'Faqe e thjeshte e lajmeve'
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
        'posts' => $posts
      ];

      $this->view('pages/teknologji', $data);


    }


    public function sport()
    {
      $posts=$this->pageModel->getSpecificPosts('Sport');
      $data = [
        'posts' => $posts
      ];

      $this->view('pages/sport', $data);


    }

    public function bote()
    {
      $posts=$this->pageModel->getSpecificPosts('Bote');
      $data = [
        'posts' => $posts
      ];

      $this->view('pages/bote', $data);


    }

    public function kulture()
    {
      $posts=$this->pageModel->getSpecificPosts('Kulture');
      $data = [
        'posts' => $posts
      ];

      $this->view('pages/kulture', $data);


    }


  }