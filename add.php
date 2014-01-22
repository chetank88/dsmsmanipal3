
<?php
  require 'core.inc.php';
  require 'connect.inc.php'; 
  if(!loggedin())
  {
       header('Location: index.php');
  }
  $fname=getuserfield('Name',$conn1);
      echo 'You\'r logged in '.$fname;
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
	     <br /><br />';?>
         <!-- <script>var $selects = document.getElementById("select".<?php echo $s;?>);
$selects.on('change', function() {
    $("option", $selects).prop("disabled", false);
    $selects.each(function() {
        var $select = $(this), 
            $options = $selects.not($select).find('option'),
            selectedText = $select.children('option:selected').text();
        $options.each(function() {
            if($(this).text() == selectedText) $(this).prop("disabled", true);
        });
    });
});-->

</script><?php
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
<!--<script src="jquery-2.0.3.min.js"></script>-->
<form name="output" action="viewTimeTable.php" method="post">
              <input type="submit" value="Time Table">
</form>
<div>
<span></span>
<link href="logout.css" rel="stylesheet" type="text/css"></link>
<a href="logout.php">Log out</a></div>	
</div>

<form name="input" action="databaseEntry.php" method="post">
<div class="abc">

	MONDAY
	<br />
	
		  Classes:<br />
		  
	      <br />
         <?php
             display($_POST['m1'],$_POST['m2'],0);  
         ?>
</div>

<div class="abc">

	TUESDAY
	<br />
	
		  Classes:<br />
		  
	      <br />
         <?php
            display($_POST['m3'],$_POST['m4'],1);  
         ?>
</div>

<div class="abc">

	    WEDNESDAY
	<br />
	
		  Classes:<br />
		  
	      <br />
         <?php
            display($_POST['m5'],$_POST['m6'],2);  
         ?>
</div>

<div class="abc">

	THURSDAY
	<br />
	
		  Classes:<br />
		  
	      <br />
         <?php
             display($_POST['m7'],$_POST['m8'],3);  
         ?>
</div>

<div class="abc">

	FRIDAY
	<br />
	
		  Classes:<br />
		  
	      <br />
         <?php
            display($_POST['m9'],$_POST['m10'],4);  
         ?>
</div>

<div class="abc">

	SATURDAY
	<br />
	
		  Classes:<br />
		  
	      <br />
         <?php
           display($_POST['m11'],$_POST['m12'],5);    
          echo ' <br/><br/><br/><br/><br/><br/><br/><br/><br/>
          <input type="submit" value="Create time table">';
         ?>
</div>
</form>

