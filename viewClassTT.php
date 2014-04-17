<?php
require 'core.inc.php';
require 'connect.inc.php'; 
require 'header.php';

if(!loggedin())
{
    header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
        Choose a class:
        <form name="input" action="viewClassTT.php" method="post">
         <select   name="className" id="className">

            <?php
                $tsql="SELECT * FROM classList";
                $stmt=sqlsrv_query($conn1,$tsql);
                 $sec=array();
                 $i=0;
                 if($stmt!=NULL)
                {
                    $obj = sqlsrv_fetch_array( $stmt,SQLSRV_FETCH_NUMERIC);
                    while(true)
                    {
                         if($obj==NULL)break;
                         echo $obj[1]."<br>";
                         $sec[$i++]=$obj[1];
                         
		                  echo '<option value="'.$obj[1].'">'.$obj[1].'</option>';
                         
                         $obj = sqlsrv_fetch_array( $stmt,SQLSRV_FETCH_NUMERIC);
                    }  

                }
          
          ?>
         </select>
            <input type="submit" value="Submit">
            </form>

    </body>
</html>

<?php
    
if(isset($_POST['className']))
{
$tsql="SELECT * FROM ".$_POST['className'];
$stmt=sqlsrv_query($conn1,$tsql);


if($stmt!=NULL)
{
 $obj = sqlsrv_fetch_array( $stmt,SQLSRV_FETCH_NUMERIC);
echo '<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
         <link rel="stylesheet" type="text/css" href="timetable.css">


    </head>
    <body>
             <br><br><br>
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
                     <th>Monday</th>';
            if($obj[2]===$obj[5]&& $obj[5]!='<null>')
            {
              echo '<td align="center" colspan="4">'.$obj[2].'</td>
					<td>'.$obj[8].'</td>
                     <td>break</td>
					 <td>'.$obj[11].'</td>
					 <td>'.$obj[13].'</td>
					 <td>'.$obj[15].'</td>
					 <td>'.$obj[16].'</td>
					 <td>'.$obj[18].'</td>
                </tr>';
                
            }
        else if($obj[13]===$obj[15] && $obj[13]!='<null>')
            {
              echo  '<td>'.$obj[2].'</td>
					 <td>'.$obj[3].'</td>
					 <td>'.$obj[5].'</td>
					 <td>'.$obj[6].'</td>
					 <td>'.$obj[8].'</td>
                     <td>break</td>
					 <td>'.$obj[11].'</td>
					 <td align="center" colspan="4">'.$obj[15].'</td>
                </tr>';
                
            }
            else
            {
			echo    '<td>'.$obj[2].'</td>
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
            }
$obj = sqlsrv_fetch_array( $stmt,SQLSRV_FETCH_NUMERIC);
				echo '<tr>
                     <th>Tuesday</th>';
		  if($obj[2]===$obj[5]&& $obj[5]!='<null>')
            {
              echo '<td align="center" colspan="4">'.$obj[2].'</td>
					<td>'.$obj[8].'</td>
                     <td>break</td>
					 <td>'.$obj[11].'</td>
					 <td>'.$obj[13].'</td>
					 <td>'.$obj[15].'</td>
					 <td>'.$obj[16].'</td>
					 <td>'.$obj[18].'</td>
                </tr>';
                
            }
        else if($obj[13]===$obj[15] && $obj[13]!='<null>')
            {
              echo  '<td>'.$obj[2].'</td>
					 <td>'.$obj[3].'</td>
					 <td>'.$obj[5].'</td>
					 <td>'.$obj[6].'</td>
					 <td>'.$obj[8].'</td>
                     <td>break</td>
					 <td>'.$obj[11].'</td>
					 <td align="center" colspan="4">'.$obj[15].'</td>
                </tr>';
                
            }
            else
            {
			echo    '<td>'.$obj[2].'</td>
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
            }
$obj = sqlsrv_fetch_array( $stmt,SQLSRV_FETCH_NUMERIC);
		  echo	'<tr>
                     <th>Wednesday</th>';
					 if($obj[2]===$obj[5]&& $obj[5]!='<null>')
            {
              echo '<td align="center" colspan="4">'.$obj[2].'</td>
					<td>'.$obj[8].'</td>
                     <td>break</td>
					 <td>'.$obj[11].'</td>
					 <td>'.$obj[13].'</td>
					 <td>'.$obj[15].'</td>
					 <td>'.$obj[16].'</td>
					 <td>'.$obj[18].'</td>
                </tr>';
                
            }
        else if($obj[13]===$obj[15] && $obj[13]!='<null>')
            {
              echo  '<td>'.$obj[2].'</td>
					 <td>'.$obj[3].'</td>
					 <td>'.$obj[5].'</td>
					 <td>'.$obj[6].'</td>
					 <td>'.$obj[8].'</td>
                     <td>break</td>
					 <td>'.$obj[11].'</td>
					 <td align="center" colspan="4">'.$obj[15].'</td>
                </tr>';
                
            }
            else
            {
			echo    '<td>'.$obj[2].'</td>
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
            }
$obj = sqlsrv_fetch_array( $stmt,SQLSRV_FETCH_NUMERIC);

			echo '<tr>
                     <th>Thursday</th>';
					 if($obj[2]===$obj[5]&& $obj[5]!='<null>')
            {
              echo '<td align="center" colspan="4">'.$obj[2].'</td>
					<td>'.$obj[8].'</td>
                     <td>break</td>
					 <td>'.$obj[11].'</td>
					 <td>'.$obj[13].'</td>
					 <td>'.$obj[15].'</td>
					 <td>'.$obj[16].'</td>
					 <td>'.$obj[18].'</td>
                </tr>';
                
            }
        else if($obj[13]===$obj[15] && $obj[13]!='<null>')
            {
              echo  '<td>'.$obj[2].'</td>
					 <td>'.$obj[3].'</td>
					 <td>'.$obj[5].'</td>
					 <td>'.$obj[6].'</td>
					 <td>'.$obj[8].'</td>
                     <td>break</td>
					 <td>'.$obj[11].'</td>
					 <td align="center" colspan="4">'.$obj[15].'</td>
                </tr>';
                
            }
            else
            {
			echo    '<td>'.$obj[2].'</td>
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
            }
$obj = sqlsrv_fetch_array( $stmt,SQLSRV_FETCH_NUMERIC);

			echo '<tr>
                     <th>Friday</th>';
					if($obj[2]===$obj[5]&& $obj[5]!='<null>')
            {
              echo '<td align="center" colspan="4">'.$obj[2].'</td>
					<td>'.$obj[8].'</td>
                     <td>break</td>
					 <td>'.$obj[11].'</td>
					 <td>'.$obj[13].'</td>
					 <td>'.$obj[15].'</td>
					 <td>'.$obj[16].'</td>
					 <td>'.$obj[18].'</td>
                </tr>';
                
            }
        else if($obj[13]===$obj[15] && $obj[13]!='<null>')
            {
              echo  '<td>'.$obj[2].'</td>
					 <td>'.$obj[3].'</td>
					 <td>'.$obj[5].'</td>
					 <td>'.$obj[6].'</td>
					 <td>'.$obj[8].'</td>
                     <td>break</td>
					 <td>'.$obj[11].'</td>
					 <td align="center" colspan="4">'.$obj[15].'</td>
                </tr>';
                
            }
            else
            {
			echo    '<td>'.$obj[2].'</td>
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
            }
$obj = sqlsrv_fetch_array( $stmt,SQLSRV_FETCH_NUMERIC);

			echo '<tr>
                     <th>Saturday</th>';
					 if($obj[2]===$obj[5]&& $obj[5]!='<null>')
            {
              echo '<td align="center" colspan="4">'.$obj[2].'</td>
					<td>'.$obj[8].'</td>
                     <td>break</td>
					 <td>'.$obj[11].'</td>
					 <td>'.$obj[13].'</td>
					 <td>'.$obj[15].'</td>
					 <td>'.$obj[16].'</td>
					 <td>'.$obj[18].'</td>
                </tr>';
                
            }
        else if($obj[13]===$obj[15] && $obj[13]!='<null>')
            {
              echo  '<td>'.$obj[2].'</td>
					 <td>'.$obj[3].'</td>
					 <td>'.$obj[5].'</td>
					 <td>'.$obj[6].'</td>
					 <td>'.$obj[8].'</td>
                     <td>break</td>
					 <td>'.$obj[11].'</td>
					 <td align="center" colspan="4">'.$obj[15].'</td>
                </tr>';
                
            }
            else
            {
			echo    '<td>'.$obj[2].'</td>
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
              }
       echo '</table>
    </body>
</html>';

 $_SESSION['className']=$_POST['className'];
   /*echo  '<form name="input" action="deleteRows.php" method="post">
          <input type="submit" value="Edit">
          </form>';*/
}    
}

?>
