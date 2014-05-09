<?php
  
     
     include 'core.inc.php';
      require 'header.php';
  if(!loggedin())
  {
      header('Location: index.inc.php');
  }
  $uid=$_SESSION['id'];
    include 'connect.inc.php'; 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
                <link rel="stylesheet" type="text/css" href="details.css">
    </head>
    <body>
                 
        <?php
            $secure=$_GET['mid'];
          echo "     <ul class='buttonmenu'>
        <li><a href='atten.php?mid={$secure}&s=y'><input  type='submit' class='button' name='butt[]' value='Attendence'/></a></li>
                <li><a href='Summary.php?mid={$secure}&s=y'><input  type='submit' class='button' name='butt[]' value='Summary'/></a></li>
                 <li><a href='Cancel.php?mid={$secure}&s=y'><input  type='submit' class='button' name='butt[]' value='Cancel'/></a></li>
                  <li><a href='Postpone.php?mid={$secure}&s=y'><input  type='submit' class='button' name='butt[]' value='Postpone'/></a></li>
                   <li><a href='Message.php?mid={$secure}&s=y'><input  type='submit' class='button' name='butt[]' value='Message'/></a></li>
        </ul>";
          $unsecure = substr($_GET['mid'], 3);
                $unsecure = base64_decode($unsecure);
        $sql_select="select * from Meeting,Meeting_Att,People where Meeting.mid={$unsecure} and Meeting.mid=Meeting_Att.mid and Meeting_Att.attid=People.uid and Meeting.uid='{$uid}' ";
        try{
     $stmt=$connHar->query($sql_select);
   
     $registrants=$stmt->fetchAll();
        } catch(Exception $e){
                    die(print_r($e));
                 }
                 
              if(count($registrants) > 0) {
                  $flag=0;
    foreach($registrants as $registrant) {
        if(!$flag)
 echo "
                <h1>Meeting ID</h1>          
                <td>{$registrant['mid']}</td><br>
                <h1>Tytle</h2>
            <td>{$registrant['tytle']}</td><br>
                <h1>Info</h1>
            <td>{$registrant['otherinfo']}</td><br>
                 <h1>Date:</h1>
            <td>{$registrant['date']}</td><br>
                 <h1>Time</h1>
            <td>{$registrant['time']}</td><br>
       
        <h1>Name of Attendees And Designation</h1>
   <ol>
    ";$flag=1;
    echo"
           
            <li>{$registrant['Name']}<br> 
            {$registrant['Designation']}</li><br>";

    }
    echo "</ol>";
    }
             ?>

        
        
      
    </body>
</html>
