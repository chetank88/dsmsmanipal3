<?php

ob_start();
session_start();    
$current_file=$_SERVER['SCRIPT_NAME'];
if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER']))
   $http_referer=$_SERVER['HTTP_REFERER'];

 error_reporting(E_ALL); 
 ini_set('display_errors',1);

function loggedin()
{
    if(isset($_SESSION['id'])&& !empty($_SESSION['id']))
  {
      return TRUE;
  }
   else
   {
       return FALSE;
   }
}

function getuserfield($field,$conn1)
{

     $tsql="SELECT $field FROM People WHERE uid='".$_SESSION['id']."'";
     try{
         $stmt=sqlsrv_query($conn1,$tsql);
        }
     catch(Exception $e)
     {
         die(print_r($e));
     }
    if($stmt)
    {
        if($result = sqlsrv_fetch_object($stmt))
          return $result->$field;
    }
    else
    {
        echo 'not working34';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
        
    </body>
</html>
