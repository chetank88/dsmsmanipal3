<?php
require('fpdf.php');

function pdfgenerator($mid,$uid)
{
     include 'connect.inc.php'; 
    $pdf =  new FPDF('P', 'mm', 'A4' );
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(5,10,'Summary For the Meeting No.'.$mid);
    
    $sql_select="SELECT * FROM  Meeting WHERE mid={$mid}";
     $stmt=$connHar->query($sql_select);
     $registrants=$stmt->fetchAll();
     foreach($registrants as $registrant)
     {
           
          $title=$registrant['tytle'];
            $info=$registrant['otherinfo'];
            $datem=$registrant['date'];
            $timem=$registrant['time'];
            $sum=$registrant['sum'];
     }
     
$pdf->setY(20);
$pdf->Cell(40,10,'Title:'.$title,0,1,'L');
$pdf->setY(30);
$pdf->Cell(40,10,'date:'.$datem,0,1,'L');
$pdf->setY(40);
$pdf->Cell(40,10,'Time:'.$timem,0,1,'L');
$pdf->setY(50);
$pdf->Cell(40,10,'Info:',0,1,'L');
$pdf->setY(60);
 $pdf->MultiCell(0,5,$info);


     $sql_select="SELECT * FROM  People WHERE uid={$uid}";
     $stmt=$connHar->query($sql_select);
     $registrants=$stmt->fetchAll();

      foreach($registrants as $registrant)
     {
          $crby=$registrant['Name'];
          $deg=$registrant['Designation'];
      }
      $pdf->setY(100);
      $pdf->Cell(40,10,'Created By:'.$crby,0,1,'L');
      $pdf->setY(110);
       $pdf->Cell(40,10,$deg,0,1,'L');
      $sql_select="select Name,Designation,attendence from Meeting_Att,People where mid='{$mid}' and uid=attid";
            $stmt=$connHar->query($sql_select);
             $registrants=$stmt->fetchAll();
      
                $y=110;
                            
        foreach($registrants as $registrant) {
         if($registrant['attendence'])
         {
             $y=$y+10;
        $pdf->setY($y);
$pdf->Cell(40,10,'Title:'.$registrant['Name'],0,1,'L');
 $y=$y+10;
        $pdf->setY($y);
$pdf->Cell(40,10,$registrant['Designation'],0,1,'L');
 $y=$y+10;
    $pdf->setY($y);
$pdf->Cell(40,10,'Attendence:'."Attended",0,1,'L');
            
              
            
        
       
         } 
         else
         {
                        $y=$y+10;
        $pdf->setY($y);
$pdf->Cell(40,10,'Title:'.$registrant['Name'],0,1,'L');
 $y=$y+10;
        $pdf->setY($y);
$pdf->Cell(40,10,$registrant['Designation'],0,1,'L');
 $y=$y+10;
    $pdf->setY($y);
$pdf->Cell(40,10,'Attendence:'."Not Attended",0,1,'L');
         }           
         
             
        }
  

        $y=$y+10;
          $pdf->setY($y);
$pdf->Cell(40,10,'Summary:',0,1,'L');
  $y=$y+10;
     $pdf->setY($y);
 $pdf->MultiCell(0,5,$sum);



ob_end_clean();
$pdf->Output();

}
?>
