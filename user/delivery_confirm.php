<?php 
session_start(); 
$sales_id=$_GET['sales_id'];

date_default_timezone_set("Asia/Kolkata");
$delivery_date=date('y-m-d H:i:s');

$host="localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "alb";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()) {
        die('Connect error('. mysqli_connect_error().')'. mysqli_connect_error());
    } 

$sql="UPDATE sales SET `status`='5' where sales_id='$sales_id'";

if($conn->query($sql)) {
    //header('Location: supplier_account.php');
   // echo "success";
		$_SESSION['tmp']="Delivery Confirmed Successfully!";
		header('Location: user_order.php');	
}
else{
    echo "Error: ".$sql."<br>".$conn->error;
}
?>