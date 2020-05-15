<?php
class Posts extends Controller
{
  public function __construct()
  {
    if (!isLoggedIn()) {
      redirect('users/login');
    }

    if ($_SESSION['user_status'] == 'Admin')
      redirect('admins/index');
    $this->postModel = $this->model('Post');
    $this->userModel = $this->model('User');
  }

  public function index()
  {
    // Get posts
    $posts = $this->postModel->getPosts();

    $data = [
      'posts' => $posts
    ];

    $this->view('posts/index', $data);
  }

  public function add()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Sanitize POST array
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [
        'title' => trim($_POST['title']),
        'body' => trim($_POST['body']),
        'user_id' => $_SESSION['user_id'],
        'image' => trim($_POST['image']),
        'lloji' => trim($_POST['lloji']),
        'lloji_err' => '',
        'image_err' => '',
        'title_err' => '',
        'body_err' => ''
      ];

      // Validate data
      if (empty($data['title'])) {
        $data['title_err'] = 'Please enter a title';
      }
      if (empty($data['body'])) {
        $data['body_err'] = 'Please enter some body text';
      }

      if (empty($data['image'])) {
        $data['image_err'] = 'Please insert an image';
      }

      if (empty($data['lloji'])) {
        $data['lloji_err'] = "Please insert a type ";
      }

      // Make sure no errors
      if (empty($data['lloji_err']) && empty($data['title_err']) && empty($data['body_err']) && empty($data['image_err'])) {
        // Validated
        if ($this->postModel->addPost($data)) {
          flash('post_message', 'Post Added');
          redirect('posts');
        } else {
          die('Something went wrong');
        }
      } else {
        // Load view with errors
        $this->view('posts/add', $data);
      }
    } else {
      $data = [
        'title' => '',
        'image' => '',
        'lloji' => '',
        'body' => ''
      ];

      $this->view('posts/add', $data);
    }
  }

  public function edit($id)
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Sanitize POST array
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      // name te select kur te qon value dfuhet mu kon lloji
      $data = [
        'id' => $id,
        'image' => trim($_POST['image']),
        'lloji' => trim($_POST['lloji']),
        'title' => trim($_POST['title']),
        'body' => trim($_POST['body']),
        'user_id' => $_SESSION['user_id'],
        'lloji_err' => '',
        'title_err' => '',
        'body_err' => ''
      ];

      // Validate data
      if (empty($data['lloji'])) {
        $data['lloji_err'] = 'Please enter type';
      }



      if (empty($data['title'])) {
        $data['title_err'] = 'Please enter title';
      }
      if (empty($data['body'])) {
        $data['body_err'] = 'Please enter body text';
      }
      if (empty($data['image'])) {
        $data['image_err'] = 'Please enter image';
      }


      // Make sure no errors
      if (empty($data['lloji_err']) && empty($data['title_err']) && empty($data['body_err']) && empty($data['image_err'])) {
        // Validated
        if ($this->postModel->updatePost($data)) {
          flash('post_message', 'Post Updated');
          redirect('posts');
        } else {
          die('Something went wrong');
        }
      } else {
        // Load view with errors
        $this->view('posts/edit', $data);
      }
    } else {
      // Get existing post from model
      $post = $this->postModel->getPostById($id);

      // Check for owner
      if ($post->user_id != $_SESSION['user_id']) {
        redirect('posts');
      }

      $data = [
        'id' => $id,
        'title' => $post->title,
        'lloji' => $post->lloji,
        'body' => $post->body,
        'image' => $post->image
      ];

      $this->view('posts/edit', $data);
    }
  }

  public function show($id)
  {
    $post = $this->postModel->getPostById($id);
    $user = $this->userModel->getUserById($post->user_id);

    $data = [
      'post' => $post,
      'user' => $user
    ];

    $this->view('posts/show', $data);
  }

  public function delete($id)
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Get existing post from model
      $post = $this->postModel->getPostById($id);

      // Check for owner
      if ($post->user_id != $_SESSION['user_id']) {
        redirect('posts');
      }

      if ($this->postModel->deletePost($id)) {
        flash('post_message', 'Post Removed');
        redirect('posts');
      } else {
        die('Something went wrong');
      }
    } else {
      redirect('posts');
    }
  }
}
