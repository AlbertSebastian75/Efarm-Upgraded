<?php

$txt6=$_GET['vendorid'];

$host="localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "alb";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);


if (mysqli_connect_error()) {
		die('Connect error('. mysqli_connect_error().')'. mysqli_connect_error());
	}


else{
    $sql="DELETE FROM vendor where vendorid='$txt6'";
	
	if($conn->query($sql)) {
		header("Location:view_vendor.php");
	}

	else{
		echo "Error: ".$sql."<br>".$conn->error;
	}
	$conn->close();

}
?>