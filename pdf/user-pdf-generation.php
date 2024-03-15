<?Php

$host="localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "alb";
$dbo = new mysqli($host, $dbusername, $dbpassword, $dbname);

$sales_id=$_GET['sales_id'];

//SQL to get 10 records
$sql="select * from sales where sales_id=$sales_id";
require('fpdf.php');
$pdf = new FPDF(); 
$pdf->AddPage();

$width_cell=array(50,125,60,40,40);

$pdf->SetFont('Arial','B',64);
//Background color of header//
$pdf->SetFillColor(193,229,252);
$pdf->Cell($width_cell[0]);
$pdf->Cell($width_cell[1],20,'EFARM',1,1,'C');
$pdf->SetFont('Arial','B',32);
//Background color of header//
$pdf->SetFillColor(193,229,252);
$pdf->Cell($width_cell[0]);
$pdf->Cell($width_cell[1],15,'DELIVERY DETAILS',1,1,'C',true);
$pdf->Cell($width_cell[1],15,'    ',0,1,'C',false);

/*
// Header starts /// 
//First header column //
$pdf->Cell($width_cell[0],10,'ID',1,0,'C',true);
//Second header column//
$pdf->Cell($width_cell[1],10,'NAME',1,0,'C',true);
//Third header column//
$pdf->Cell($width_cell[2],10,'CLASS',1,0,'C',true); 
//Fourth header column//
$pdf->Cell($width_cell[3],10,'MARK',1,0,'C',true);
//Third header column//
$pdf->Cell($width_cell[4],10,'GENDER',1,1,'C',true); 
//// header ends ///////
*/
$width_cell=array(50,50,40,40,40);

$pdf->SetFont('Arial','',14);
//Background color of header//
$pdf->SetFillColor(235,236,236); 
//to give alternate background fill color to rows// 
$fill=false;

