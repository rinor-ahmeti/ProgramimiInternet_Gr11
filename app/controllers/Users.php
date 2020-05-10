<?php
  class Users extends Controller {
    public function __construct(){
    
      if(!isset($_COOKIE['user']))
      {
       $cookie_name='user';
        $arr=[
          'Teknologji'=>0,
          'Kulture'=>0,
          'Sport'=>0,
          'Bote'=>0
        ];
        setcookie($cookie_name, serialize($arr), time() + (86400 * 30), "/");

      }
   

      $this->userModel = $this->model('User');
    }

  
    public function login(){
      // Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        // Init data
        $data =[
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),
          'email_err' => '',
          'password_err' => '',      
        ];

        // Validate Email
        if(empty($data['email'])){
          $data['email_err'] = 'Please enter email';
        }

        // Validate Password
        if(empty($data['password'])){
          $data['password_err'] = 'Please enter password';
        }

        if(!validateEmail($data['email'])){
          $data['email_err']='Invalid Email';
        }

        // Check for user/email
        if($this->userModel->findUserByEmail($data['email'])){
          // User found
        } else {
          // User not found
          $data['email_err'] = 'Invalid Credentials';
        }

        // Make sure errors are empty
        if(empty($data['email_err']) && empty($data['password_err'])){
          // Validated
          // Check and set logged in user
          $loggedInUser = $this->userModel->login($data['email'], $data['password']);

          if($loggedInUser){
            // Create Session
            $this->createUserSession($loggedInUser);
          } else {
            $data['password_err'] = 'Password incorrect';

            $this->view('users/login', $data);
          }
        } else {
          // Load view with errors
          $this->view('users/login', $data);
        }


      } else {
        // Init data
        $data =[    
          'email' => '',
          'password' => '',
          'email_err' => '',
          'password_err' => '',        
        ];

        // Load view
        $this->view('users/login', $data);
      }
    }

    public function createUserSession($user){
      $_SESSION['user_id'] = $user->id;
      $_SESSION['user_email'] = $user->email;
      $_SESSION['user_name'] = $user->name;
      $_SESSION['user_status']=$user->status;
      if($_SESSION['user_status']=='User')
      redirect('posts');
      if($_SESSION['user_status']=='Admin')
      redirect('admins');

    }

    public function logout(){
      unset($_SESSION['user_id']);
      unset($_SESSION['user_email']);
      unset($_SESSION['user_name']);
      unset($_SESSION['user_status']);
      session_destroy();
      redirect('users/login');
    }
  }