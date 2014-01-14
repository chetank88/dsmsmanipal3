<?php
  require 'core.inc.php';
  echo $http_referer;
  session_destroy();
  header('Location: index.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
        
    </body>
</html>
