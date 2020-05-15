<?php

class Admins extends Controller{
public function __construct()
{
  if(!isLoggedIn()){
    redirect('users/login');
  }

  if($_SESSION['user_status']=='User')
redirect('posts');



    $this->adminModel = $this->model('Admin');
    $this->userModel=$this->model('User');

}


public function index()
{
    $users = $this->adminModel->getUsers();

   $data=[

    'users'=>$users

   ];

    $this->view('admins/index',$data);

}



function add()
{
      // POST METHOD CHECKER
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
  
        // SANITIZING THE DATA
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Init data
        $data =[
          'name' => trim($_POST['name']),
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),
          
          'name_err' => '',
          'email_err' => '',
          'password_err' => '',
         
        ];

        // EMAIL VALIDATION
        if(empty($data['email'])){
          $data['email_err'] = 'Pleae enter email';
        } else {
          // CHECKIN EMAIL WHETHER IT IS TAKEN
          if($this->userModel->findUserByEmail($data['email'])){
            $data['email_err'] = 'Email is already taken';
          }
        }

        // NAME VALIDATION
        if(empty($data['name'])){
          $data['name_err'] = 'Please enter name';
        }

        // PASSWORD VALIDATION
        if(empty($data['password'])){
          $data['password_err'] = 'Please enter your password';
        } elseif(!validatePassword($data['password'])){
          $data['password_err'] = 'Password must contain at least 1 uppercase character, a number,1 lowercase character and it must be longer than 8 characters';
        }

        // Validate Confirm Password
       
        // Make sure errors are empty
        if(empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) ){
          // Validated
          
          // HASHING PASSWORD
          $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);

          // REGISTER USER
          if($this->adminModel->addUser($data)){
          
            redirect('admins/index');
          } else {
            die('Something went wrong');
          }

        } else {
          // Load view with errors
          $this->view('admins/add', $data);
        }

      } else {
        // Init data
        $data =[
          'name' => '',
          'email' => '',
          'password' => '',
          'name_err' => '',
          'email_err' => '',
          'password_err' => '',
        ];

        // LOADING VIEWS
        $this->view('admins/add', $data);
      }
}

 public function edit($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST array
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'id' => $id,
          'name'=>$_POST['name'],
          'email' => trim($_POST['email']),
          'password' => password_hash(trim($_POST['password']),PASSWORD_BCRYPT),
            'name_err'=>'',
            'email_err'=>'',
            'password_err'=>''
        ];

        // Validate data
        if(empty($data['name'])){
          $data['name_err'] = 'Please enter name';
        }
        if(empty($data['email'])){
          $data['email_err'] = 'Please enter email';
        }
        if(empty($data['password'])){
          $data['password_err'] = 'Please enter password';
        }

        if(!validatePassword($_POST['password']))
        {
          $data['password_err']='Passwordi juaj nuk i ploteson kriteret!';
          $data['password']='';
        }



        // Make sure no errors
        if(empty($data['name_err']) && empty($data['email_err'])&& empty($data['password_err'])){
          // Validated
          if($this->adminModel->updateUser($data)){
        
            redirect('admins/index');
          } else {
            die('Something went wrong');
          }
        } else {
          // Load view with errors
          $this->view('admins/edit', $data);
        }

      } else {
        // Get existing post from model
        $admin = $this->adminModel->getUserById($id);

    
        $data = [
          'id' => $id,
          'name' => $admin->name,
          'email' => $admin->email,
          'password'=>''
        ];
  
        $this->view('admins/edit', $data);
      }
    }



    public function delete($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Get existing post from model
        $user = $this->adminModel->getuserById($id);
      }
        
        // Check for owner
        if(!$_SESSION['user_status']=='Admin'){
          redirect('index');
        }

        if($this->adminModel->deleteUser($id)){
          redirect('admins');
        } else {
          die('Something went wrong in deleting. Try again.');
        }
      
      
    }
  }

?>