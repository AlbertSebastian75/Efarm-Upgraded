<?php 
session_start(); 
$supplier_id= $_SESSION['supplier_id']; 
$sales_id=$_GET['sales_id'];

date_default_timezone_set("Asia/Kolkata");
$req_date=date('y-m-d H:i:s');

$host="localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "alb";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()) {
        die('Connect error('. mysqli_connect_error().')'. mysqli_connect_error());
    } 

$sql="UPDATE sales SET `supplier`='$supplier_id', `req_date`='$req_date', `status`='1' where sales_id='$sales_id'";

if($conn->query($sql)) {
    //header('Location: supplier_account.php');
    //echo "success";
    $_SESSION['tmp']="Your Request Send Succesfully!";
	header('Location: supplier_home.php');
}
else{
    echo "Error: ".$sql."<br>".$conn->error;
}
?>