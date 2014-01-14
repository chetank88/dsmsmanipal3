<?php
    //harsha
    $uid=7000;
     include 'connect.inc.php'; 

  if(!loggedin())
  {
      header('Location: loginform.inc.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
        <link rel="stylesheet" type="text/css" href="smeeting.css">
      
    </head>
    <body>
        <ul id="menu">
<li><a href="#">Meeting</a>
    <ul class="submenu">
        <li><a href="cmeeting.php">Create Meeting</a></li>
        <li><a href="smeeting.php">See Meetings</a></li>
    </ul>
</li>
</ul>
          <?php
          
              try
              {
                     echo "<table id='rounded-corner' summary='Meetings Created By U'>
    <thead>
    	<tr>
        	<th scope='col' class='rounded-company'>Meeting Id</th>
            <th scope='col' class='rounded-q1'>Title</th>
            <th scope='col' class='rounded-q2'>Info</th>
            <th scope='col' class='rounded-q2'>Date</th>
            <th scope='col' class='rounded-q4'>Time</th>
               <th scope='col' class='rounded-q4'>Attendence</th>
        </tr>
    </thead>";
               $sql_select="SELECT * FROM  Meeting WHERE uid={$uid}";
     $stmt=$connHar->query($sql_select);
     $registrants=$stmt->fetchAll();
     $n=count($registrants) ;
  echo "<tbody>";
       
              if($n>0) {
    for($i=0;$i<$n;$i++) {
     
    

              $registrant=$registrants[$i];
                  $secure = rand(100,999).base64_encode($registrant['mid']);
                  //echo $secure;
        echo " <tr>
        	<td>{$registrant['mid']}</td>
            <td>{$registrant['tytle']}</td>
            <td>{$registrant['otherinfo']}</td>
            <td>{$registrant['date']}</td>
            <td>{$registrant['time']}</td>
            <td><a href='atten.php?mid={$secure}'><input  type='submit' class='button' name='butt[]' value='Attendence'/></a></td>
        </tr>";
    

  }
        
  echo "</tbody><tfoot>
    	<tr>
        	<td colspan='4' class='rounded-foot-left'><em>The above  Meetings are created by you</em></td>
        	<td class='rounded-foot-right'>&nbsp;</td>
        </tr>
    </tfoot></table>";   }
              }
                catch(Exception $e){
                    die(print_r($e));
                 }
     try
              {
                     echo "<table id='rounded-corner' summary='Meetings Created By U'>
    <thead>
    	<tr>
        	<th scope='col' class='rounded-company'>Meeting Id</th>
            <th scope='col' class='rounded-q1'>Title</th>
            <th scope='col' class='rounded-q2'>Info</th>
            <th scope='col' class='rounded-q2'>Date</th>
            <th scope='col' class='rounded-q4'>Time</th>
    
        </tr>
    </thead>";
               $sql_select="select * from Meeting,Meeting_Att,People where Meeting.mid=Meeting_Att.mid and Meeting.uid=People.uid and attid=4568";
     $stmt=$connHar->query($sql_select);
     $registrants=$stmt->fetchAll();
  
              if(count($registrants) > 0) {
    foreach($registrants as $registrant) {

 echo "<tbody>
    	<tr>
        	<td>{$registrant['mid']}</td>
            <td>{$registrant['tytle']}</td>
            <td>{$registrant['otherinfo']}</td>
            <td>{$registrant['date']}</td>
            <td>{$registrant['time']}</td>
       
        </tr>
  
    </tbody>";

  }
        
  echo "<tfoot>
    	<tr>
        	<td colspan='4' class='rounded-foot-left'><em>You are invited to above Meetings  </em></td>
        	<td class='rounded-foot-right'>&nbsp;</td>
        </tr>
    </tfoot></table>";   }
              }
                catch(Exception $e){
                    die(print_r($e));
                 }
          ?>
    </body>
</html>
