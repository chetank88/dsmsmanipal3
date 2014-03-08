<?php
 include 'core.inc.php';
 include 'connect.inc.php'; 
 require 'header.php';
 include 'pdfgen.php';

 if(!loggedin())
  {
      header('Location: index.php');
  }
    $uid=$_SESSION['id'];
     function do_alert($msg) 
    {
        echo '<script type="text/javascript">alert("' . $msg . '"); </script>';
    }
    function savef($tsum,$mid)
    {include 'connect.inc.php'; 
          try {
    // Insert data
              $sql_insert = "UPDATE Meeting
                             SET sum='{$tsum}'
                             WHERE mid={$mid};";

              $stmt = $connHar->query($sql_insert);
           
                  }
      catch(Exception $e){
                    die(print_r($e));
                 }
        
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
        <style>
           form h1
            {
                color: #09C;
                
           
            }
            form
            {
                left: 60px;
                position: absolute;
                top:250px; 
            }
            #text
            {
                width:1200px;
                height: 500px;
               
            }
             textarea {
display:block;
}
 textarea:focus, input:focus {
border: 1px solid #09C;
}
input.button{
width:auto;
position:relative;
float:right;
background:#09C;
color:#fff;
font-family: Tahoma, Geneva, sans-serif;
height:30px;
-webkit-border-radius: 15px;
-moz-border-radius: 15px;
border-radius: 15px;
border: 1p solid #999;

}
input.button:hover {
background:#fff;
color:#09C;
}
  #h1
            {
                 left: 60px;
                position: absolute;
                top:250px;   color: #09C
            }
        </style>
    </head>
    <body>
        <?php
         if(isset($_GET['mid']))
  {
        $unsecure = substr($_GET['mid'], 3);
                $unsecure = base64_decode($unsecure);
      $sql_select="select sum from Meeting  where mid='{$unsecure}'";
       
          //echo $sql_select;
             $stmt=$connHar->query($sql_select);
             $registrants=$stmt->fetchAll();
            foreach($registrants as $registrant) {
              
               $txt= $registrant['sum'];
            }
           
       
        echo "<form method='post' action='http://dsmsmanipal3.azurewebsites.net/summary.php#'>
            <h1>Summary of The Meeting:</h1>
                <input class='button' name='save' type='submit' value='Save'>
            <input class='button' name='cm' type='submit' value='Complete The Meeting'>
            
            <br>   <br>
            <textarea id='text'  name='tsum' required autofocus>$txt</textarea>
             <input type='hidden' name='mid' value= {$unsecure}>
        </form>";
  }
      
             if(isset($_POST['mid']))
             {
                
                 
                 
                   if(isset($_POST['save']))
                   {
                     savef($_POST['tsum'],$_POST['mid']);
                        echo "<h1 id='h1'> Summary Saved..!</h1> ";
                   }
          if(isset($_POST['cm']))
           {


                        
               $sql_select="select attendence from Meeting_Att,People where mid='{$_POST['mid']}' and uid=attid";
        
          //echo $sql_select;
             $stmt=$connHar->query($sql_select);
             $registrants=$stmt->fetchAll();
             $flag=0;
            foreach($registrants as $registrant) {
              
                if(!isset($registrant['attendence']))
                $flag=1;
            }
            if($flag==0)
                    {
                         savef($_POST['tsum'],$_POST['mid']);
                        pdfgenerator($_POST['mid'],$uid);
                         try {
    // Insert data
              $sql_insert = "Delete From Meeting
                             WHERE mid={$_POST['mid']};";

              $stmt =$connHar->exec( $sql_insert);
              echo $stmt;
               $sql_insert1 = "Delete From Meeting_Att
                             WHERE mid={$_POST['mid']};";

              $stmt =$connHar->exec( $sql_insert1);
                   echo $stmt;
           
                  }
      catch(Exception $e){
                    die(print_r($e));
                 }


                    }
                    else
                    {
                     do_alert("Mark the attendence First then Complete The meeting");
                        savef($_POST['tsum'],$_POST['mid']);
                           echo "<h1 id='h1'> Summary Saved..!</h1> ";
                    }
            }
                
         }
         ?>
    </body>
</html>
