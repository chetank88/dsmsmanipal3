
<?php
  require 'core.inc.php';
  require 'connect.inc.php'; 
  require 'header.php';
  if(!loggedin())
  {
       header('Location: index.php');
  }
  $fname=getuserfield('Name',$conn1);
     // echo 'You\'r logged in '.$fname;
  $j=1;
  for($k=1;$k<=12;$k++)
  {
     $_SESSION['m'.$k]=$_POST['m'.$k];
  }
  function display($val1,$val2,$s)
  {

        for($i=0;$i<$val1;$i++)
        {
		 echo' <input type="text" name="n'.$GLOBALS['j']++.'"/>';
	     echo ' <br />
		  <select   name=n'.$GLOBALS['j']++.'>
		  <option  selected="selected" value=1>8:00-9:00</option>
		  <option value=3>9:00-10:00</option>
		  <option value=6>10:30:11:30</option>
		  <option value=8>11:30-12:30</option>
		   <option value=11>1:00-2:00</option>
		  <option value=13>2:00-3:00</option>
		  <option value=16>3:30:4:30</option>
		  <option value=18>4:30-5:30</option>
		  </select>
	     <br /><br />';

         echo '<script type="text/javascript" src="js/multiSelect.js"></script>';
  ?>


<?php
        }
	 
        echo 'Labs:<br />';
	      for($i=0;$i<$val2;$i++)
          {
		  echo '
		  <input type="text" name="n'.$GLOBALS['j']++.'"/>
	      <br />
		  <select name=n'.$GLOBALS['j']++.'>
		  <option  selected="selected" value=2>8:30-11:30</option>
		  <option value=13>2:00-5:00</option>	 
		  </select><br /><br />';
          }
  }
  
 ?>

<link rel="stylesheet" type="text/css" href="add.css">
<link rel="stylesheet" type="text/css" href="createSchedule2.css">
<form name="output" action="viewTimeTable.php" method="post">
</form>

<form name="input" action="databaseEntry.php" method="post">
 <script type="text/javascript" src="js/jquery.js"></script>
 <script type="text/javascript" src="js/animateAdd.js"></script>


<div id="s1" >

	<div class="box div1">
        <div class="oldContent">Monday</div>
        <div class="newContent">
	<br />
	
		  Classes:<br />
		  
	      <br />
         <?php
             display($_POST['m1'],$_POST['m2'],1);  
         ?>
            </div>
        </div>
</div>

<div id="s2">

	<div class="box div2">
        <div class="oldContent">Tuesday</div>
        <div class="newContent">
	<br />
	
		  Classes:<br />
		  
	      <br />
         <?php
            display($_POST['m3'],$_POST['m4'],2);  
         ?>
            </div>
        </div>
</div>

<div id="s3">

	   <div class="box div3">
        <div class="oldContent">Wednesday</div>
        <div class="newContent">
	<br />
	
		  Classes:<br />
		  
	      <br />
         <?php
            display($_POST['m5'],$_POST['m6'],3);  
         ?>
            </div>
           </div>
</div>

<div id="s4">

	<div class="box div4">
        <div class="oldContent">Thursday</div>
        <div class="newContent">
	<br />
	
		  Classes:<br />
		  
	      <br />
         <?php
             display($_POST['m7'],$_POST['m8'],4);  
         ?>
            </div>
        </div>
</div>

<div id="s5">

	<div class="box div5">
        <div class="oldContent">Friday</div>
        <div class="newContent">
	<br />
	
		  Classes:<br />
		  
	      <br />
         <?php
            display($_POST['m9'],$_POST['m10'],5);  
         ?>
            </div>
        </div>
</div>


<div id="s6">

   <div class="box div6">
        <div class="oldContent">Saturday</div>
        <div class="newContent">
	<br />
	
		  Classes:<br />
		  
	      <br />
         <?php
           display($_POST['m11'],$_POST['m12'],6);    
          
         ?>
            <br/><br/><br/>
      <input type="submit" value="Create time table">
            </div>
       </div>
   
</div>

</form>



