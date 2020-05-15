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

        //INIT DATA
        $data =[
          'name' => trim($_POST['name']),
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),
          
          'name_err' => '',
          'email_err' => '',
          'password_err' => '',
         
        ];

        // VALIDATION OF EMAIL
        if(empty($data['email'])){
          $data['email_err'] = 'Pleae enter email';
        } else {
          // CHECKIN EMAIL IF ITS TAKEN
          if($this->userModel->findUserByEmail($data['email'])){
            $data['email_err'] = 'Email is already taken';
          }
        }

        // VALIDATION OF NAME
        if(empty($data['name'])){
          $data['name_err'] = 'Please enter name';
        }

        // VALIDATION OF PASSWORD
        if(empty($data['password'])){
          $data['password_err'] = 'Please enter your password';
        } elseif(!validatePassword($data['password'])){
          $data['password_err'] = 'Password must contain at least 1 uppercase character, a number,1 lowercase character and it must be longer than 8 characters';
        }

        //VALIDATE CONFIRM PASSWORD
       
        //MAKE SURE ERRORS ARE EMPTY 
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
          //LOAD VIEW WITH ERRORS
          $this->view('admins/add', $data);
        }

      } else {
        //DATA INIT
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
        // SANITAZE POST ARRAY
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

        // VALIDATE DATA
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



        // MAKE SURE THERE ARE NO ERRORS
        if(empty($data['name_err']) && empty($data['email_err'])&& empty($data['password_err'])){
          // VALIDATED
          if($this->adminModel->updateUser($data)){
        
            redirect('admins/index');
          } else {
            die('Something went wrong');
          }
        } else {
          //LOAD VIEW WITH ERRORS
          $this->view('admins/edit', $data);
        }

      } else {
        //GET EXISTING POST FROM MODEL 
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
        // GET EXISTING POST FROM MODEL
        $user = $this->adminModel->getuserById($id);
      }
        
        // CHECK IS THERE IS OWNER
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