/// each record is one row  ///
foreach ($dbo->query($sql) as $row) {
    
$fill = !$fill;
$pdf->Cell($width_cell[0],10,'ORDER ID',1,0,'L',false);
$pdf->Cell($width_cell[1],10,$row['sales_id'],0,1,'C',$fill);
//$pdf->Cell($width_cell[0],10,'USER ID',0,0,'L',false);
//$pdf->Cell($width_cell[1],10,$row['users_id'],0,1,'C',$fill);

$sql3="select * from users where users_id=$row[users_id]";
foreach ($dbo->query($sql3) as $row3) {


    $pdf->Cell($width_cell[0],10,'Quantity',0,0,'L',false);
    $pdf->Cell($width_cell[0],10,$row['qty'],0,1,'C',$fill);
    $pdf->Cell($width_cell[0],10,'Order Date',0,0,'L',false); 
    $pdf->Cell($width_cell[0],10,$row['date'],0,1,'C',$fill);
    $pdf->Cell($width_cell[0],10,'Processing Date',0,0,'L',false); 
    $pdf->Cell($width_cell[0],10,$row['proc_date'],0,1,'C',$fill);
    $pdf->Cell($width_cell[0],10,'Delivery Date',0,0,'L',false); 
    $pdf->Cell($width_cell[0],10,$row['delivery_date'],0,1,'C',$fill);
    $pdf->Cell($width_cell[0],10,' Review',0,0,'L',false); 
    $pdf->Cell($width_cell[0],10,$row['review'],0,1,'C',$fill);
    $pdf->Cell($width_cell[0],10,'Amount',0,0,'L',false); 
    $pdf->Cell($width_cell[0],10,'Rs.'.$row['total'],0,1,'C',$fill);


    $pdf->Cell($width_cell[1],20,'    ',0,1,'C',false);


    $pdf->Cell($width_cell[0],10,'USER ID',1,0,'L',false);
    $pdf->Cell($width_cell[1],10,$row['users_id'],0,1,'C',$fill);
    $pdf->Cell($width_cell[0],10,'Name',0,0,'L',false);
    $pdf->Cell($width_cell[0],10,$row3['firstname'],0,0,'C',$fill);
    $pdf->Cell($width_cell[0],10,$row3['lastname'],0,1,'L',$fill);
    $pdf->Cell($width_cell[0],10,'Email ID',0,0,'L',false);
    $pdf->Cell($width_cell[0],10,$row3['email'],0,1,'C',$fill);
    $pdf->Cell($width_cell[0],10,'Mobile',0,0,'L',false);
    $pdf->Cell($width_cell[0],10,$row3['mobile'],0,1,'C',$fill);
    $pdf->Cell($width_cell[0],10,'Address',0,1,'L',false);


    $pdf->Cell($width_cell[0],10,'          ',0,0,'C',false);
    $pdf->Cell($width_cell[2],10,$row3['adr'],0,1,'C',$fill);
    $pdf->Cell($width_cell[0],10,'          ',0,0,'C',false);
    $pdf->Cell($width_cell[1],10,$row3['district'],0,1,'C',$fill);
    $pdf->Cell($width_cell[0],10,'          ',0,0,'C',false);
    $pdf->Cell($width_cell[0],10,$row3['city'],0,1,'C',$fill);
    $pdf->Cell($width_cell[0],10,'          ',0,0,'C',false);
    $pdf->Cell($width_cell[0],10,$row3['country'],0,1,'C',$fill);
    $pdf->Cell($width_cell[0],10,'          ',0,0,'C',false);
    $pdf->Cell($width_cell[0],10,$row3['state'],0,1,'C',$fill);
}

$pdf->Cell($width_cell[2],20,'    ',0,1,'C',false);

$pdf->Cell($width_cell[0],10,'ITEM ID',1,0,'L',false); 
$pdf->Cell($width_cell[2],10,$row['items_id'],0,1,'C',$fill);

$sql2="select * from items where items_id=$row[items_id]";
foreach ($dbo->query($sql2) as $row2) {
    $pdf->Cell($width_cell[0],10,'Product Name',0,0,'L',false);
    $pdf->Cell($width_cell[2],10,$row2['name'],0,1,'C',$fill);
    $pdf->Cell($width_cell[0],10,'Brand',0,1,'L',false);


    $pdf->Cell($width_cell[0],10,'          ',0,0,'C',false);

    
    $pdf->Cell($width_cell[2],10,$row2['brand'],0,1,'C',$fill);
    $pdf->Cell($width_cell[0],10,'Description',0,1,'L',false);


    $pdf->Cell($width_cell[0],15,'          ',0,0,'C',false);

    
    $pdf->Cell($width_cell[2],10,$row2['description'],0,1,'C',$fill);
    $pdf->Cell($width_cell[0],10,'Types',0,0,'L',false);
    $pdf->Cell($width_cell[2],10,$row2['types'],0,1,'C',$fill);
    $pdf->Cell($width_cell[0],10,'Prize',0,0,'L',false);
    $pdf->Cell($width_cell[2],10,$row['total']/$row['qty'],0,1,'C',$fill);
}

$pdf->Cell($width_cell[1],15,'    ',0,1,'C',false);

$pdf->Cell($width_cell[0],10,'SUPPLIER ID',1,0,'C',false); 
$pdf->Cell($width_cell[2],10,$row['supplier'],0,1,'C',$fill);

$sql1="select * from supplier where supplier_id=$row[supplier]";
foreach ($dbo->query($sql1) as $row1) {
    $pdf->Cell($width_cell[0],10,'Supplier Name',0,0,'L',false);
    $pdf->Cell($width_cell[2],10,$row1['name'],0,1,'C',$fill);
    $pdf->Cell($width_cell[0],10,'Email',0,0,'L',false);
    $pdf->Cell($width_cell[2],10,$row1['email'],0,1,'C',$fill);
    $pdf->Cell($width_cell[0],10,'Mobile',0,0,'L',false);
    $pdf->Cell($width_cell[2],10,$row1['mobile'],0,1,'C',$fill);
}



}
/// end of records /// 

$pdf->Output();
?>