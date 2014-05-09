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

<!--
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


-->


<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<style type="text/css">

body
{
   background-color: #FFFFFF;
   color: #000000;
   font-family: Arial;
   font-size: 13px;
   margin: 0;
   padding: 0;
}
</style>
<link href="cupertino/jquery.ui.all.css" rel="stylesheet" type="text/css">
<style type="text/css">
a
{
   color: #0000FF;
   text-decoration: underline;
}
a:visited
{
   color: #800080;
}
a:active
{
   color: #FF0000;
}
a:hover
{
   color: #0000FF;
   text-decoration: underline;
}
</style>
<style type="text/css">
#jQueryAccordion1 .ui-accordion-header
{
   font-family: Arial;
   font-size: 13px;
   font-weight: normal;
   font-style: normal;
   padding: 10px 10px 10px 30px;
}
#jQueryAccordion1 h3
{
   display: block;
}
#jQueryAccordion1 .ui-accordion-header .ui-icon
{
   left: 10px;
}
#jQueryAccordion1 .ui-accordion-content
{
   padding: 0 0 0 0;
   position: relative;
}
#wb_Text1 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
   text-align: left;
}
#wb_Text1 div
{
   text-align: left;
}    
#Combobox1
{
   border: 1px #A9A9A9 solid;
   background-color: #FFFFFF;
   color: #000000;
   font-family: Arial;
   font-size: 13px;
}
#wb_Text2 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
   text-align: left;
}
#wb_Text2 div
{
   text-align: left;
}    
#Combobox2
{
   border: 1px #A9A9A9 solid;
   background-color: #FFFFFF;
   color: #000000;
   font-family: Arial;
   font-size: 13px;
}
#wb_Text3 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
   text-align: left;
}
#wb_Text3 div
{
   text-align: left;
}
#Combobox3
{
   border: 1px #A9A9A9 solid;
   background-color: #FFFFFF;
   color: #000000;
   font-family: Arial;
   font-size: 13px;
}
#wb_Text4 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
   text-align: left;
}
#wb_Text4 div
{
   text-align: left;
}
#wb_Text5 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
   text-align: left;
}
#wb_Text5 div
{
   text-align: left;
}
#Combobox5
{
   border: 1px #A9A9A9 solid;
   background-color: #FFFFFF;
   color: #000000;
   font-family: Arial;
   font-size: 13px;
}
#wb_Text6 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
   text-align: left;
}
#wb_Text6 div
{
   text-align: left;
}
#wb_Text7 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
   text-align: left;
}
#wb_Text7 div
{
   text-align: left;
}
#Combobox7
{
   border: 1px #A9A9A9 solid;
   background-color: #FFFFFF;
   color: #000000;
   font-family: Arial;
   font-size: 13px;
}
#wb_Text8 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
   text-align: left;
}
#wb_Text8 div
{
   text-align: left;
}
#wb_Text9 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
   text-align: left;
}
#wb_Text9 div
{
   text-align: left;
}
#Combobox9
{
   border: 1px #A9A9A9 solid;
   background-color: #FFFFFF;
   color: #000000;
   font-family: Arial;
   font-size: 13px;
}
#wb_Text10 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
   text-align: left;
}
#wb_Text10 div
{
   text-align: left;
}
#wb_Text11 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
   text-align: left;
}
#wb_Text11 div
{
   text-align: left;
}
#Combobox11
{
   border: 1px #A9A9A9 solid;
   background-color: #FFFFFF;
   color: #000000;
   font-family: Arial;
   font-size: 13px;
}
#wb_Text12 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
   text-align: left;
}
#wb_Text12 div
{
   text-align: left;
}
#jQueryButton1
{
   font-family: Arial;
   font-size: 13px;
   font-weight: normal;
   font-style: normal;
}
#jQueryButton1 .ui-button
{
   position: absolute;
}
#jQueryButton1 .ui-button-text-icon .ui-button-icon-primary,
#jQueryButton1 .ui-button-text-icons .ui-button-icon-primary,
#jQueryButton1 .ui-button-icons-only .ui-button-icon-primary
{
   left: auto;
   right: 10px;
}
#jQueryButton1 .ui-button-text-icons .ui-button-icon-secondary,
#jQueryButton1 .ui-button-icons-only .ui-button-icon-secondary
{
   right: auto;
   left: 10px;
}
#Combobox4
{
   border: 1px #A9A9A9 solid;
   background-color: #FFFFFF;
   color: #000000;
   font-family: Arial;
   font-size: 13px;
}
#Combobox6
{
   border: 1px #A9A9A9 solid;
   background-color: #FFFFFF;
   color: #000000;
   font-family: Arial;
   font-size: 13px;
}
#Combobox8
{
   border: 1px #A9A9A9 solid;
   background-color: #FFFFFF;
   color: #000000;
   font-family: Arial;
   font-size: 13px;
}
#Combobox10
{
   border: 1px #A9A9A9 solid;
   background-color: #FFFFFF;
   color: #000000;
   font-family: Arial;
   font-size: 13px;
}
#Combobox12
{
   border: 1px #A9A9A9 solid;
   background-color: #FFFFFF;
   color: #000000;
   font-family: Arial;
   font-size: 13px;
}
</style>
<script type="text/javascript" src="cupertino/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="cupertino/jquery.ui.core.min.js"></script>
<script type="text/javascript" src="cupertino/jquery.ui.widget.min.js"></script>
<script type="text/javascript" src="cupertino/jquery.ui.accordion.min.js"></script>
<script type="text/javascript" src="cupertino/jquery.ui.effect.min.js"></script>
<script type="text/javascript" src="cupertino/jquery.ui.button.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
   var jQueryAccordion1Opts =
   {
      event: 'click',
      animate: 'easeInOutSine',
      active: false,
      collapsible: true,
      header: 'h3',
      heightStyle: 'fill'
   };
   $("#jQueryAccordion1_id").accordion(jQueryAccordion1Opts);
   $("#jQueryButton1").button();
});
</script>
</head>
<body>
<form name="input" action="add.php" method="post">
<div id="jQueryAccordion1" style="position:absolute;left:303px;top:222px;width:372px;height:307px;z-index:24;">
<div id="jQueryAccordion1_id" style="position:absolute;width:372px;height:307px">
<h3>MONDAY</h3>
<div>
<div id="wb_Text1" style="position:absolute;left:26px;top:18px;width:85px;height:16px;z-index:0;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">No of classes</span></div>
<select name="m1" size="1" id="Combobox1" style="position:absolute;left:114px;top:16px;width:44px;height:21px;z-index:1;" title="No of Class">
<option selected value="0">0</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
</select>
<div id="wb_Text2" style="position:absolute;left:182px;top:17px;width:85px;height:16px;z-index:2;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">No of labs</span></div>
<select name="m2" size="1" id="Combobox2" style="position:absolute;left:282px;top:15px;width:48px;height:21px;z-index:3;" title="No of Labs">
<option selected value="0">0</option>
<option value="1">1</option>
<option value="2">2</option>
</select>
</div>
<h3>TUESDAY</h3>
<div>
<div id="wb_Text3" style="position:absolute;left:23px;top:24px;width:85px;height:16px;z-index:4;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">No of classes</span></div>
<select name="m3" size="1" id="Combobox3" style="position:absolute;left:120px;top:23px;width:44px;height:21px;z-index:5;" title="No of Class">
<option selected value="0">0</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
</select>
<div id="wb_Text4" style="position:absolute;left:189px;top:25px;width:85px;height:16px;z-index:6;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">No of labs</span></div>
<select name="m4" size="1" id="Combobox4" style="position:absolute;left:263px;top:23px;width:48px;height:21px;z-index:7;" title="No of Labs">
<option selected value="0">0</option>
<option value="1">1</option>
<option value="2">2</option>
</select>
</div>
<h3>WEDNESDAY</h3>
<div>
<div id="wb_Text6" style="position:absolute;left:189px;top:24px;width:85px;height:16px;z-index:8;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">No of labs</span></div>
<div id="wb_Text5" style="position:absolute;left:28px;top:24px;width:85px;height:16px;z-index:9;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">No of classes</span></div>
<select name="m5" size="1" id="Combobox5" style="position:absolute;left:127px;top:23px;width:44px;height:21px;z-index:10;" title="No of Class">
<option selected value="0">0</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
</select>
<select name="m6" size="1" id="Combobox6" style="position:absolute;left:265px;top:22px;width:48px;height:21px;z-index:11;" title="No of Labs">
<option selected value="0">0</option>
<option value="1">1</option>
<option value="2">2</option>
</select>
</div>
<h3>THURSDAY</h3>
<div>
<div id="wb_Text7" style="position:absolute;left:25px;top:23px;width:85px;height:16px;z-index:12;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">No of classes</span></div>
<select name="m7" size="1" id="Combobox7" style="position:absolute;left:122px;top:22px;width:44px;height:21px;z-index:13;" title="No of Class">
<option selected value="0">0</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
</select>
<div id="wb_Text8" style="position:absolute;left:190px;top:24px;width:85px;height:16px;z-index:14;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">No of labs</span></div>
<select name="m8" size="1" id="Combobox8" style="position:absolute;left:265px;top:23px;width:48px;height:21px;z-index:15;" title="No of Labs">
<option selected value="0">0</option>
<option value="1">1</option>
<option value="2">2</option>
</select>
</div>
<h3>FRIDAY</h3>
<div>
<div id="wb_Text9" style="position:absolute;left:19px;top:23px;width:85px;height:16px;z-index:16;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">No of classes</span></div>
<select name="m9" size="1" id="Combobox9" style="position:absolute;left:116px;top:19px;width:44px;height:21px;z-index:17;" title="No of Class">
<option selected value="0">0</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
</select>
<div id="wb_Text10" style="position:absolute;left:183px;top:23px;width:85px;height:16px;z-index:18;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">No of labs</span></div>
<select name="m10" size="1" id="Combobox10" style="position:absolute;left:254px;top:20px;width:48px;height:21px;z-index:19;" title="No of Labs">
<option selected value="0">0</option>
<option value="1">1</option>
<option value="2">2</option>
</select>
</div>
<h3>SATURDAY</h3>
<div>
<div id="wb_Text11" style="position:absolute;left:33px;top:22px;width:85px;height:16px;z-index:20;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">No of classes</span></div>
<div id="wb_Text12" style="position:absolute;left:191px;top:22px;width:73px;height:16px;z-index:21;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">No of labs:</span></div>
<select name="m11" size="1" id="Combobox11" style="position:absolute;left:126px;top:21px;width:44px;height:21px;z-index:22;" title="No of Class">
<option selected value="0">0</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
</select>
<select name="m12" size="1" id="Combobox12" style="position:absolute;left:269px;top:21px;width:48px;height:21px;z-index:23;" title="No of Labs">
<option selected value="0">0</option>
<option value="1">1</option>
<option value="2">2</option>
</select>
</div>
</div>
</div>
<input type="submit" id="jQueryButton1" name="NEXT" value="NEXT" style="position:absolute;left:309px;top:539px;width:100px;height:52px;z-index:25;">
</form>
</body>
</html>