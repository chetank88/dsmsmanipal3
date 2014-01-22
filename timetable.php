<?php
require 'core.inc.php';
require 'connect.inc.php'; 

if(loggedin())
{

$fname=getuserfield('Name',$conn1);
      echo 'You\'r logged in'.$fname;

$tsql="SELECT * FROM table".$_SESSION['id'];
$stmt=sqlsrv_query($conn1,$tsql);

$obj = sqlsrv_fetch_array( $stmt,SQLSRV_FETCH_NUMERIC);
if($obj!=NULL)
{

echo '<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
         <link rel="stylesheet" type="text/css" href="timetable.css">


    </head>
    <body>
    <div>
<span></span>
<link href="logout.css" rel="stylesheet" type="text/css"></link>
<a href="logout.php">Log out</a></div>	
</div>
              <table id="customers" border="1">
                <tr>
				    <th></th>
                    <th>8.00-9.00</th>
                    <th>9.00-10.00</th>
                    <th>10.00-10.30</th>
                    <th>10.30-11.30</th>
                    <th>11.30-12.30</th>
					<th>12.30-1.00</th>
                    <th>1.00-2.00</th>
                    <th>2.00-3.00</th>
                    <th>3.00-3.30</th>
                    <th>3.30-4.30</th>
                    <th>4.30-5.30</th>
                 </tr>
                 <tr>
                     <th>Monday</th>
					 <td>'.$obj[2].'</td>
					 <td>'.$obj[3].'</td>
					 <td>'.$obj[5].'</td>
					 <td>'.$obj[6].'</td>
					 <td>'.$obj[8].'</td>
					 <td>break</td>
					 <td>'.$obj[11].'</td>
					 <td>'.$obj[13].'</td>
					 <td>'.$obj[15].'</td>
					 <td>'.$obj[16].'</td>
					 <td>'.$obj[18].'</td>
                </tr>';
$obj = sqlsrv_fetch_array( $stmt,SQLSRV_FETCH_NUMERIC);
				echo '<tr>
                     <th>Tuesday</th>
					 <td>'.$obj[2].'</td>
					 <td>'.$obj[3].'</td>
					 <td>'.$obj[5].'</td>
					 <td>'.$obj[6].'</td>
					 <td>'.$obj[8].'</td>
					 <td>break</td>
					 <td>'.$obj[11].'</td>
					 <td>'.$obj[13].'</td>
					 <td>'.$obj[15].'</td>
					 <td>'.$obj[16].'</td>
					 <td>'.$obj[18].'</td>
                </tr>';
$obj = sqlsrv_fetch_array( $stmt,SQLSRV_FETCH_NUMERIC);
		  echo	'<tr>
                     <th>Wednesday</th>
					 <td>'.$obj[2].'</td>
					 <td>'.$obj[3].'</td>
					 <td>'.$obj[5].'</td>
					 <td>'.$obj[6].'</td>
					 <td>'.$obj[8].'</td>
					 <td>break</td>
					 <td>'.$obj[11].'</td>
					 <td>'.$obj[13].'</td>
					 <td>'.$obj[15].'</td>
					 <td>'.$obj[16].'</td>
					 <td>'.$obj[18].'</td>
                </tr>';
$obj = sqlsrv_fetch_array( $stmt,SQLSRV_FETCH_NUMERIC);

			echo '<tr>
                     <th>Thursday</th>
					 <td>'.$obj[2].'</td>
					 <td>'.$obj[3].'</td>
					 <td>'.$obj[5].'</td>
					 <td>'.$obj[6].'</td>
					 <td>'.$obj[8].'</td>
					 <td>break</td>
					 <td>'.$obj[11].'</td>
					 <td>'.$obj[13].'</td>
					 <td>'.$obj[15].'</td>
					 <td>'.$obj[16].'</td>
					 <td>'.$obj[18].'</td>
                </tr>';
$obj = sqlsrv_fetch_array( $stmt,SQLSRV_FETCH_NUMERIC);

			echo '<tr>
                     <th>Friday</th>
					 <td>'.$obj[2].'</td>
					 <td>'.$obj[3].'</td>
					 <td>'.$obj[5].'</td>
					 <td>'.$obj[6].'</td>
					 <td>'.$obj[8].'</td>
					 <td>break</td>
					 <td>'.$obj[11].'</td>
					 <td>'.$obj[13].'</td>
					 <td>'.$obj[15].'</td>
					 <td>'.$obj[16].'</td>
					 <td>'.$obj[18].'</td>
                </tr>';
$obj = sqlsrv_fetch_array( $stmt,SQLSRV_FETCH_NUMERIC);

			echo '<tr>
                     <th>Saturday</th>
					 <td>'.$obj[2].'</td>
					 <td>'.$obj[3].'</td>
					 <td>'.$obj[5].'</td>
					 <td>'.$obj[6].'</td>
					 <td>'.$obj[8].'</td>
					 <td>break</td>
					 <td>'.$obj[11].'</td>
					 <td>'.$obj[13].'</td>
					 <td>'.$obj[15].'</td>
					 <td>'.$obj[16].'</td>
					 <td>'.$obj[18].'</td>
                </tr>
               </table>
    </body>
</html>';

   echo  '<form name="input" action="deleteRows.php" method="post">
          <input type="submit" value="Edit">
          </form>';
}
else
{
    echo '<br>Not yet created<br>';
    echo '<form name="input" action="createSchedule.php" method="post">
          <input type="submit" value="Create schedule">
          </form>';
}
}
else
  {
       header('Location: index.php');
  }
?>
