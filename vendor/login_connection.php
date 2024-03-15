<?php
	session_start();

	$conn=mysqli_connect("localhost", "root", "", "alb");

	if(!$conn){
		die("Error: Failed to connect to database!");
	}

		$email = $_POST['email'];
		$password = $_POST['password'];

		$query = mysqli_query($conn, "SELECT * FROM `vendor` WHERE `email`='$email' && `password`='$password'") or die(mysqli_error());
		$fetch=mysqli_fetch_array($query);
		$count=mysqli_num_rows($query);
		if($count > 0){
			$status=$fetch['status'];
			if($status==1){
				$_SESSION['vendorid']=$fetch['vendorid'];
				$_SESSION['fullname']=$fetch['fullname'];
				header('Location:vendor_home.php');
			}
			else if($status==0){
				$_SESSION['tmp']="Your registeration request is pending!";
				header('Location: login.php');
			}
			else if($status==2){
				$_SESSION['tmp']="Your registeration request is rejected!";
				header('Location: login.php');
			}
		}

/*		$query0 = mysqli_query($conn, "SELECT * FROM `vendor` WHERE `email`='$email' && `password`='$password' && `status`=0") or die(mysqli_error());
		$fetch0=mysqli_fetch_array($query0);
		$count0=mysqli_num_rows($query0);
		if($count0 > 0){
			$_SESSION['fullname']=$fetch0['fullname'];
			$_SESSION['tmp']="Your registration request is pending!";
			header('Location: login.php');
		}

		$query1 = mysqli_query($conn, "SELECT * FROM `vendor` WHERE `email`='$email' && `password`='$password' && `status`=2") or die(mysqli_error());
		$fetch1=mysqli_fetch_array($query1);
		$count1=mysqli_num_rows($query1);
		if($count1 > 0){
			$_SESSION['fullname']=$fetch1['fullname'];
			$_SESSION['tmp']="Your registration request is Rejected!";
			header('Location: login.php');
		}
*/
		else{
			$_SESSION['tmp']="Invalid username or password!";
			header('Location: login.php');
		  }
?>