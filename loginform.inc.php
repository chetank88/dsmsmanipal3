<?php
 error_reporting(E_ALL); 
  ini_set('display_errors',1);   
 if(isset($_POST['username'])&&isset($_POST['password']))
 {
     $username=$_POST['username'];
     $password=$_POST['password'];
     $name_hash=md5($username);
     $pass_hash=md5($password);
     if(!empty($username)&&!empty($password))
     {
         try
         {
           $tsql="SELECT ID,Department FROM USERS WHERE Username='{$name_hash}' AND Password='{$pass_hash}'";
           $stmt =sqlsrv_query($connLG,$tsql,array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));
           if( $stmt === false )
        {
            echo "Error in query preparation/execution.\n";
            die( print_r( sqlsrv_errors(), true));
        }

           //$periods=$stmt->fetchAll();
           //$num=count($periods);
           $num=sqlsrv_num_rows($stmt);
            if($num==0)
              echo 'Invalid username or password';
             else if($num==1)
                {
                  echo 'Logged in Successfully';
                 
                      $obj=sqlsrv_fetch_object($stmt);
                      $_SESSION['id']=$obj->ID;
                      $_SESSION['dpdb']=$obj->Department;
                    header('Location: index.php');
                  //echo $name = sqlsrv_get_field( $stmt, 0);
                
                }
         }
        catch(Exception $e)
        {
            die(print_r($e));
        }
      }
     else
     {
         echo 'Enter usename and password';
     }
  
 }

?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
        <link rel="stylesheet" type="text/css" href="loginform.inc.css">

    </head>
    <body>
        <form action="<?php echo $current_file; ?>" method="post">
        <label>Username:</label>
            <input type="text" name="username" />
        <label>Password:</label>
            <input type="password" name="password"  />
            <input type="submit" value="Log in" name="submit" class="submit" />
       </form> 
    </body>
</html>
