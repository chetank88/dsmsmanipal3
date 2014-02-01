<?php
    
  include 'core.inc.php';
   require 'header.php';
      if(!loggedin())
     {
       header('Location: index.php');
     }
     
?>

<html>
<head>
<style>
ul#menu, ul.submenu{
    margin: 0;
    padding: 0;
    list-style: none;
}
ul#menu li{
    float: left;
}
/* hide the submenu */
li ul.submenu {
    display: none;
}
ul#menu li a{
    display: block;
    text-decoration: none;
    color: #ffffff;
    padding: 7px 14px;
    background:black;
    border-right: 1px solid white;
    border-top: 1px solid white;
    float:none;
}
/* show the submenu */
ul#menu li:hover ul.submenu{
    display: block;
    position: absolute;
    float:left;
}
ul#menu li:hover li,  ul#menu li:hover a {
    float: none;
    background: Red;
}
ul#menu li:hover li a:hover {
    background: brown;

}
</style>
</head>
 
<body>


<ul id="menu">
<li><a href="#">Meeting</a>
    <ul class="submenu">
      
    </ul>
</li>
</ul>
 
</body>
</html>