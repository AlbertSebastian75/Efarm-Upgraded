
<?php

$txt6=$_GET['supplier_id'];

$host="localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "alb";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);


if (mysqli_connect_error()) {
		die('Connect error('. mysqli_connect_error().')'. mysqli_connect_error());
	}


else{
    $sql="UPDATE supplier set `status`=1 where supplier_id=$txt6";
	
	if($conn->query($sql)) {
		header("Location:view_supplier.php");
	}

	else{
		echo "Error: ".$sql."<br>".$conn->error;
	}
	$conn->close();

}
?>