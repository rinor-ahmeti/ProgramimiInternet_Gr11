<?php
 
  class Controller {
    //LOAD MODEL
    public function model($model){
      //REQUIRE MODEL FILE 
      require_once '../app/models/' . $model . '.php';

      // INSTATIATE MODEL
      return new $model();
    }

    //LOAD VIEW WITH OPTIONAL DATA PARAM
    public function view($view, $data = []){
      //CHECK IF VIEW EXISTS
      if(file_exists('../app/views/' . $view . '.php')){
        require_once '../app/views/' . $view . '.php';
      } else {
        // VIEW DOES NOT EXIST
        die('View does not exist');
      }
    }
  }