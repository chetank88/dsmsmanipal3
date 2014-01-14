<?php
      require 'core.inc.php';
if(loggedin())
  {
      require 'connect.inc.php';  
 
      $fname=getuserfield('Fname',$conn1);
      echo 'You\'r logged in'.$fname.'<a href="logout.php">Log out</a>';
  }
  else
  {
      include 'loginform.inc.php';
  }
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
        <style>
  *{ 
     margin:0px; padding: 0px; 
   }
  body {
    background: #444;
  }
#navcon{background: #fff; width: 100%;}
#nav {
     font-family: arial, sans-serif;
     position: relative;
     width: 390px;
     height:56px;
     font-size:14px;
     color:#999;
     margin: 0px 0px;
}
 
#nav ul {
     list-style-type: none;

}
 
#nav ul li {
     float: left;
     position: relative;
}
 
#nav ul li a {
     text-align: center;
     border-right:1px solid #e9e9e9;
     padding:20px;
     display:block;
     text-decoration:none;
     color:#999;
}

#nav ul li a:hover{
      background:#12aeef;
     color:#ffffff;
}
 
#nav ul li ul {
     display: none
}
 
#nav ul li:hover ul {
     display: block;
     position: absolute;
}
 
#nav ul li:hover ul li a {
     display:block;
     background:#12aeef;
     color:#ffffff;
     width: 110px;
     text-align: right;
     border-bottom: 1px solid #f2f2f2;
     border-right: none;
}
 
#nav ul li:hover ul li a:hover {
     background:#6dc7ec;
     color:#fff;
}
.top {
border-top: 1px solid #f2f2f2;
}

.first {
border-left: 1px solid #e9e9e9;
}
</style>
</head>
<body>

<div id="navcon">
<div id="nav">
    <ul>
        <li class="first"><a href="#">Schedule</a>
        <ul>
            <li class="top"><a href="createSchedule.php">Create Schedule</a></li>
            <li><a href="timetable.php">View Schedule</a></li>
        </ul>
        </li>
    </ul>
</div>
</div>

</body>
</html>