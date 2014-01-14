
<?php
  require 'core.inc.php';
  $j=1;
  for($k=1;$k<=12;$k++)
  {
     $_SESSION['m'.$k]=$_POST['m'.$k];
  }
  function display($val1,$val2)
  {
        for($i=0;$i<$val1;$i++)
        {
		 echo' <input type="text" name="n'.$GLOBALS['j']++.'"/>';
	     echo ' <br />
		  <select  name=n'.$GLOBALS['j']++.'>
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

<link rel="stylesheet" type="text/css" href="main.css">

<form name="output" action="timetable.php" method="post">
              <input type="submit" value="Time Table">
</form>

<form name="input" action="databaseEntry.php" method="post">
<div class="abc">

	MONDAY
	<br />
	
		  Classes:<br />
		  
	      <br />
         <?php
             display($_POST['m1'],$_POST['m2']);  
         ?>
</div>

<div class="abc">

	TUESDAY
	<br />
	
		  Classes:<br />
		  
	      <br />
         <?php
            display($_POST['m3'],$_POST['m4']);  
         ?>
</div>

<div class="abc">

	    WEDNESDAY
	<br />
	
		  Classes:<br />
		  
	      <br />
         <?php
            display($_POST['m5'],$_POST['m6']);  
         ?>
</div>

<div class="abc">

	THURSDAY
	<br />
	
		  Classes:<br />
		  
	      <br />
         <?php
             display($_POST['m7'],$_POST['m8']);  
         ?>
</div>

<div class="abc">

	FRIDAY
	<br />
	
		  Classes:<br />
		  
	      <br />
         <?php
            display($_POST['m9'],$_POST['m10']);  
         ?>
</div>

<div class="abc">

	SATURDAY
	<br />
	
		  Classes:<br />
		  
	      <br />
         <?php
           display($_POST['m11'],$_POST['m12']);    
          echo ' <br/><br/><br/><br/><br/><br/><br/><br/><br/>
          <input type="submit" value="Create time table">';
         ?>
</div>
</form>

