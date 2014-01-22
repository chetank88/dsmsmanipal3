<?php
      require 'core.inc.php';
      require 'connect.inc.php'; 

if(loggedin())
  {
      require 'connect.inc.php';  
 
      $fname=getuserfield('Name',$conn1);
      echo 'You\'r logged in'.$fname;
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
        <link rel="stylesheet" type="text/css" href="schedule.css">
        <link href="logout.css" rel="stylesheet" type="text/css"></link>
     </head>
<body>

<div>
    <span></span>
<a href="logout.php">Log out</a></div>	
</div>

<div id="navcon">
<div id="nav">
    <ul>
        <li class="first"><a href="#">Schedule</a>
        <ul>
            <li class="top"><a href="createSchedule.php">Create Schedule</a></li>
            <li><a href="timetable.php">View Schedule</a></li>
        </ul>
        </li>
          <li class="first"><a href="meeting.php">Meeting</a>
        </li>
    </ul>
</div>
</div>
    <?php
    
$date=date("m/d/Y");

   
$tsql="select top 5 * from GMessage order by mid desc";
$stmt=sqlsrv_query($conn1,$tsql);
$obj = sqlsrv_fetch_array( $stmt,SQLSRV_FETCH_NUMERIC);

echo '<div id="gemsg"><u>GENERAL NOTICE</u><br><br>';
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


$tsql="select top 5 * from Event WHERE edate>="."'".$date."' and ID=".$_SESSION['id'];
$stmt=sqlsrv_query($conn1,$tsql);
$obj = sqlsrv_fetch_array( $stmt,SQLSRV_FETCH_NUMERIC);

echo '<div id="emsg"><u>EVENT</u><br><br>';
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


$tsql="select top 5 * from Bday WHERE bdate>="."'".$date."' and ID=".$_SESSION['id'];
$stmt=sqlsrv_query($conn1,$tsql);
$obj = sqlsrv_fetch_array( $stmt,SQLSRV_FETCH_NUMERIC);

echo '<div id="bmsg"><u>BIRTHDAYS</u><br><br>';
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

echo '<div id="pmsg"><u>PERSONAL MESSAGES</u><br><br>';
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

/*
$tsql="select top 5 * from Notes where ID=".$_SESSION['id'].' order by mid desc';
$stmt=sqlsrv_query($conn1,$tsql);
$obj = sqlsrv_fetch_array( $stmt,SQLSRV_FETCH_NUMERIC);

echo '<div id="msg"><u>Meetings</u><br><br>';
if($obj!=NULL)
{
    while(true)
     {
       if($obj==NULL){break;}
       echo  '<p>'.$obj[2].' -dated '.$obj[3]->format('m/d/Y').'</p>';
       $obj = sqlsrv_fetch_array( $stmt,SQLSRV_FETCH_NUMERIC);
     }
}
else{
    echo 'No messages yet!';
}
echo '</div>';
*/
$tsql="select * from Bday WHERE bdate="."'".$date."'";
$stmt=sqlsrv_query($conn1,$tsql);
$obj = sqlsrv_fetch_array( $stmt,SQLSRV_FETCH_NUMERIC);

if($obj!=NULL)
{
    while(true)
     {
       if($obj==NULL){break;}
        $tsql1="select Name,Email from People WHERE uid=".$obj[1];
        $stmt1=sqlsrv_query($conn1,$tsql1);
        $obj1=sqlsrv_fetch_array( $stmt1,SQLSRV_FETCH_NUMERIC);

       echo $msg="Today is ".$obj[2].'\'s birthday.';
       echo $to=$obj1[1];
       $obj = sqlsrv_fetch_array( $stmt,SQLSRV_FETCH_NUMERIC);
     }
}

?>
</body>
</html>


