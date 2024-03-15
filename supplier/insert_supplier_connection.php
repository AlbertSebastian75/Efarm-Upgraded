<?php

$txt1=filter_input(INPUT_POST, 'name');
$txt3=filter_input(INPUT_POST, 'email');
$txt2=filter_input(INPUT_POST, 'aadhar');
$txt4=filter_input(INPUT_POST, 'mobile');
$txt5=filter_input(INPUT_POST, 'password');
$txt6=filter_input(INPUT_POST, 'adr');
$txt7=filter_input(INPUT_POST, 'location');
$txt11=filter_input(INPUT_POST, 'states');
$txt12=filter_input(INPUT_POST, 'district');
$txt13=filter_input(INPUT_POST, 'city');
$txt14=filter_input(INPUT_POST, 'country');

$host="localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "alb";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);


if (mysqli_connect_error()) {
		die('Connect error('. mysqli_connect_error().')'. mysqli_connect_error());
	}
else{

	$checkUser = "SELECT * from supplier where email='$txt3'";
	$result=mysqli_query($conn, $checkUser);
	$count = mysqli_num_rows($result);
	if($count > 0){
		session_start();
		//echo"User exist";
		$_SESSION['tmp10']="User Exists!";
		header('Location: insert_supplier.php');
	}


else{
	$sql="INSERT INTO `supplier`(`name`,email,`aadhar`,`address` , mobile,`password`,`status`,`location`,`state`, district, city, country)
	values('$txt1','$txt3','$txt2','$txt6', '$txt4','$txt5', 0, '$txt7', '$txt11', '$txt12', '$txt13', '$txt14')";
	if ($conn->query($sql)) {
		session_start();
		$_SESSION['tmp10']="Thank you for your Registration. Your Registration Request is sent to the Admin Panel,<br> Wait for the Approval.";
		header('Location: insert_supplier.php');
	}
	else{
		echo "Error: ".$sql."<br>".$conn->error;
	}
	$conn->close();
}
}

?>