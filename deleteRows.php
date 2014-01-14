<?php
require 'core.inc.php';
require 'connect.inc.php'; 

if(loggedin())
{

$fname=getuserfield('Fname',$conn1);
      echo 'You\'r logged in'.$fname.'<a href="logout.php">Log out</a>';

$tsql="DELETE FROM table".$_SESSION['id'];
$stmt=sqlsrv_query($conn1,$tsql);
$tsql="DELETE FROM table".$_SESSION['id']."bin";
$stmt=sqlsrv_query($conn1,$tsql);
echo $stmt;
header('Location :createSchedule.php');
}
else
  {
      include 'loginform.inc.php';
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