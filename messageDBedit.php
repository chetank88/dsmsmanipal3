<?php

include 'core.inc.php';
include 'connect.inc.php';

error_reporting(E_ALL);
ini_set('dis[play_errors',1);
if($_POST['Mid']>0)
{
   $msg=$_POST['message'];
   $Mid=$_POST['Mid'];
    $mydate=date("Y-m-d H:i:s");
    try{$sql_insert = "UPDATE GMessage SET gmsg=?,gdate=? WHERE MID=?";
    $stmt = $connHar->prepare($sql_insert);
    $stmt->execute(array($msg,$mydate,$Mid,));
   
    }
    catch(Exception $e) {
        
    die(var_dump($e));
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
