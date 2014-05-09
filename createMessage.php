<?php 
require 'core.inc.php';
require 'connect.inc.php'; 
require 'header.php';

if(!loggedin())
{
    header('Location: index.php');
}
?>
<style>
    span
{
    display:inline-block; 
    width:160px;
}
</style>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
 <link rel="stylesheet" href="js/chosen.css">
<div style="padding-top: 50px;">
<div class="row well ">
<div class="col-md-6">
<form method="post" name="form" id="form" class="form">
Create general message <br />
<input id="gm" name="gm"  type="text" />
<div>
<input type="submit" value="Submit" class="submit"/>
<span class="error" style="display:none"> Please Enter Valid Data</span>
<span class="success" style="display:none"> Registration Successfully</span>
</div></form>
</div>
<div class="col-md-6">
<form method="post" name="form" id="form" class="form">
Who's birthday?<br />
<input id ="bmsg" name="bmsg" type="text"/> 
<input id ="bdate" name="bdate" type="date"/>
    <br />
<input type="submit" value="Submit" class="submit2">
</form>
</div>
    </div>
<div class="row well">
<div class="col-md-4">
<form name="form" method="post" id="form">
<input type="text" id="emsg" name="emsg" placeholder="Event Title"/>
<input type="text" id="eplace" name="eplace" placeholder="Event Place"/>
<div>
<label for="meeting">Event Date : </label><input name="edate" id="edate" type="date"/>
</div>
<div>
<label for="meeting">Event Time : </label> <input name="etime" id="etime"type="time"/>
</div>
<input type="submit" value="Submit" class="submit3">
</form>
</div>
<div class="col-md-4">
Create Note
<form name="form" method="post" id="form">
<input type="text" name="note" id="note"/>
    <br />
<input type="submit" value="Submit" class="submit4">
</form>
</div>

<div class=" col-md-4">
  Create Note
<form name="form" method="post" id="form">
<input type="text" name="impmsg" id="impmsg"/>
<?php
try
{
$tsql="SELECT * FROM People WHERE uid <>'".$_SESSION['id']."';";
$stmt =$connHar->query($tsql); 
$periods=$stmt->fetchAll();
$num=count($periods);
if($num==0)
{}
else 
{
?>
    <br />

<select class="chosen-select" data-placeholder="Choose Names" multiple style="width:200px;" tabindex="4" name="rid[]">
<?php
foreach($periods as $period)
{?>
     <option value="<?php echo $period['uid']?>"><?php echo $period['Name'].' '.$period['Lname'];?></option>

<?php }

//echo $name = sqlsrv_get_field( $stmt, 0);

}
}
catch(Exception $e)
{
die(print_r($e));
}
?>
 </select>
 <br />  
<input type="submit" value="Submit" class="submit5">
</form>
    </div>
</div>
</div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
  <script src="js/chosen.jquery.js" type="text/javascript"></script>
  <script type="text/javascript">
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"5%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
  </script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/
libs/jquery/1.3.0/jquery.min.js">
</script>
<script type="text/javascript" >
$(function() {
$(".submit").click(function() {
var name = $("#gm").val();

if(name=='')
{
$('.success').fadeOut(200).hide();
$('.error').fadeOut(200).show();
}
else
{
var str=$("form").serializeArray();
str.push({name: 'check', value: 1});
$.ajax({
type: 'post',
url: 'messageDBentry.php',
data: str,
success: function () {
alert('message was submitted');
}
});
}
return false;
});
$(".submit2").click(function() {
var name = $("#bmsg").val();

if(name=='')
{
}
else
{
var str2=document.getElementById("bdate");
str3=str2.value;
var str=$("form").serializeArray();
str.push({name: 'stro', value: str3});
str.push({name: 'check', value: 2});
//$("#results").text(str2);
$.ajax({
type: 'post',
url: 'messageDBentry.php',
data:str,
success: function () {
alert('<?php echo "birthday";?> was submitted');
}
});
}
return false;
});
$(".submit3").click(function() {
var name = $("#emsg").val();
//alert("hi");
if(name=='')
{
}
else
{
var str2=document.getElementById("edate");
var str3=str2.value;
var str4=document.getElementById("etime");
var str5=str4.value;
var str=$("form").serializeArray();
str.push({name: 'stro', value: str3});
str.push({name: 'stro2', value: str5});
str.push({name: 'check', value: 3});
//alert(str);
$.ajax({
type: 'post',
url: 'messageDBentry.php',
data: str,
success: function () {
alert(' event was submitted');
}
});
}
return false;
});
$(".submit4").click(function() {
var name = $("#note").val();

if(name=='')
{
}
else
{
var str=$("form").serializeArray();
str.push({name: 'check', value: 4});
$.ajax({
type: 'post',
url: 'messageDBentry.php',
data: str,
success: function () {
alert('note was submitted');
}
});
}
return false;
});


    $(".submit5").click(function() {
var name = $("#impmsg").val();

if(name=='')
{

}
else
{
var str=$("form").serializeArray();
str.push({name: 'check', value: 5});
$.ajax({
type: 'post',
url: 'messageDBentry.php',
data: str,
success: function () {
alert(name);
}
});
}
return false;
});
});
</script>


