<?php
    
require 'core.inc.php';
require 'connect.inc.php';
 require 'header.php'; 

if(loggedin())
{

$fname=getuserfield('Name',$conn1);
      //echo 'You\'r logged in'.$fname;

$tsql="SELECT * FROM table".$_SESSION['id'];
$stmt=sqlsrv_query($conn1,$tsql);

$obj = sqlsrv_fetch_array( $stmt,SQLSRV_FETCH_NUMERIC);
if($obj!=NULL)
 {
    header('Location :viewTimetable.php');
 }
}
else
  {
      header('Location: index.php');
  }

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
	<link href="createSchedule2.css" rel="stylesheet" type="text/css"></link>
     <link href="createSchedule.css" rel="stylesheet" type="text/css"></link>
        
    </head>
    <body link="white">
        
<form name="input" action="add.php" method="post">
 <script type="text/javascript" src="js/jquery.js"></script>
 <script type="text/javascript" src="js/animate.js"></script>
    <div class="box div1">
        <div class="oldContent">Monday</div>
        <div class="newContent">
		Day&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		No of classes&nbsp;&nbsp;&nbsp;
		No of Labs&nbsp;&nbsp;&nbsp;
		<br /></br /><hr size=5 noshade><br />
		Monday&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<select name="m1">
		  <option selected="selected" value=0>0</option>
		  <option value=1>1</option>
		  <option value=2>2</option>
		  <option value=3>3</option>
		  <option value=4>4</option>
		  <option value=5>5</option>
		  <option value=6>6</option>
		  <option value=7>7</option>
		  <option value=8>8</option>
		</select>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<select name="m2">
		  <option selected="selected" value=0>0</option>
		  <option value=1>1</option>
		  <option value=2>2</option>
		</select>
		<br /><hr size=5 noshade><br />
	    </div>
    </div>
    <div class="box div2">
        <div class="oldContent">Tuesday</div>
        <div class="newContent">
		Day&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		No of classes&nbsp;&nbsp;&nbsp;
		No of Labs&nbsp;&nbsp;&nbsp;
		<br /></br /><hr size=5 noshade><br />
		Tuesday&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<select name="m3">
		  <option selected="selected" value=0>0</option>
		  <option value=1>1</option>
		  <option value=2>2</option>
		  <option value=3>3</option>
		  <option value=4>4</option>
		  <option value=5>5</option>
		  <option value=6>6</option>
		  <option value=7>7</option>
		  <option value=8>8</option>
		</select>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<select name="m4">
		  <option selected="selected" value=0>0</option>
		  <option value=1>1</option>
		   <option value=2>2</option>
		</select>  
		<br /><hr size=5 noshade><br />
		</div>
    </div>
    <div class="box div3">
        <div class="oldContent">Wednesday</div>
        <div class="newContent">
		Day&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		No of classes&nbsp;&nbsp;&nbsp;
		No of Labs&nbsp;&nbsp;&nbsp;
		<br /></br /><hr size=5 noshade><br />
		Wednesday&nbsp;&nbsp;&nbsp;
		<select name="m5">
		 <option selected="selected" value=0>0</option>
		  <option value=1>1</option>
		  <option value=2>2</option>
		  <option value=3>3</option>
		  <option value=4>4</option>
		  <option value=5>5</option>
		  <option value=6>6</option>
		  <option value=7>7</option>
		  <option value=8>8</option>
		</select>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<select name="m6">
		  <option selected="selected" value=0>0</option>
		  <option value=1>1</option>
		   <option value=2>2</option>
		</select>  
		<br /><hr size=5 noshade><br />
		
		</div>
    </div>
	<div class="box div4">
        <div class="oldContent">Thursday</div>
        <div class="newContent">
		Day&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		No of classes&nbsp;&nbsp;&nbsp;
		No of Labs&nbsp;&nbsp;&nbsp;
		<br /></br /><hr size=5 noshade><br />
		Thursday&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<select name="m7">
		  <option selected="selected" value=0>0</option>
		  <option value=1>1</option>
		  <option value=2>2</option>
		  <option value=3>3</option>
		  <option value=4>4</option>
		  <option value=5>5</option>
		  <option value=6>6</option>
		  <option value=7>7</option>
		  <option value=8>8</option>
		</select>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<select name="m8">
		 <option selected="selected" value=0>0</option>
		  <option value=1>1</option>
		   <option value=2>2</option>
		</select>  
		<br /><hr size=5 noshade><br />
		</div>
    </div>
	<div class="box div5">
        <div class="oldContent">Friday</div>
        <div class="newContent">
		Day&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		No of classes&nbsp;&nbsp;&nbsp;
		No of Labs&nbsp;&nbsp;&nbsp;
		<br /></br /><hr size=5 noshade><br />
		Friday&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<select name="m9">
		  <option selected="selected" value=0>0</option>
		  <option value=1>1</option>
		  <option value=2>2</option>
		  <option value=3>3</option>
		  <option value=4>4</option>
		  <option value=5>5</option>
		  <option value=6>6</option>
		  <option value=7>7</option>
		  <option value=8>8</option>
		</select>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<select name="m10">
		  <option selected="selected" value=0>0</option>
		  <option value=1>1</option>
		   <option value=2>2</option>
		</select>  
		<br /><hr size=5 noshade><br />
		</div>
    </div>
	<div class="box div6">
        <div class="oldContent">Saturday</div>
        <div class="newContent">
		Day&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		No of classes&nbsp;&nbsp;&nbsp;
		No of Labs&nbsp;&nbsp;&nbsp;
		<br /></br /><hr size=5 noshade><br />
		Saturday&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<select name="m11">
		  <option selected="selected" value=0>0</option>
		  <option value=1>1</option>
		  <option value=2>2</option>
		  <option value=3>3</option>
		  <option value=4>4</option>
		  <option value=5>5</option>
		  <option value=6>6</option>
		  <option value=7>7</option>
		  <option value=8>8</option>
		</select>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<select name="m12">
		  <option selected="selected" value=0>0</option>
		  <option value=1>1</option>
		   <option value=2>2</option>			
		</select>
		<br /><hr size=5 noshade><br />
       </div>
    </div>
 </div>
    <div style="float: left; margin-top: 300px; margin-left: 30px;">
        <input type="submit" value="Next" size="10">
        </div>
 </form>
       
 </body>
    
</html>


