<?php
session_start();
$txt1=filter_input(INPUT_POST, 'vendorid');
$txt2=filter_input(INPUT_POST, 'items_id');
$txt3=filter_input(INPUT_POST, 'prize');
$txt4=filter_input(INPUT_POST, 'qty');

date_default_timezone_set("Asia/Kolkata");
$txt5=date('y-m-d H:i:s');

$host="localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "alb";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);


if (mysqli_connect_error()) {
		die('Connect error('. mysqli_connect_error().')'. mysqli_connect_error());
	}

else{
	$sql="INSERT INTO `vendor_product`(`vendorid`,items_id,`prize`,`qty`,`req_date`,`status`)
	values('$txt1','$txt2','$txt3','$txt4','$txt5',0)";
	
	if ($conn->query($sql)) {
		$_SESSION['tmp']="Thank you for your Application. Your Application Request is sent to the Admin Panel,<br> Wait for the Approval.";
		header('Location:my_request.php');
	}
	else{
		echo "Error: ".$sql."<br>".$conn->error;
	}
	$conn->close();
}

?>