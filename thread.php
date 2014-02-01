<?php
     error_reporting(E_ALL); 
  ini_set('display_errors',1); 
echo 'check';
class Task1 extends Thread {
    public function __construct($disp) {
        $this->params = $disp;
    }
  
    /* ... */
  
    public function run() {

       echo 'bye';
       
    }
}
 
class Task2 extends Thread {
    public function __construct($disp) {
        $this->params=$disp;
    }
  
    /* ... */
  
    public function run(){
        echo $this->params;
    }
}

$tasks    = array();
$tasks[0] = new Task1("how are u");
$tasks[1] = new Task2("hi");
/* ... */
 
foreach ($tasks as $id => $task) {
    $task->start();
}
 
/* ... */
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
