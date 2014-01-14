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
           $tsql="SELECT ID FROM USERS WHERE Username='{$name_hash}' AND Password='{$pass_hash}'";
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
        <style>
form {
    width: 250px;
    padding: 20px;
	margin: 250px auto;
    border: 1px solid #270644;
     
    /*** Adding in CSS3 ***/
 
    /*** Rounded Corners ***/
    -moz-border-radius: 20px;
    -webkit-border-radius: 20px;
 
    /*** Background Gradient - 2 declarations one for Firefox and one for Webkit ***/
    background:  -moz-linear-gradient(19% 75% 90deg,#4E0085, #963AD6);
    background:-webkit-gradient(linear, 0% 0%, 0% 100%, from(#963AD6), to(#4E0085));
 
    /*** Shadow behind the box ***/
    -moz-box-shadow:0px -5px 300px #270644;
    -webkit-box-shadow:0px -5px 300px #270644;
}

input {
    width: 230px;
    background:#fff ;
    padding: 6px;
    margin-bottom: 10px;
    border-top: 1px solid #ad64e0;
    border-left: 0px;
    border-right: 0px;
    border-bottom: 0px;
 
    /*** Adding CSS3 ***/
 
    /*** Transition Selectors - What properties to animate and how long ***/
    -webkit-transition-property: -webkit-box-shadow, background;
    -webkit-transition-duration: 0.25s;
 
    /*** Adding a small shadow ***/
    -moz-box-shadow: 0px 0px 2px #000;
    -webkit-box-shadow: 0px 0px 2px #000;
}

input:hover {
    -webkit-box-shadow: 0px 0px 4px #000;
    background: #808080;
}

input.submit {
    width: 100px;
    color: #fff;
    text-transform: uppercase;
    text-shadow: #000 1px 1px;
    border-top: 1px solid #ad64e0;
    margin-top: 10px;
 
    /*** Adding CSS3 Gradients ***/
    background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#963AD6), to(#781bb9));   
    background:  -moz-linear-gradient(19% 75% 90deg,#781bb9, #963AD6);   
}

</style>
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
