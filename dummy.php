<?php
require 'core.inc.php';
require 'connect.inc.php'; 
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require "$root/PHPMailer_v5.1/test/testemail.php";
error_reporting(E_ALL);
ini_set('dis[play_errors',1);
if(!loggedin())
{
header('Location: index.php');
}
if($_POST['check']==1)
{
$msg=$_POST['gm'];
$mydate=date("Y-m-d H:i:s");
try{$sql_insert = "INSERT INTO GMessage (ID, gmsg, gdate) 
VALUES (?,?,?)";
$stmt = $connHar->prepare($sql_insert);
$stmt->bindValue(1, $_SESSION['id']);
$stmt->bindValue(2,$msg);
$stmt->bindValue(3, $mydate);
$stmt->execute();}
catch(Exception $e) {
die(var_dump($e));
}
}
else if ($_POST['check']==2)
{
try{$sql_insert = "INSERT INTO Bday (ID, bmsg, bdate) 
VALUES (?,?,?)";
$stmt = $connHar->prepare($sql_insert);
$stmt->bindValue(1, $_SESSION['id']);
$stmt->bindValue(2, $_POST['bmsg']);
$stmt->bindValue(3, $_POST['stro']);
$stmt->execute();}
catch(Exception $e) {
die(var_dump($e));
}
}
else if ($_POST['check']==3)
{
try{$sql_insert = "INSERT INTO Event (ID, emsg, edate, eplace, etime) 
VALUES (?,?,?,?,?)";
$stmt = $connHar->prepare($sql_insert);
$stmt->bindValue(1, $_SESSION['id']);
$stmt->bindValue(2, $_POST['emsg']);
$stmt->bindValue(3, $_POST['stro']);
$stmt->bindValue(4, $_POST['eplace']);
$stmt->bindValue(5, $_POST['stro2']);
$stmt->execute();}
catch(Exception $e) {
die(var_dump($e));
}
}
else if ($_POST['check']==4)
{
$msg=$_POST['note'];
$mydate=date("Y-m-d H:i:s");
try{$sql_insert = "INSERT INTO Notes (ID, notes, ndate) 
VALUES (?,?,?)";
$stmt = $connHar->prepare($sql_insert);
$stmt->bindValue(1, $_SESSION['id']);
$stmt->bindValue(2, $msg);
$stmt->bindValue(3, $mydate);
$stmt->execute();}
catch(Exception $e) {
die(var_dump($e));
}
}
else if($_POST['check']==5)
{
$msg=$_POST['gm'];
$mydate=date("Y-m-d H:i:s");
$tsql="SELECT * FROM People WHERE uid ='{$_SESSION['id']}'";
$stmt =$conn->query($tsql); 
$periods=$stmt->fetchAll();
$num=count($periods);
if($num!=0)
{
foreach($periods as $perioda)
{
$mail->FromName=$perioda['Name'].' '.$perioda['Lname'];
$mymail=$perioda['email'];
// echo $mymail;
}
}
foreach($_POST['rid'] as $rid)
{
try{$sql_insert = "INSERT INTO IMPMSG (ID, RID, impmsg, impdate) 
VALUES (?,?,?,?)";
$stmt = $conn->prepare($sql_insert);
$stmt->bindValue(1, $_SESSION['id']);
$stmt->bindValue(2, $rid);
$stmt->bindValue(3, $msg);
$stmt->bindValue(4, $mydate);
$stmt->execute();}
catch(Exception $e) {
die(var_dump($e));
}
try{
$tsql="SELECT * FROM People WHERE uid ='{$rid}'";
$stmt =$conn->query($tsql); 
$periods=$stmt->fetchAll();
$num=count($periods);
if($num!=0)
{
foreach($periods as $period)
{
$to=$period['email'];
}
}
try{
$body=$msg;
//$mail->FromName = "DSMS";
//$to = "sagar0327@gmail.com";
$mail->AddAddress($to);
$mail->MsgHTML($body);
$mail->Subject = "DSMS message";
$mail->AddReplyTo($mymail,$perioda['Name'].' '.$perioda['Lname']);
$mail->Send();
echo 'Message has been sent.';
}
catch (phpmailerException $e) {
echo $e->errorMessage();
}
}
catch(Exception $e) {
die(var_dump($e));
}
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