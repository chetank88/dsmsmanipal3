<?php
      require 'core.inc.php';
      require 'connect.inc.php';
      require 'header.php';
       

if(loggedin())
  {
      require 'connect.inc.php';  
 
      $fname=getuserfield('Name',$conn1);
      //echo 'You\'r logged in'.$fname;
  }
  else
  {
       header('Location: index.php');
  }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
        <link rel="stylesheet" type="text/css" href="home.css">

     </head>
<body>

    <?php
    
$date=date("m/d/Y");

   
$tsql="select top 5 * from GMessage order by mid desc";
$stmt=sqlsrv_query($conn1,$tsql);
$obj = sqlsrv_fetch_array( $stmt,SQLSRV_FETCH_NUMERIC);

echo '<div id="gemsg"><h3>PUBLIC NOTICE</h3><br><br>';
if($obj!=NULL)
{
    for($i=0;$i<5;++$i)
     {
       if($obj==NULL) break;

       $tsql1="select Name from People where uid=".$obj[1];
       $stmt1=sqlsrv_query($conn1,$tsql1);
       $obj1 = sqlsrv_fetch_array( $stmt1,SQLSRV_FETCH_NUMERIC);

       echo  '<p>'.$obj[3]->format('m/d/Y').'- '.$obj[2].'-'.$obj1[0].'</p>';
       $obj = sqlsrv_fetch_array( $stmt,SQLSRV_FETCH_NUMERIC);
     }
}
else{
    echo 'No messages yet!';
}
echo '</div>';


$tsql="select top 5 * from Event WHERE edate>="."'".$date."' and ID=".$_SESSION['id']." order by edate asc";
$stmt=sqlsrv_query($conn1,$tsql);
$obj = sqlsrv_fetch_array( $stmt,SQLSRV_FETCH_NUMERIC);

echo '<div id="emsg"><h3>EVENT</h3><br><br>';
if($obj!=NULL)
{
    while(true)
     {
       if($obj==NULL) break;
       echo  '<p >'.$obj[2].' at <u>'.$obj[4].'</u> on '.$obj[3]->format('m/d/Y').' at '.$obj[5]->format('H:i:s').'</p>';
       $obj = sqlsrv_fetch_array( $stmt,SQLSRV_FETCH_NUMERIC);
     }
}
else{
    echo 'No messages yet!';
}
echo '</div>';


$tsql="select top 5 * from Bday WHERE bdate>="."'".$date."' and ID=".$_SESSION['id']." order by bdate asc";
$stmt=sqlsrv_query($conn1,$tsql);
$obj = sqlsrv_fetch_array( $stmt,SQLSRV_FETCH_NUMERIC);

echo '<div id="bmsg"><h3>BIRTHDAYS</h3><br><br>';
if($obj!=NULL)
{
    while(true)
     {
       if($obj==NULL){break;}
       echo  '<p>'.$obj[2].'\'s on '.$obj[3]->format('m/d/Y').'</p>';
       $obj = sqlsrv_fetch_array( $stmt,SQLSRV_FETCH_NUMERIC);
     }
}
else{
    echo 'No messages yet!';
}
echo '</div>';


$tsql="select top 5 * from IMPMSG WHERE RID=".$_SESSION['id']." order by MID desc";
$stmt=sqlsrv_query($conn1,$tsql);
$obj = sqlsrv_fetch_array( $stmt,SQLSRV_FETCH_NUMERIC);

echo '<div id="pmsg"><h3>PERSONAL MESSAGES</h3><br><br>';
if($obj!=NULL)
{

    for($i=0;$i<5;++$i)
     {
       if($obj==NULL) break;
       $tsql1="select Name from People where uid=".$obj[1];
       $stmt1=sqlsrv_query($conn1,$tsql1);
       $obj1 = sqlsrv_fetch_array( $stmt1,SQLSRV_FETCH_NUMERIC);

       echo  '<p>'.$obj[4]->format('m/d/Y').'- '.$obj[3].'-'.$obj1[0].'</p>';
       $obj = sqlsrv_fetch_array( $stmt,SQLSRV_FETCH_NUMERIC);
     }
}
else{
    echo 'No messages yet!';
}
echo '</div>';


$tsql="select top 5 * from Meeting where uid=".$_SESSION['id'].' order by mid desc';
$stmt=sqlsrv_query($conn1,$tsql);
$obj = sqlsrv_fetch_array( $stmt,SQLSRV_FETCH_NUMERIC);

echo '<div id="mmsg"><h3>TODAY\'S MEETINGS</h3><br><br>';
if($obj!=NULL)
{
    while(true)
     {
       if($obj==NULL){break;}
       echo  '<p>'.$obj[2].' -dated '.$obj[3].'</p>';
       $obj = sqlsrv_fetch_array( $stmt,SQLSRV_FETCH_NUMERIC);
     }
}
else{
    echo 'No messages yet!';
}
echo '</div>';

?>
</body>
</html>


