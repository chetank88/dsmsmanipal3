<?php $root = realpath($_SERVER["DOCUMENT_ROOT"]);
require "$root/PHPMailer_v5.1/test/testemail.php";
require 'connect.inc.php';
error_reporting(E_ALL);
ini_set('dis[play_errors',1);
//$service = implode(' ', $_POST['rid']);
//echo $service;
//$rid=$_POST['rid'];
$msg="abc";
$mydate=date("Y-m-d H:i:s");
$id_chetan=14;
echo $tsql="SELECT * FROM People WHERE uid =14";
$stmt =$connHar->query($tsql); 
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
$rid=13;
{
try{$sql_insert = "INSERT INTO IMPMSG (ID, RID, impmsg, impdate) 
VALUES (?,?,?,?)";
$stmt = $connHar->prepare($sql_insert);
$stmt->bindValue(1, $id_chetan);
$stmt->bindValue(2, $rid);
$stmt->bindValue(3, $msg);
$stmt->bindValue(4, $mydate);
$stmt->execute();}
catch(Exception $e) {
die(var_dump($e));
}
try{
echo $tsql="SELECT * FROM People WHERE uid ='{$rid}'";
$stmt =$connHar->query($tsql); 
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
?>