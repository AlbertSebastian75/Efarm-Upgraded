<?php

$host="localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "alb";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()) { 
    die('Connect error('. mysqli_connect_error().')'. mysqli_connect_error());
}
    
$vendor_prod_id=$_POST['vendor_prod_id'];
date_default_timezone_set("Asia/Kolkata");
$txt5=date('y-m-d H:i:s');   

$sql="UPDATE vendor_product set `delivery_date`='$txt5', `status`=3 where vendor_prod_id=$vendor_prod_id";
	
if($conn->query($sql)) {
    header("Location:view_vendor_product_approve.php");
}

else{
    echo "Error: ".$sql."<br>".$conn->error;
}
$conn->close();
?>