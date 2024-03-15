<?php

$host="localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "alb";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()) {
	die('Connect error('. mysqli_connect_error().')'. mysqli_connect_error());
}

 $items_id=$_POST['items_id'];
 $stock=$_POST['stock'];
 $stock_incr=$_POST['stock_incr']+$stock;

 $sql="UPDATE items SET  stock='$stock_incr' where items_id='$items_id'";

if ($conn->query($sql)) {
	header("Location:view_item.php");
}
else{
		echo "Error: ".$sql."<br>".$conn->error;
	}
	$conn->close();



?>