<?php
  
  require 'connect.inc.php';  
  require 'core.inc.php'; 
  
  if(loggedin())
  {
      header('Location :schedule.php');
  }
  else
  {
      include 'loginform.inc.php';
  }

  error_reporting(E_ALL); 
  ini_set('display_errors',1);
  //header('Content-type: text/plain'); 

?>