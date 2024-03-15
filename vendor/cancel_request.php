<?php

$vendor_prod_id=$_GET['vendor_prod_id'];

$host="localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "alb";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()) {
		die('Connect error('. mysqli_connect_error().')'. mysqli_connect_error());
	}

else{

    $sql="DELETE FROM vendor_product where vendor_prod_id='$vendor_prod_id'";
	
	if($conn->query($sql)) {
		session_start();
		$_SESSION['tmp12']="Request Cancelled successfully.";
		header('Location:my_request.php');
	}
	else{
		echo "Error: ".$sql."<br>".$conn->error;
	}
	$conn->close();
}
?>