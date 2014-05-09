
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
		 echo' <input type="text" placeholder="class descrption" name="n'.$GLOBALS['j']++.'"/>';
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
	 
	      for($i=0;$i<$val2;$i++)
          {
		  echo '
		  <input type="text" placeholder="Lab desrption" name="n'.$GLOBALS['j']++.'"/>
	      <br />
		  <select name=n'.$GLOBALS['j']++.'>
		  <option  selected="selected" value=2>8:30-11:30</option>
		  <option value=13>2:00-5:00</option>	 
		  </select><br /><br />';
          }
  }
  
 ?>
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
    
#jQueryAccordion2 .ui-accordion-header
{
   font-family: Arial;
   font-size: 13px;
   font-weight: normal;
   font-style: normal;
   padding: 10px 10px 10px 30px;
}
#jQueryAccordion2 h3
{
   display: block;
}
#jQueryAccordion2 .ui-accordion-header .ui-icon
{
   left: 10px;
}
#jQueryAccordion2 .ui-accordion-content
{
   padding: 0 0 0 0;
   position: relative;
}
    
#jQueryAccordion3 .ui-accordion-header
{
   font-family: Arial;
   font-size: 13px;
   font-weight: normal;
   font-style: normal;
   padding: 10px 10px 10px 30px;
}
#jQueryAccordion3 h3
{
   display: block;
}
#jQueryAccordion3 .ui-accordion-header .ui-icon
{
   left: 10px;
}
#jQueryAccordion3 .ui-accordion-content
{
   padding: 0 0 0 0;
   position: relative;
}
    
#jQueryAccordion4 .ui-accordion-header
{
   font-family: Arial;
   font-size: 13px;
   font-weight: normal;
   font-style: normal;
   padding: 10px 10px 10px 30px;
}
#jQueryAccordion4 h3
{
   display: block;
}
#jQueryAccordion4 .ui-accordion-header .ui-icon
{
   left: 10px;
}
#jQueryAccordion4 .ui-accordion-content
{
   padding: 0 0 0 0;
   position: relative;
}

#jQueryAccordion5 .ui-accordion-header
{
   font-family: Arial;
   font-size: 13px;
   font-weight: normal;
   font-style: normal;
   padding: 10px 10px 10px 30px;
}
#jQueryAccordion5 h3
{
   display: block;
}
#jQueryAccordion5 .ui-accordion-header .ui-icon
{
   left: 10px;
}
#jQueryAccordion5 .ui-accordion-content
{
   padding: 0 0 0 0;
   position: relative;
}                
    
#jQueryAccordion6 .ui-accordion-header
{
   font-family: Arial;
   font-size: 13px;
   font-weight: normal;
   font-style: normal;
   padding: 10px 10px 10px 30px;
}
#jQueryAccordion6 h3
{
   display: block;
}
#jQueryAccordion6 .ui-accordion-header .ui-icon
{
   left: 10px;
}
#jQueryAccordion6 .ui-accordion-content
{
   padding: 0 0 0 0;
   position: relative;
}               
        
</style>
<script type="text/javascript" src="cupertino/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="cupertino/jquery.ui.core.min.js"></script>
<script type="text/javascript" src="cupertino/jquery.ui.widget.min.js"></script>
<script type="text/javascript" src="cupertino/jquery.ui.accordion.min.js"></script>
<script type="text/javascript" src="cupertino/jquery.ui.effect.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
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

        var jQueryAccordion2Opts =
       {
           event: 'click',
           animate: 'easeInOutSine',
           active: false,
           collapsible: true,
           header: 'h3',
           heightStyle: 'fill'
       };
        $("#jQueryAccordion2_id").accordion(jQueryAccordion2Opts);

        var jQueryAccordion3Opts =
       {
           event: 'click',
           animate: 'easeInOutSine',
           active: false,
           collapsible: true,
           header: 'h3',
           heightStyle: 'fill'
       };
        $("#jQueryAccordion3_id").accordion(jQueryAccordion3Opts);


        var jQueryAccordion4Opts =
       {
           event: 'click',
           animate: 'easeInOutSine',
           active: false,
           collapsible: true,
           header: 'h3',
           heightStyle: 'fill'
       };
        $("#jQueryAccordion4_id").accordion(jQueryAccordion4Opts);

        var jQueryAccordion5Opts =
       {
           event: 'click',
           animate: 'easeInOutSine',
           active: false,
           collapsible: true,
           header: 'h3',
           heightStyle: 'fill'
       };
        $("#jQueryAccordion5_id").accordion(jQueryAccordion5Opts);


        var jQueryAccordion6Opts =
       {
           event: 'click',
           animate: 'easeInOutSine',
           active: false,
           collapsible: true,
           header: 'h3',
           heightStyle: 'fill'
       };
        $("#jQueryAccordion6_id").accordion(jQueryAccordion6Opts);
    });
</script>
</head>
<body>
<form name="input" action="databaseEntry.php" method="post">
  
<div id="jQueryAccordion1" style="position:absolute;left:11px;top:185px;width:189px;height:388px;z-index:0;">
<div id="jQueryAccordion1_id" style="position:absolute;width:189px;height:288px">
<h3>MONDAY</h3>
<div>
     <?php
             display($_POST['m1'],$_POST['m2'],1);  
     ?>
</div>
</div>
</div>
<div id="jQueryAccordion2" style="position:absolute;left:252px;top:185px;width:189px;height:388px;z-index:1;">
<div id="jQueryAccordion2_id" style="position:absolute;width:189px;height:288px">
<h3>TUESDAY</h3>
<div>
      <?php
            display($_POST['m3'],$_POST['m4'],2);  
      ?>
</div>
</div>
</div>
<div id="jQueryAccordion3" style="position:absolute;left:481px;top:185px;width:189px;height:388px;z-index:2;">
<div id="jQueryAccordion3_id" style="position:absolute;width:189px;height:288px">
<h3>WEDNESDAY</h3>
<div>
    <?php
            display($_POST['m5'],$_POST['m6'],3);  
    ?>
</div>
</div>
</div>
<div id="jQueryAccordion4" style="position:absolute;left:721px;top:185px;width:189px;height:388px;z-index:3;">
<div id="jQueryAccordion4_id" style="position:absolute;width:189px;height:288px">
<h3>THURSDAY</h3>
<div>
    <?php
            display($_POST['m7'],$_POST['m8'],4);  
    ?>
</div>
</div>
</div>
<div id="jQueryAccordion5" style="position:absolute;left:941px;top:185px;width:189px;height:388px;z-index:4;">
<div id="jQueryAccordion5_id" style="position:absolute;width:189px;height:288px">
<h3>FRIDAY</h3>
<div>
    <?php
            display($_POST['m9'],$_POST['m10'],5);  
    ?>
</div>
</div>
</div>
<div id="jQueryAccordion6" style="position:absolute;left:1160px;top:185px;width:189px;height:388px;z-index:5;">
<div id="jQueryAccordion6_id" style="position:absolute;width:189px;height:288px">
<h3>SATURDAY</h3>
<div>
    <?php
            display($_POST['m11'],$_POST['m12'],6);  
    ?>
     <input type="submit" value="Create time table">
</div>
</div>
</div>
</form>
</body>
</html>