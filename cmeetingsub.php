<!DOCTYPE html>
<html>
<head>
     <link rel="stylesheet" type="text/css" href="cmeetingsub.css">
    <SCRIPT type="text/javascript">
    window.history.forward();
    function noBack() { window.history.forward(); }
</SCRIPT>
</head>

<body onload="noBack();"  onunload="">
    <ul id="menu">
<li><a href="#">Meeting</a>
    <ul class="submenu">
        <li><a href="cmeeting.php">Create Meeting</a></li>
        <li><a href="smeeting.php">See Meetings</a></li>
    </ul>
</li>
</ul>
  <?php


      $uid=7000;
if(isset($_POST["submit"]) && $_POST["submit"]!="") 
{
$usersCount = count($_POST["chbox"]);

$chbox=  $_POST["chbox"];
$attid=  $_POST["attid"];
$titlep= $_POST["titlep"];
$titlep=rtrim($titlep,'/');
$notesp=  $_POST["notesp"];
$notesp=rtrim($notesp,'/');
$datep=   $_POST["datep"];
$datep=rtrim($datep,'/');
$timep= $_POST["timep"];
$timep=rtrim($timep,'/');

//Database Connection
  $host = "tcp:pf9xx4rmq4.database.windows.net,1433";
$user = "harsha";
$pwd = "khv9440385189@";
$db = "Computer_SC_and_Engg";
try{
    $conn = new PDO( "sqlsrv:Server= $host ; Database = $db ", $user, $pwd);
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
   
}
catch(Exception $e){
    echo "connection gone";
    die(print_r($e));
    }
   
        // Insert data into Meeting table
      try {
 
               
    $sql_insert = "INSERT INTO Meeting (uid, tytle, otherinfo,date,time) 
                   VALUES (?,?,?,?,?)";
                     
    $stmt = $conn->prepare($sql_insert);
 
    $stmt->bindValue(1, $uid);
    $stmt->bindValue(2,  $titlep);
    $stmt->bindValue(3, $notesp);
   
       $stmt->bindValue(4, $datep);
       
          $stmt->bindValue(5, $timep);
      
    $stmt->execute();
    
}
catch(Exception $e) {
   echo "Exception";
    die(var_dump($e));
  
}
try
{
$sql_query1="SELECT mid FROM Meeting WHERE uid= {$uid} and date='{$datep}' and time='{$timep}'";

 $stmt = $conn->query($sql_query1);
     $registrants = $stmt->fetchAll(); 

     foreach($registrants as $registrant)
     {
         $mid= $registrant['mid'];
     }
 
}
catch(Exception $e) {
   echo "Exception";
    die(var_dump($e));
  
}
  echo $usersCount; 
for($i=0;$i< $usersCount;$i++)
 {

      if(isset($chbox[$i]))
      {
            try {
      
           $sql_insert = "INSERT INTO Meeting_Att (mid, attid, btime,date) 
                   VALUES (?,?,?,?)";
                     
    $stmt = $conn->prepare($sql_insert);

    $stmt->bindValue(1, $mid);
  
    $stmt->bindValue(2, intval( $attid[$i]));
    $btime="0000000000000000000";
      $mtime=$timep;
                 
                   $mhour=$mtime[0]*10+$mtime[1];
                   if($mhour>=8)
                   {
                         if( $mtime[3]>=3)
                        $n= (($mhour-8)*2)+2;
                        else
                       $n= (($mhour-8)*2)+1;
                   }
                   $btime[$n-1]=1;
    $stmt->bindValue(3, $btime);
    $mday=$datep;
    $mday=  $mday[0]*10000000+$mday[1]*1000000+$mday[2]*100000+$mday[3]*10000+$mday[5]*1000+$mday[6]*100+$mday[8]*10+$mday[9];
       $stmt->bindValue(4, $mday);
       
    $stmt->execute();
    }
catch(Exception $e) {
   echo "Exception";
    die(var_dump($e));
  
}
      }
}  
echo "<div><h1>MEETING CREATED....!</h1>";
echo "<span class='a'>Name:".$titlep."</span><br>";
echo  "<span class='b'>Date:".$datep."</span><br>";
echo  "<span class='c'>Time:".$timep."</span><br><input type='button' class='smsbutton' value='Send SMS'/><input type='button' class='button' value='Send Email'/> </div>";
}
else
{
    echo "<h1>no Meeting to create</h1>";
}








?>
</body>
</html>
