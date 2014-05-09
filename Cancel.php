
<?php
  
     
     include 'core.inc.php';
      require 'header.php';
     $root = realpath($_SERVER["DOCUMENT_ROOT"]);
require "$root/PHPMailer_v5.1/test/testemail.php";
  if(!loggedin())
  {
      header('Location: index.inc.php');
  }
  $uid=$_SESSION['id'];
      include 'connect.inc.php'; 
       


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
                 <?php     
          $unsecure = substr($_GET['mid'], 3);
                $unsecure = base64_decode($unsecure);

    // Insert data
       
                   $sql_select="select * from Meeting,Meeting_Att,People where Meeting.mid={$unsecure} and Meeting.mid=Meeting_Att.mid and Meeting_Att.attid=People.uid and Meeting.uid='{$uid}' ";
        try{
     $stmt=$connHar->query($sql_select);
   
     $registrants=$stmt->fetchAll();
        } catch(Exception $e){
                    die(print_r($e));
                 }
                 
              if(count($registrants) > 0) {
                  $flag=0;

    foreach($registrants as $registrant) {
              $mail->AddAddress($registrant['email'],$registrant['Name'] );
    }
      $mail->FromName = "Meeting Admin";              
$mail->AddReplyTo("devkhv129@gmail.com", "Info");

$mail->WordWrap = 50;                                 // set word wrap to 50 characters

$mail->IsHTML(true);                                  // set email format to HTML

$mail->Subject = "Meeting Id no"+$unsecure+"is canceled";
$mail->Body    = "This is the HTML message body <b>in bold!</b>";
$mail->AltBody = "This is the body in plain text for non-HTML mail clients";
try{
if(!$mail->Send())
{
   echo "Message could not be sent. <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}}
catch (phpmailerException $e) {
echo $e->errorMessage();
}
echo "Message has been sent";
    }
try{
       $sql_insert = "Delete From Meeting
                             WHERE mid={$unsecure};";

              $stmt =$connHar->exec( $sql_insert);
           
               $sql_insert1 = "Delete From Meeting_Att
                             WHERE mid={$unsecure};";

              $stmt =$connHar->exec( $sql_insert1);
                  echo "<h1>Meeting Canceled And participants informed !!!</h1>";
           
                  }
      catch(Exception $e){
                    die(print_r($e));
                 }?> 

    </body>
</html>
