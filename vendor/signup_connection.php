<?php

$txt1=filter_input(INPUT_POST, 'fullname');
$txt2=filter_input(INPUT_POST, 'companyname');
$txt3=filter_input(INPUT_POST, 'email');
$txt4=filter_input(INPUT_POST, 'address');
$txt5=filter_input(INPUT_POST, 'mobile');
$txt6=filter_input(INPUT_POST, 'password');

$host="localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "alb";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);


if (mysqli_connect_error()) {
		die('Connect error('. mysqli_connect_error().')'. mysqli_connect_error());
	}
else{

	$checkUser = "SELECT * from vendor where email='$txt3'";
	$result=mysqli_query($conn, $checkUser);
	$count = mysqli_num_rows($result);

	if($count > 0){
			session_start();
			$_SESSION['tmp10']="User Exists!";
			header('Location: signup.php');
	}


else{
	$sql="INSERT INTO `vendor`(`fullname`,companyname,`email`,`address`, mobile,`password`,`status`)
	values('$txt1','$txt2','$txt3','$txt4','$txt5','$txt6',0)";
	
	if ($conn->query($sql)) {
		session_start();
		$_SESSION['tmp10']="Thank you for your Registration. Your Registration Request is sent to the Admin Panel,<br> Wait for the Approval.";
		header('Location: signup.php');

	}
	else{
		echo "Error: ".$sql."<br>".$conn->error;
	}
	$conn->close();
}


}

?>