<?php
	session_start();

	$conn=mysqli_connect("localhost", "root", "", "alb");

	if(!$conn){
		die("Error: Failed to connect to database!");
	}

		$email = $_POST['email'];
		$password = $_POST['password'];

		$query = mysqli_query($conn, "SELECT * FROM `supplier` WHERE `email`='$email' && `password`='$password'") or die(mysqli_error());
		$fetch=mysqli_fetch_array($query);
		$count=mysqli_num_rows($query);
		if($count > 0){
			$status=$fetch['status'];
			if($status==1){
				 $_SESSION['supplier_id']=$fetch['supplier_id'];
				 $_SESSION['email']=$fetch['email'];
				 $_SESSION['name']=$fetch['name'];
				 $_SESSION['location']=$fetch['location'];
				 header('Location:supplier_home.php');
			}
			else if($status==0){
				$_SESSION['tmp']="Your registeration request is pending!";
				header('Location: login.php');
			}
			else if($status==2){
				$_SESSION['tmp']="Your registeration request is rejected!";
				header('Location: login.php');
			}			
			else if($status==3){
				$_SESSION['tmp']="Admin is considering your deletion request!";
				header('Location: login.php');
			}
		}

		else{
			$_SESSION['tmp']="Invalid username or password!";
			header('Location: login.php');
		  }
?>