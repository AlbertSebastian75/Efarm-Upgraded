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
    	//	$txt2=$_POST['location'];
    		$txt3=$_POST['name'];
    		$txt4=$_POST['mobile'];
    		$txt5=$_POST['address'];
    		$txt6=$_POST['city'];
    		$txt7=$_POST['district'];
    		$txt8=$_POST['state'];
    		$txt10=$_POST['password'];
    		
			$sql="UPDATE supplier SET `name`='$txt3', mobile='$txt4', `address`='$txt5', `city`='$txt6', district='$txt7', `password`='$txt10' where supplier_id='$txt1'";

			$checkUser = "SELECT * from supplier where supplier_id='$txt1'";
			$result=mysqli_query($conn, $checkUser);
			$count = mysqli_num_rows($result);
			if($count == 0){
				die("Invalid ID");
			}
			
            if($conn->query($sql)) {
				header('Location: supplier_account.php');
            }
            else{
                echo "Error: ".$sql."<br>".$conn->error;
            }
        }
?>