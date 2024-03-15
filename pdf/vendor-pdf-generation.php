<?Php

$host="localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "alb";
$dbo = new mysqli($host, $dbusername, $dbpassword, $dbname);

$vendor_prod_id=$_GET['vendor_prod_id'];

//SQL to get 10 records
$sql="select * from vendor_product where vendor_prod_id=$vendor_prod_id";
require('fpdf.php');
$pdf = new FPDF(); 
$pdf->AddPage();

$width_cell=array(50,125,100,80,40);

$pdf->SetFont('Arial','B',64);
//Background color of header//
$pdf->SetFillColor(193,229,252);
$pdf->Cell($width_cell[0]);
$pdf->Cell($width_cell[1],20,'EFARM',1,1,'C');
$pdf->SetFont('Arial','B',32);
//Background color of header//
$pdf->SetFillColor(193,229,252);
$pdf->Cell($width_cell[0]);
$pdf->Cell($width_cell[1],15,'PURCHASE DETAILS',1,1,'C',true);
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
$pdf->Cell($width_cell[0],10,'VENDOR PRODUCT ID',1,0,'L',false);
$pdf->Cell($width_cell[1],10,$row['vendor_prod_id'],0,1,'C',$fill);
//$pdf->Cell($width_cell[0],10,'USER ID',0,0,'L',false);
//$pdf->Cell($width_cell[1],10,$row['users_id'],0,1,'C',$fill);



    $pdf->Cell($width_cell[0],10,'Price',0,0,'L',false);
    $pdf->Cell($width_cell[0],10, 'Rs.'.$row['prize'],0,1,'C',$fill);
    $pdf->Cell($width_cell[0],10,'Quantity Offered',0,0,'L',false); 
    $pdf->Cell($width_cell[0],10,$row['qty'],0,1,'C',$fill);
    $pdf->Cell($width_cell[0],10,'Quantity',0,0,'L',false); 
    $pdf->Cell($width_cell[0],10,$row['qty_need'],0,1,'C',$fill);
    $pdf->Cell($width_cell[0],10,'Total Amount',0,0,'L',false); 
    $pdf->Cell($width_cell[0],10,'Rs.'.$row['prize']*$row['qty_need'],0,1,'C',$fill);
    $pdf->Cell($width_cell[0],10,'Request Date',0,0,'L',false); 
    $pdf->Cell($width_cell[0],10,$row['req_date'],0,1,'C',$fill);
    $pdf->Cell($width_cell[0],10,'Processing Date',0,0,'L',false); 
    $pdf->Cell($width_cell[0],10,$row['proc_date'],0,1,'C',$fill);
    $pdf->Cell($width_cell[0],10,'Delivered Date',0,0,'L',false); 
    $pdf->Cell($width_cell[0],10,$row['delivery_date'],0,1,'C',$fill);


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
   // $pdf->Cell($width_cell[0],10,'Prize',0,0,'L',false);
   // $pdf->Cell($width_cell[2],10,$row2['price'],0,1,'C',$fill);
}

$pdf->Cell($width_cell[1],15,'    ',0,1,'C',false);

$pdf->Cell($width_cell[0],10,'vendor ID',1,0,'C',false); 
$pdf->Cell($width_cell[2],10,$row['vendorid'],0,1,'C',$fill);

$sql1="select * from vendor where vendorid=$row[vendorid]";
foreach ($dbo->query($sql1) as $row1) {
    $pdf->Cell($width_cell[0],10,'Vendor Name',0,0,'L',false);
    $pdf->Cell($width_cell[2],10,$row1['fullname'],0,1,'C',$fill);
    $pdf->Cell($width_cell[0],10,'Company',0,0,'L',false);
    $pdf->Cell($width_cell[2],10,$row1['companyname'],0,1,'C',$fill);
    $pdf->Cell($width_cell[0],10,'Email',0,0,'L',false);
    $pdf->Cell($width_cell[2],10,$row1['email'],0,1,'C',$fill);
    $pdf->Cell($width_cell[0],10,'Address',0,0,'L',false);
    $pdf->Cell($width_cell[2],10,$row1['address'],0,1,'C',$fill);
    $pdf->Cell($width_cell[0],10,'Mobile',0,0,'L',false);
    $pdf->Cell($width_cell[2],10,$row1['mobile'],0,1,'C',$fill);
}



}
/// end of records /// 

$pdf->Output();
?>