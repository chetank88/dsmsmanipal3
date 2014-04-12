   <? include 'core.inc.php';
          include 'connect.inc.php'; 
          require 'header.php';      
  ?>
          
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
     <link rel="stylesheet" type="text/css" href="cmeeting.css">
     
             <script>
                 function validateForm() {
                     var x = document.forms["cmeeting"]["mday"].value;
                     var d = new Date(x);
                     var w = d.getDay();
                     if (w == 0) {
                         alert("No Meeting's on Sunday");
                         return false;
                     }
                 }
                 function myFunctionp() {

                     var x = document.getElementById("hor-minimalist-b").getElementsByTagName("tr");



                     for (var i = 1; i < x.length; i++) {
                         var y = x[i].getElementsByTagName("td");

                         var str = y[1].innerHTML.toString();
                       
                         if (str == 'Proffesor') {
                             if(!y[2].getElementsByTagName("input")[0].checked)
                               y[2].getElementsByTagName("input")[0].checked=true;
                               else
                                 y[2].getElementsByTagName("input")[0].checked=false;


                         }
                     }

                 }
                 myFunctionasp()
                 myFunctionassp()
                 myFunctionassgp()
                 myFunctionap()
                 myFunctione()
</script>
    </head>
    <body>


         <div class="normal">
        <form name="cmeeting" action="#" method="POST" class="form1" onsubmit="return validateForm()">
               <h1>New meeting</h1>
   
      <label><span>Title:</span><input type="text" name="title" required></label>
        <label><span>Notes:</span> <textarea  name="notes" id="feedback" maxlength="400" required ></textarea></label><br>
      <label><span>  Date:</span>  <input type="date" class="datetime" name="mday" min =<?php echo date("Y-m-d");?>  placeholder='mm/dd/yyyy' required></label>
       <label> <span > Time: </span> <input type="time" class="datetime" name="mtime"  min='08:00' max='17:30' placeholder='hh:mm(24hr)' required></label>
     <input type="submit"  class="button"     value="create meeting"> 
        </form>
        </div>
   
        <?php
       
          if(!loggedin())
         {
             header('Location: index.php');
          }
           if(!empty($_POST))
            {
     ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');
//For Selection by Rank

      
                print("<div class='background'></div>");
                  print("<div class='modal'>");
                  print("<h3>People who are available!</h3>");
                  print( "<label><span id='cb'>");
                  echo "Time:";
                    $mtime= $_POST['mtime'];
                 
                   $mhour=$mtime[0]*10+$mtime[1];
                   if($mhour>=8)
                   {
                         if( $mtime[3]>=3)
                        $n= (($mhour-8)*2)+2;
                        else
                       $n= (($mhour-8)*2)+1;
                  echo $mtime;
                // echo $n;
                   }
                   else
                   {
                       echo "INVALID TIME";
                   }
             print("\t");
                    echo "Date:";
                    echo $_POST['mday'];
               $dn= date('N',strtotime($_POST['mday']));
               if($dn==7)
               {echo "<script type='text/javascript'>
                  function myFunction()
{
                        
          var r=confirm('No meeting's on sunday');
 if (r==true)
  {
history.go(-1);
  }
else
  {
 history.go(-1);
  }
  }
        </script>
";
               }
               //echo $dn;
               //echo "/";
                   print( "</span></label>");
            
 echo "<div class='container' id='ex3'>
 <form action='cmeetingsub.php' method='POST'>
<table  id='hor-minimalist-b'>
<thead>
    	<tr>
         
        	<th scope='col'>Staff Name</th>
           <th scope='col'>designation</th>
           <th scope='col'>call</th>
           
        </tr>
    </thead>
    <tbody>
    <input type='hidden' name='titlep' value={$_POST['title']}/>
<input type='hidden' name='notesp' value={$_POST['notes']}/>
<input type='hidden' name='datep' value={$_POST['mday']}/>
<input type='hidden' name='timep' value={$_POST['mtime']}/>";
         $sql_select1 = "SELECT * FROM People" ;
       $stmt = $connHar->query($sql_select1);
     $registrants = $stmt->fetchAll(); 
if(count($registrants) > 0) {

    foreach($registrants as $registrant) {
      $k=0;
      
     $sql_select2="SELECT * FROM  {$registrant['tid']} ";
     $stmt1=$connHar->query($sql_select2);
     $registrants1=$stmt1->fetchAll();
     $temp=$registrants1[$dn-1];
     $stemp=$temp['strbin'];
     //echo $stemp;
   // echo $temp['day'];
   // echo $stemp[$n-1];
     $sum=$stemp[$n-1];
   //  echo $dn;
    // echo $sum;
     //echo $registrant['uid'];
   $mday= $_POST['mday'];
   $mday=  $mday[0]*10000000+$mday[1]*1000000+$mday[2]*100000+$mday[3]*10000+$mday[5]*1000+$mday[6]*100+$mday[8]*10+$mday[9];
   
     

    $sql_select3="SELECT * FROM  Meeting_Att WHERE attid='{$registrant['uid']}' and date={$mday}";
     $stmt2=$connHar->query($sql_select3);
   
     $registrants2=$stmt2->fetchAll();

     if(count($registrants2) > 0) {
       foreach($registrants2 as $registrant2)
       {
           $temp1=$registrant2['btime'];
          
        $sum=$sum+$temp1[$n-1];
       }
     }
    
    
     //echo $sum;
        if($sum==0)
        {
            
       printf(" <tr>
<td id='sn[]'>%s</td>
<td id='d[]'>%s</td>
<td><input type='checkbox' id='myCheck' name='chbox[]' class='ckbox' /></td> 
<input type='hidden' name='attid[]' value='{$registrant['uid']}'/>

</tr>",$registrant['Name'],$registrant['Designation']);}

     }
          
}




echo" </tbody>
    </table>

</div>";

print("<span id='cb'>Selection based on Rank</span><ul> <li>Proffesor<input type='checkbox' class='ckdbox' name='p' onchange='myFunctionp()' /></li><li>AssosiateProffesor<input type='checkbox' class='ckdbox' onchange='myFunctionasp()'/></li><li>AssitantProffesor(sr.scale)<input type='checkbox' class='ckdbox' onchange='myFunctionassp()'/></li>
 <li>AssistantProffesor(Selection Grade)<input type='checkbox' class='ckdbox' onchange='myFunctionassgp()' /></li>  <li>AssistantProffesor<input type='checkbox' class='ckdbox' onchange='myFunctionap()'/></li><li>EveryBody<input type='checkbox' class='ckdbox' onchange='myFunctione()' /></li>");

 print("<input type='submit'  class='button' name='submit'  value='conform'>  ");   
  
  print("<INPUT TYPE='button' VALUE='Cancel' class='cancelbutton' onClick='history.go(-1);'>");  
  print("</form>");     
            print("</div>");                                                                     
            
            }
        ?>
   
        
 
    </body>

</html>
