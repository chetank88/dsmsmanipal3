<?php
 include 'core.inc.php';
 include 'connect.inc.php'; 

 if(!loggedin())
  {
      include 'loginform.inc.php';
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
<div>
<span></span>
<link href="logout.css" rel="stylesheet" type="text/css"></link>
<a href="logout.php">Log out</a></div>	
</div>
        <ul id="menu">
<li><a href="#">Meeting</a>
    <ul class="submenu">
        <li><a href="cmeeting.php">Create Meeting</a></li>
        <li><a href="smeeting.php">See Meetings</a></li>
    </ul>
</li>
</ul>
        <?php
            
         
            if(isset($_GET['mid'])&&$_GET['s']=='y'&&!isset($_POST['chbox']))
            {//Database Connection
  
               try
              {
                     echo "<table id='rounded-corner' summary='Attendence'>
    <thead>
            <tr>
                <th scope='col' class='rounded-company'>Name</th>
            <th scope='col' class='rounded-q1'>Designation</th>
            <th scope='col' class='rounded-q2'>Phone number</th>
            <th scope='col' class='rounded-q3'>EMAIL</th>
            <th scope='col' class='rounded-q4'>Attendence</th>
            
    
        </tr>
    </thead>";
                
                $unsecure = substr($_GET['mid'], 3);
                $unsecure = base64_decode($unsecure);
             
               $sql_select="select Name,Designation,Phoneno,email,attid,attendence from Meeting_Att,People where mid='{$unsecure}' and uid=attid";
        
          //echo $sql_select;
             $stmt=$connHar->query($sql_select);
             $registrants=$stmt->fetchAll();
      
           echo "<tbody>";
               echo "<form  action='http://dsmsmanipal3.azurewebsites.net/atten.php?mid={$_GET['mid']}&s=n' method='POST'>";
              // echo count($registrants);
               $k=0;
                    if(count($registrants) > 0) {
                        $g=0;
                            
        foreach($registrants as $registrant) {
       
        
                echo "<tr>
         
            <td>{$registrant['Name']}</td>
            <td>{$registrant['Designation']}</td>
            <td>{$registrant['Phoneno']}</td>
            <td>{$registrant['email']}</td>
            <td>";
            if(!isset($registrant['attendence'])) echo "<input type='radio' name='attr[$k]' value='A'>A<input type='radio' name='attr[$k]' value='p'>P<input type='hidden' name='attid[]' value={$registrant['attid']}/>"; else {$g=1; if($registrant['attendence']==1)  echo "Attended"; else echo "Not Attended"; } 
             echo "</td></tr>";
             $k++;
  }
       
       
    echo "</tbody>"; 
    if($g==0)
    {
  echo "<tfoot>
            <tr>
                <td colspan='4' class='rounded-foot-left'><em>Attendence A-absent P-present</em></td>
                   <input type='hidden' name='s1' value='y'/>
           <td> <input type='submit' class='button'  value='save'/></td>
            <td class='rounded-foot-right'>&nbsp;</td>
        </tr>
   </form> </tfoot></table>";   }
   else
   {
         echo "<tfoot>
            <tr>
                <td colspan='4' class='rounded-foot-left'><em>Attendence </em></td>
        
          
            <td class='rounded-foot-right'>&nbsp;</td>
        </tr>
   </form> </tfoot></table>";   }
                    }
   }
                    
              
                catch(Exception $e){
                    die(print_r($e));
                 }
            }
  
            if($_GET['s']=='n')
            {
                
              
              try
              {
               
                $n= count($_POST['attid']);
           
          //  echo $n;
                if($n>0)
                { $chbox=$_POST['attr'];
                   
                    $attid=$_POST['attid'];
                  $unsecure = substr($_GET['mid'], 3);
                $unsecure = base64_decode($unsecure);
             
                for($i=0;$i<$n;$i++)
                {
                     $chboxt=$chbox[$i];
                      //echo $chboxt;
                    if($chboxt=='p')
                    {  
                         $attid[$i]=chop($attid[$i],"/");
                   // echo $attid[$i];
                          $sql_update = "UPDATE Meeting_Att SET attendence='true' 
                   WHERE attid={$attid[$i]} and mid={$unsecure}";
                     //   echo $sql_update;
    
                    }
                    else
                    {
                        //  echo $attid[$i];
                         $attid[$i]=chop($attid[$i],"/");
                          $sql_update = "UPDATE Meeting_Att SET attendence='false' 
                   WHERE attid={$attid[$i]} and mid={$unsecure}";
                    
                   //echo $sql_update;
                    }
                    $stmt = $connHar->query($sql_update);
                  

                }
                }
             
      echo "<table id='rounded-corner' summary='Attendence'>
    <thead>
            <tr>
                <th scope='col' class='rounded-company'>Name</th>
            <th scope='col' class='rounded-q1'>Designation</th>
            <th scope='col' class='rounded-q2'>Phone number</th>
            <th scope='col' class='rounded-q3'>EMAIL</th>
            <th scope='col' class='rounded-q4'>Attendence</th>
          
    
        </tr>
    </thead>";
            $sql_select="select Name,Designation,Phoneno,email,attid,attendence from Meeting_Att,People where mid='{$unsecure}' and uid=attid";
            $stmt=$connHar->query($sql_select);
             $registrants=$stmt->fetchAll();
      
                   if(count($registrants) > 0) {
                            
        foreach($registrants as $registrant) {
         
        
                echo "<tr>
                <td>{$registrant['Name']}</td>
            <td>{$registrant['Designation']}</td>
            <td>{$registrant['Phoneno']}</td>
            <td>{$registrant['email']}</td>
            <td>";
         
            if($registrant['attendence']) echo "Attended"; else echo "Not Attended";
            echo "</td></tr>";
  
            }
                   }
                      echo "</tbody>"; 
  echo "<tfoot>
            <tr>
                <td colspan='4' class='rounded-foot-left'><em>Attendence</em></td>
            <td class='rounded-foot-right'>&nbsp;</td>
        </tr>
    </tfoot></table>";   }
              
                catch(Exception $e){
                    die(print_r($e));
                 }
            }
        ?>
    </body>
</html>