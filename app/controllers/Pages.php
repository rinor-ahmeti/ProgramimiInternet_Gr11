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
    $this->postModel = $this->model('Post');
    $this->commentModel=$this->model('Comment');
  }

  public function index()
  {
    //returnMax(unserialize($_COOKIE['user']
    $indexes = [];
    for ($i = 0; $i < 2; $i++) {
      $indexes[$i] = randomizer();
      while ($indexes[$i] == returnMax(unserialize($_COOKIE['user']))) {
        $indexes[$i] = randomizer();
      }
    }

    $posts = $this->postModel->getallFrontPosts();
    if (isLoggedIn()) {
      redirect('posts');
    }

    $data = [
      'title' => 'PIK',
      'description' => 'Nje faqe e bere me shume sakrifica me 4 shoke te ngushte (te paraqitur ne foto)',
      'posts' => $posts,
      'indexes' => $indexes
    ];

    $this->view('pages/index', $data);
  }

  public function about(){

  $json = file_get_contents('https://api.nasa.gov/planetary/apod?api_key=Sl9c9nDYisX3Tts4ZjLpFtYbL2jlUFLhwCoeaqNL'); 
$json= json_decode($json);
  
    $data = [
      'json'=>$json,
      'title' => 'About Us // Rreth Nesh',
      'description' => 'Krijuar nga Art Ahmetaj,Adi Sylejmani, Rinor Ahmeti dhe Samir Simnica.'
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
      'title' => 'Teknologji'
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


    if (isset($_POST['mesazhi'])) {
      sendEmail($id, $_POST['mesazhi']);
      
    }

    $post = $this->postModel->getPostById($id);
    $data = ['post' => $post];
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['download']))
      downloadFile($post->title, $post->body, $post->id, $post->created_at);

    $this->view('pages/details', $data);
  }


  public function ajax($request='null')
  { 
     $post=$this->postModel->getTitlePosts($request);
    //TODO:fix this 
    echo '<table class="vitamins">';
   
    echo '<tr>';
    echo '<th>Title </th>';
    echo '<th>  ID </th>';
    echo '<th> Data </th>'; 
    foreach ($post as $specificPost) {
       $location=URLROOT.'/pages/details/'.$specificPost->id;
      echo '<tr>';
      echo "<td> $specificPost->title </td>";
      echo "<td> <a href=$location> ID:$specificPost->id </td>";
      echo "<td> $specificPost->created_at</td>";
      
      echo '</tr>';
//  echo "<a href=$location> ID:$specificPost->id </a> dhe eshte krijuar ne $specificPost->created_at";
     }
     echo '</table>';
    }

public function comment($request)
{
$insertedComment=explode(',',$request);
[$content,$id,$title]=$insertedComment;
$comment=$this->commentModel->insertComments($content,$title,$id);
}

}
