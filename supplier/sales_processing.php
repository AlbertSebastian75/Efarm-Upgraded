<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome | <?php echo $_SESSION['name'] ?></title>
</head>

</html>

<?php
$sales_id=$_GET['sales_id'];
date_default_timezone_set("Asia/Kolkata");
$proc_date=date('y-m-d H:i:s');

$host="localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "alb";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()) {
		die('Connect error('. mysqli_connect_error().')'. mysqli_connect_error());
	}
        

    $sql="UPDATE sales SET `proc_date`='$proc_date', `status`='3'where sales_id='$sales_id'"; 
    if($conn->query($sql)) {
        //header('Location: supplier_account.php');
        //echo "sucessss";
        $_SESSION['tmp']="The Order Reached Succesfully!";
	    header('Location:   processing.php');
    }
    else{
        echo "Error: ".$sql."<br>".$conn->error;
    }
?>