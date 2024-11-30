<?php
require('fpdf185\fpdf.php');
// Database Connection 
$conn = new mysqli('localhost', 'root', '', 'bbms');
//Check for connection error
if($conn->connect_error){
  die("Error in DB connection: ".$conn->connect_errno." : ".$conn->connect_error);    
}
 //Select data from MySQL database
 $select = "SELECT * FROM `contribution` ORDER BY id";
 $result = $conn->query($select);
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',14);
 while($row = $result->fetch_object()){
  //$id = $row->id;
    $name=$row->name;
    $address=$row->address;
    $mobile=$row->mobile;
    $email=$row->email;
    $amt=$row->amt;
  //$tracking_no=$row->tracking_no;
  //$name = $row->name;
  //$phone = $row->phone;
  //$pdf->Cell(10,10,$id,1);
  //$pdf->Cell(80,10,$name,1);
  //$pdf->Cell(50,10,$phone,1);
  //$pdf->Cell(50,10,$tracking_no,1);
  //$pdf->Ln();
  //set font to arial, bold, 14pt
//$pdf->SetFont('Arial','B',14);

//Cell(width , height , text , border , end line , [align] )

$pdf->Cell(130 ,5,'Blood Kinship',0,0);
$pdf->Cell(59 ,5,'INVOICE',0,1);//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);


$pdf->Cell(130 ,5,'Be the reason for someones happiness',0,0);
$pdf->Cell(59 ,5,'',0,1);//end of line

$pdf->Cell(130 ,5,'Mumbai',0,0);
$pdf->Cell(25 ,5,'Date & Time:',0,0);
$pdf->Cell(34 ,5,'04/03/2023',0,1);//end of line

$pdf->Cell(130 ,5,'Phone: 1234567897',0,0);
$pdf->Cell(25 ,5,'Invoice #',0,0);
$pdf->Cell(34 ,5,'[1234567]',0,1);//end of line

$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'User_ID:',0,0);
$pdf->Cell(34 ,5,'[501]',0,1);
///end of line

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line

//billing address
$pdf->Cell(100 ,5,'Receipt to:',0,1);//end of line

//add dummy cell at beginning of each line for indentation
$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,$name,0,1);

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,$address,0,1);

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,$email,0,1);

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,$mobile,0,1);


//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line

//invoice contents
$pdf->SetFont('Arial','B',12);

$pdf->Cell(130 ,5,'Description',1,0);
//$pdf->Cell(25 ,5,'Taxable',1,0);
$pdf->Cell(34 ,5,'Amount',1,1);//end of line

$pdf->SetFont('Arial','',12);

//Numbers are right-aligned so we give 'R' after new line parameter

$pdf->Cell(130 ,5,'$CGST',1,0);
//$pdf->Cell(25 ,5,'-',1,0);
$pdf->Cell(34 ,5,'0',1,1,'R');//end of line

$pdf->Cell(130 ,5,'$SGST',1,0);
//$pdf->Cell(25 ,5,'-',1,0);
$pdf->Cell(34 ,5,'0',1,1,'R');//end of line

$pdf->Cell(130 ,5,'Your contribution',1,0);
//$pdf->Cell(25 ,5,'-',1,0);
$pdf->Cell(34 ,5,$amt,1,1,'R');//end of line

//summary
$pdf->Cell(105 ,5,'',0,0);
$pdf->Cell(25 ,5,'Subtotal',1,0);
$pdf->Cell(7 ,5,'Rs.',1,0);
$pdf->Cell(27 ,5,$amt,1,1,'R');//end of line

//$pdf->Cell(130 ,5,'',0,0);
//$pdf->Cell(25 ,5,'Taxable',0,0);
//$pdf->Cell(4 ,5,'$',1,0);
//$pdf->Cell(30 ,5,'0',1,1,'R');//end of line

//$pdf->Cell(130 ,5,'',0,0);
//$pdf->Cell(25 ,5,'Tax Rate',0,0);
//$pdf->Cell(4 ,5,'$',1,0);
//$pdf->Cell(30 ,5,'10%',1,1,'R');//end of line

//$pdf->Cell(130 ,5,'',0,0);
//$pdf->Cell(25 ,5,'Total Due',0,0);
//$pdf->Cell(4 ,5,'$',1,0);
//$pdf->Cell(30 ,5,'4,450',1,1,'R');//end of line
}
$pdf->Output();
?>