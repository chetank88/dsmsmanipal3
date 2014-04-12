<!DOCTYPE html>
<script  type="text/javascript">
    var jsMid;
    function passMid(a) {
         jsMid = a;
    }
    
</script>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
        
        <link href="messageView.css" rel="stylesheet" type="text/css">
        
    </head>

<?php
      require 'core.inc.php';
      require 'connect.inc.php';
      require 'header.php';
       

if(loggedin())
  {
      require 'connect.inc.php';  
 
      $fname=getuserfield('Name',$conn1);
      //echo 'You\'r logged in'.$fname;
  }
  else
  {
       header('Location: index.php');
  }
?>
    <body>
        <form name="form" method="post" id="form">
<div id="pop1" class="pop-up">
  <div class="popBox">
    <div class="popScroll">
      <h2>Edit the message</h2>
      
          <textarea rows="5" cols="50" name="edit" id="edit"></textarea>
          <input type="submit" onclick="onSubmit()" value="Submit" class="submit2">
      
    </div>
    <a href="#" class="close"><span>Close</span></span></a>
  </div>
  <a href="#" class="lightbox">Back to links</a>
</div>
        </form>
<?php
    
       
$tsql="select * from IMPMSG WHERE ID='".$_SESSION['id']."' order by impdate desc";
$stmt=sqlsrv_query($conn1,$tsql);
if($stmt!=NULL)
$obj = sqlsrv_fetch_array( $stmt,SQLSRV_FETCH_NUMERIC);

//print_r ($obj);

echo '<div id="pmsg"><h3>PERSONAL MESSAGES SENT</h3><br><br>';
if($obj!=NULL)
{

    for($i=0;$i<5;++$i)
     {
       if($obj==NULL) break;
       $tsql1="select Name from People where uid='".$obj[2]."'";
       $stmt1=sqlsrv_query($conn1,$tsql1);
       $obj1 = sqlsrv_fetch_array( $stmt1,SQLSRV_FETCH_NUMERIC);

       echo  '<p>'.$obj[4]->format('m/d/Y').'- '.$obj[3].'-'.$obj1[0].'</p>';
       $obj = sqlsrv_fetch_array( $stmt,SQLSRV_FETCH_NUMERIC);
     }
}
else{
    echo 'No messages yet!';
}
echo '</div>';


$tsql="select * from GMessage where ID='".$_SESSION['id']."'order by gdate desc";
$stmt=sqlsrv_query($conn1,$tsql);
$obj = sqlsrv_fetch_array( $stmt,SQLSRV_FETCH_NUMERIC);

echo '<div id="gemsg"><h3>GENERAL MESSAGES CREATED</h3><br><br>';
if($obj!=NULL)
{
    for($i=0;$i<5;++$i)
     {
       if($obj==NULL) break;

       echo  '<p>'.$obj[3]->format('m/d/Y').'- '.$obj[2].'</p>';
        echo'
        <input type="hidden" name="variable" value="50" />
        <a href="#pop1"><input type="image" onclick="javascript:passMid('.$obj[0].')" src="/MessageImages/edit.jpg"></a>';
       
       $obj = sqlsrv_fetch_array( $stmt,SQLSRV_FETCH_NUMERIC);
     }
}
else{
    echo 'No messages yet!';
}
echo '</div>';

  
?> 
    </body>
</html>
 
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/
libs/jquery/1.3.0/jquery.min.js">
</script>
<script>    function onSubmit() {
        var message = document.getElementById("edit").value;
        var str = $('form').serializeArray();
        str.push({ name: 'Mid', value: jsMid });
        str.push({ name: 'message', value: message });
        $.ajax({
            type: 'post',
            url: 'messageDBedit.php',
            data: str,
            success: function () {
                alert("Message was changed sucessfully!!!!");
            }
        });
        return true;

    }</script>





