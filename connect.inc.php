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
            $connLG=sqlsrv_connect($server, $connectionInfo);
       }
     catch ( Exception $e ) 
     {  print( "Error connecting to SQL Server." );  die(print_r($e));}


    // echo 'Successfully connected to '.$db;echo "<br/>";
                $host = "tcp:pf9xx4rmq4.database.windows.net,1433";
                $user = "harsha";
                $pwd = "khv9440385189@";
                $db2="Computer_SC_and_Engg";

       // Connect to database.
        try
	   { 
           $connectionInfo = array("UID" =>$user , "PWD" => $pwd, "Database"=>$db2);
           $conn1=sqlsrv_connect($host, $connectionInfo);
       }
     catch ( Exception $e ) 
     {  print( "Error connecting to SQL Server." );  die(print_r($e));}
   //  echo 'Successfully connected to '.$db2;echo "<br/>";


                
                $db = "Computer_SC_and_Engg";
                try{
                   $connHar = new PDO( "sqlsrv:Server= $host ; Database = $db ", $user, $pwd);
                   $connHar->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
                }
                catch(Exception $e){
                    die(print_r($e));
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
