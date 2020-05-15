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
      // CHECK FOR POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //PROCESS FORM
        //SANITIZE POST DATA
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        //INIT DATA
        $data =[
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),
          'email_err' => '',
          'password_err' => '',      
        ];

        //VALIDATE EMAIL
        if(empty($data['email'])){
          $data['email_err'] = 'Please enter email';
        }

        //VALIDATE PASSWORD
        if(empty($data['password'])){
          $data['password_err'] = 'Please enter password';
        }

        if(!validateEmail($data['email'])){
          $data['email_err']='Invalid Email';
        }

        //CHECK FOR USER/EMAIL
        if($this->userModel->findUserByEmail($data['email'])){
          //USER FOUND
        } else {
          //USER NOT FOUND
          $data['email_err'] = 'Invalid Credentials';
        }

        //MAKE SURE ERRORS ARE EMPTY
        if(empty($data['email_err']) && empty($data['password_err'])){
          //VALIDATED
          //CHECK AND SET LOGGED IN USER
          $loggedInUser = $this->userModel->login($data['email'], $data['password']);

          if($loggedInUser){
            //CREATE SESSION
            $this->createUserSession($loggedInUser);
          } else {
            $data['password_err'] = 'Password incorrect';

            $this->view('users/login', $data);
          }
        } else {
          //LOAD VIEW WITH ERRORS
          $this->view('users/login', $data);
        }


      } else {
        //INIT DATA
        $data =[    
          'email' => '',
          'password' => '',
          'email_err' => '',
          'password_err' => '',        
        ];

        //LOAD VIEW
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