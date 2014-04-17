 <?php
     include "core.inc.php";  
     include "connect.inc.php";
     require "header.php";
?>

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


  <?php
     
      if(!loggedin())
     {
       header('Location: index.php');
     }
     
 $uid=$_SESSION['id'];
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


   
        // Insert data into Meeting table
      try {
 
               
    $sql_insert = "INSERT INTO Meeting (uid, tytle, otherinfo,date,time) 
                   VALUES (?,?,?,?,?)";
                     
    $stmt = $connHar->prepare($sql_insert);
 
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
$sql_query1="SELECT mid FROM Meeting WHERE uid= '{$uid}' and date='{$datep}' and time='{$timep}'";

 $stmt = $connHar->query($sql_query1);
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
  //echo $usersCount; 
for($i=0;$i< $usersCount;$i++)
 {

      if(isset($chbox[$i]))
      {
            try {
          $attid[$i]=rtrim($attid[$i],'/');
           $sql_insert = "INSERT INTO Meeting_Att (mid, attid, btime,date) 
                   VALUES (?,?,?,?)";
                     
    $stmt = $connHar->prepare($sql_insert);

    $stmt->bindValue(1, $mid);
  
    $stmt->bindValue(2, $attid[$i]);
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
echo "<div id='csubd'><h1 id='csubh' >MEETING CREATED....!</h1>";
echo "<span id='csubspan' class='a'>Name:".$titlep."</span><br>";
echo  "<span id='csubspan' class='b'>Date:".$datep."</span><br>";
echo  "<span id='csubspan' class='c'>Time:".$timep."</span><br><input type='button' class='smsbutton' value='Send SMS'/><input type='button' class='button' value='Send Email'/> </div>";
}
else
{
    echo "<h1 id='csubh'>no Meeting to create</h1>";
}

?>
</body>
</html>
