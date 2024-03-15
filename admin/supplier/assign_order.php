<?php 
session_start(); 
   $supplier_idd= $_POST['supplier_idd']; 
   $sales_id=$_POST['sales_id'];

  date_default_timezone_set("Asia/Kolkata");
  $supplier_date=date('y-m-d H:i:s');

$host="localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "alb";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()) {
        die('Connect error('. mysqli_connect_error().')'. mysqli_connect_error());
    } 

$sql="UPDATE sales SET `supplier`='$supplier_idd', `supplier_date`='$supplier_date', `status`='2' where sales_id='$sales_id'";

if($conn->query($sql)) {
    header('Location: ../admin_home.php');
    //echo "success";
}
else{
    echo "Error: ".$sql."<br>".$conn->error;
}
?>