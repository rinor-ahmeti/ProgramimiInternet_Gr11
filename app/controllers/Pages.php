<?php
class Pages extends Controller
{


  public function __construct()
  {
    if (!isset($_COOKIE['user'])) {
      $cookie_name = 'user';
      $arr = [
        'Teknologji' => 0,
        'Kulture' => 0,
        'Sport' => 0,
        'Bote' => 0
      ];
      setcookie($cookie_name, serialize($arr), time() + (86400 * 30), "/");
    }

    
    $this->pageModel = $this->model('Page');
    $this->userModel = $this->model('Post');
  }

  public function index()
  {
//returnMax(unserialize($_COOKIE['user']
    $indexes=[];
   for($i=0;$i<2;$i++)
   {
     $indexes[$i]=randomizer();
    while($indexes[$i]==returnMax(unserialize($_COOKIE['user'])).'a'){
    $indexes[$i]=randomizer();
    }
   }

    $posts=$this->userModel-> getallFrontPosts();
    if (isLoggedIn()) {
      redirect('posts');
    }

    $data = [
      'title' => 'PIK',
      'description' => 'Nje faqe e bere me shume sakrifica me 4 shoke te ngushte (te paraqitur ne foto)',
      'posts'=>$posts,
      'indexes'=>$indexes
    ];

    $this->view('pages/index', $data);
  }

  public function about()
  {
    $data = [
      'title' => 'About Us',
      'description' => 'Bere nga Art Ahmetaj, Rinor Ahmeti,Adi SYYYYLEJMANIII dhe Samir Simnica'
    ];

    $this->view('pages/about', $data);
  }




  public function teknologji()
  {
    if (isset($_COOKIE['user'])) {
      $array = unserialize($_COOKIE['user']);
      $array['Teknologji'] += 1;
      setcookie('user', serialize($array), time() + (86400 * 30), "/");
    } else {
      $cookie_name = 'user';
      $arr = [
        'Teknologji' => 0,
        'Kulture' => 0,
        'Sport' => 0,
        'Bote' => 0
      ];
      setcookie('user', serialize($arr), time() + (86400 * 30), "/");
    }

    $posts = $this->pageModel->getSpecificPosts('Teknologji');
    $data = [
      'posts' => $posts,
      'title' => 'Teknologjia'
    ];

    $this->view('pages/teknologji', $data);
  }


  public function sport()
  {

    if (isset($_COOKIE['user'])) {
      $array = unserialize($_COOKIE['user']);
      $array['Sport'] += 1;
      setcookie('user', serialize($array), time() + (86400 * 30), "/");
    } else {
      $cookie_name = 'user';
      $arr = [
        'Teknologji' => 0,
        'Kulture' => 0,
        'Sport' => 0,
        'Bote' => 0
      ];
      setcookie('user', serialize($arr), time() + (86400 * 30), "/");
    }



    $posts = $this->pageModel->getSpecificPosts('Sport');
    $data = [
      'posts' => $posts,
      'title' => 'Sporti'
    ];

    $this->view('pages/sport', $data);
  }

  public function bote()
  {

    if (isset($_COOKIE['user'])) {
      $array = unserialize($_COOKIE['user']);
      $array['Bote'] += 1;
      setcookie('user', serialize($array), time() + (86400 * 30), "/");
    } else {
      $cookie_name = 'user';
      $arr = [
        'Teknologji' => 0,
        'Kulture' => 0,
        'Sport' => 0,
        'Bote' => 0
      ];
      setcookie('user', serialize($arr), time() + (86400 * 30), "/");
    }






    $posts = $this->pageModel->getSpecificPosts('Bote');
    $data = [
      'posts' => $posts,
      'title' => 'Bota'

    ];

    $this->view('pages/bote', $data);
  }

  public function kulture()
  {
    if (isset($_COOKIE['user'])) {
      $array = unserialize($_COOKIE['user']);
      $array['Kulture'] += 1;
      setcookie('user', serialize($array), time() + (86400 * 30), "/");
    } else {
      $cookie_name = 'user';
      $arr = [
        'Teknologji' => 0,
        'Kulture' => 0,
        'Sport' => 0,
        'Bote' => 0
      ];
      setcookie('user', serialize($arr), time() + (86400 * 30), "/");
    }



    $posts = $this->pageModel->getSpecificPosts('Kulture');
    $data = [
      'posts' => $posts,
      'title' => 'Kultura'
    ];

    $this->view('pages/kulture', $data);
  }

  public function details($id)
  {
    


    $post = $this->userModel->getPostById($id);
    $data = ['post' => $post];
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
      downloadFile($post->title, $post->body, $post->id, $post->created_at);




    $this->view('pages/details', $data);
  }
}
