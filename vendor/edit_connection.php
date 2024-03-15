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
			
    		$txt1=$_POST['vendorid'];
    		$txt2=$_POST['fullname'];
    		$txt3=$_POST['companyname'];
    		$txt4=$_POST['address'];
    		$txt5=$_POST['mobile'];
    		$txt6=$_POST['password'];
    		
			$sql="UPDATE vendor SET `fullname`='$txt2', companyname='$txt3', `address`='$txt4', `mobile`='$txt5', `password`='$txt6' where vendorid='$txt1'";

			$checkUser = "SELECT * from vendor where vendorid='$txt1'";
			$result=mysqli_query($conn, $checkUser);
			$count = mysqli_num_rows($result);
			if($count == 0){
				die("Invalid ID");
			}
			
            if($conn->query($sql)) {
				header('Location: vendor_account.php');
            }
            else{
                echo "Error: ".$sql."<br>".$conn->error;
            }
        }
?>