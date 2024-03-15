
<?php

$txt2=$_GET['vendor_prod_id'];

date_default_timezone_set("Asia/Kolkata");
$txt5=date('y-m-d H:i:s');

$host="localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "alb";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()) {
		die('Connect error('. mysqli_connect_error().')'. mysqli_connect_error());
	}
	

    else{
        $sql="UPDATE vendor_product set `status`='9', `proc_date`='$txt5' where `vendor_prod_id`='$txt2' and `status`='10'";
        
        if($conn->query($sql)) {
            header("Location:view_previous_admin_request.php");
        }
    
        else{
            echo "Error: ".$sql."<br>".$conn->error;
        }
        $conn->close();
    
    }


?>