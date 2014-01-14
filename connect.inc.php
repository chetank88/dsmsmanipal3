<?php
    // DB connection info
    //TODO: Update the values for $host, $user, $pwd, and $db
    //using the values you retrieved earlier from the portal.
        $server = "tcp:r95l41wqhn.database.windows.net,1433";
		$user = "chetank88";
		$pwd = "COMPUTERK88@";
		$db = "login";
    // Connect to database.
        try
	   {   $connectionInfo = array("UID" =>$user , "PWD" => $pwd, "Database"=>$db);
            $conn=sqlsrv_connect($server, $connectionInfo);
       }
     catch ( Exception $e ) 
     {  print( "Error connecting to SQL Server." );  die(print_r($e));}


    // echo 'Successfully connected to '.$db;echo "<br/>";

      $db2="ComputerScienceDB";

       // Connect to database.
        try
	   { 
           $connectionInfo = array("UID" =>$user , "PWD" => $pwd, "Database"=>$db2);
           $conn1=sqlsrv_connect($server, $connectionInfo);
       }
     catch ( Exception $e ) 
     {  print( "Error connecting to SQL Server." );  die(print_r($e));}
   //  echo 'Successfully connected to '.$db2;echo "<br/>";


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
