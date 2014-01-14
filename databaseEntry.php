<?php
    require 'core.inc.php';
    require 'connect.inc.php'; 

    if(loggedin())
    {

    $fname=getuserfield('Fname',$conn1);
      echo 'You\'r logged in'.$fname.'<a href="logout.php">Log out</a>';


     $v=1;
    function putToDB($m1,$m2,$day)
     {

        require 'connect.inc.php'; 
     $put= array_fill(0, 19, NULL);
     $bst=array_fill(1, 19,'0');
     for($k=1;$k<=19;$k++)
     {
         $put[$k]="'<null>'";
     }

     for($i=1;$i<=$_SESSION[$m1];$i++)
     {
             $nam= $_POST['n'.$GLOBALS['v']++];
             $pos=$_POST['n'.$GLOBALS['v']++];
             $put[$pos]="'".$nam."'";
             $put[$pos+1]="'".$nam."'";
             $bst[$pos]=1;
             $bst[$pos+1]=1;
     }

       for($i=1;$i<=$_SESSION[$m2];$i++)
     {
             $nam= $_POST['n'.$GLOBALS['v']++];
             $pos=$_POST['n'.$GLOBALS['v']++];
             $put[$pos]="'".$nam."'";
             $put[$pos+1]="'".$nam."'";
             $put[$pos+2]="'".$nam."'";
             $put[$pos+3]="'".$nam."'";
             $put[$pos+4]="'".$nam."'";
             $put[$pos+5]="'".$nam."'";

             $bst[$pos]=1;
             $bst[$pos+1]=1;
             $bst[$pos+2]=1;
             $bst[$pos+3]=1;
             $bst[$pos+4]=1;
             $bst[$pos+5]=1;
     }
     $bstr="";
     for($k=1;$k<=19;$k++)
     {
         $bstr=$bstr.$bst[$k];
     }
     echo '<br>';
    /* for($k=1;$k<=19;$k++)
     {
      echo   $put[$k].'&nbsp';
     }*/

     $tsql="INSERT INTO table".$_SESSION['id']."bin VALUES($day,'$bstr')";
     $stmt=$stmt =sqlsrv_query($conn1,$tsql,array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));

      if( $stmt === false )
          {
            echo "Error in query preparation/execution.\n";
            die( print_r( sqlsrv_errors(), true));
          }
          else 
          {
              echo "Successfully inserted";
          }

     $tsql="INSERT INTO table".$_SESSION['id']." VALUES($day,$put[1],$put[2],$put[3],$put[4],$put[5],$put[6],$put[7],$put[8],$put[9],$put[10],$put[11],$put[12],$put[13],$put[14],$put[15],$put[16],$put[17],$put[18],$put[19])";
           $stmt =sqlsrv_query($conn1,$tsql,array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));
           if( $stmt === false )
          {
            echo "Error in query preparation/execution.\n";
            die( print_r( sqlsrv_errors(), true));
          }
          else 
          {
              echo "Successfully inserted";
          }

     }

     
     putToDB('m1','m2',1);
     putToDB('m3','m4',2);
     putToDB('m5','m6',3);
     putToDB('m7','m8',4);
     putToDB('m9','m10',5);
     putToDB('m11','m12',6);

     
     header('Location:timetable.php');
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
