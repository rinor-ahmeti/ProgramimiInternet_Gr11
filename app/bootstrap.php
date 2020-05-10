<?php
  // Load Config
  try {
  
    require_once 'config/config.php';
    // Load Helpers
    require_once 'helpers/url_helper.php';
    require_once 'helpers/session_helper.php';
    require_once 'helpers/default_helpers.php';
  
    // Autoload Core Libraries
    spl_autoload_register(function($className){
      require_once 'libraries/' . $className . '.php';
    });
    
  

    //code...
  } catch (\Throwable $th) {
   echo $th;
  }
  