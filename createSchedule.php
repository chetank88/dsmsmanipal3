<?php
    
require 'core.inc.php';
require 'connect.inc.php'; 

if(loggedin())
{

$fname=getuserfield('Name',$conn1);
      echo 'You\'r logged in'.$fname.'<a href="logout.php">Log out</a>';

$tsql="SELECT * FROM table".$_SESSION['id'];
$stmt=sqlsrv_query($conn1,$tsql);

$obj = sqlsrv_fetch_array( $stmt,SQLSRV_FETCH_NUMERIC);
if($obj!=NULL)
 {
    header('Location :timetable.php');
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
    </head>
    <body>
        <form name="input" action="add.php" method="post">

		Day&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		No of classes&nbsp;&nbsp;&nbsp;
		No of Labs&nbsp;&nbsp;&nbsp;
		<br /></br /><br />
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
		<br /></br /><br />
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
		<br /></br /><br />
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
		<br /></br /><br />
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
		<br /></br /><br />
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
		<br /></br /><br />
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
		<br /><br />
		<input type="submit" value="Next">
       </form>
    </body>
</html>

