<?php
    if(($_SERVER["REQUEST_METHOD"] == "POST"))
    {
		$host="localhost";
		$dbusername = "root";
		$dbpassword = "";
		$dbname = "alb";
		
		$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
		
		
		if (mysqli_connect_error()) {
				die('Connect error('. mysqli_connect_error().')'. mysqli_connect_error());
			}
			
    		$txt1=$_POST['supplier_id'];

    		$sql="UPDATE supplier SET `status`=3 where supplier_id='$txt1'";

			if ($conn->query($sql)) {
				session_start();
				$_SESSION['tmp']="Your Respond Request is sent to the Admin Panel,<br> Wait for the Approval. Account is deactivated";
				header('Location: login.php');
			}
			else{
				echo "Error: ".$sql."<br>".$conn->error;
			}
    }
?>