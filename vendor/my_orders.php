
<!DOCTYPE html>
<html>
<head>
 <title><?php session_start(); echo $_SESSION['fullname']; ?> | My Orders</title>
 
 <style>
		body{
			background-image: url('../css/image/img5.jpeg');
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-size: cover;
		}
		a.a2{
    		text-decoration: underline;
 			  color: burlywood;
    		text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;
    		font-size: 75px;
		}
    a.a1{
        text-decoration: none;
        background-color:lavender;
        color:blue;
        font-size:20px;
        padding: 20px 35px;
        border-radius:12px;
        border:2px solid turquoise;
        margin:150px;
        line-height:85px;
        }   
		a.a1:hover {
  			background-color: darkgray;
			  padding: 25px 45px;
		}    
		a.a2:hover {
  			background-color: linen;
			  padding: 25px 45px;
		}    
        .topnav {
            background-color: darkgreen;
            overflow: hidden;
        }

        .topnav a {
            float: left;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }

        .topnav a.active {
            background-color: #04AA6D;
            color: white;
        }

        .topnav-right {
            float: right;
        } 
        .topnav-left {
            float: left;
        }          
        .top {
            color: indigo;
            font-size: 25px;
        }
            
        input[type=text]
        {
          width: 25%;
          padding: 12px 20px;
          margin: 8px 0;
          border: 1px solid #ccc;
          border-radius: 5px;
          box-sizing: border-box;
          font-size: 18px;
        }
        input[type=submit] 
        {
          width: 150px;
          background-color: cornsilk;
          color: darkblue;
          padding: 14px 20px;
          margin: 8px 0;
          border: none;
          border-radius: 4px;
          cursor: pointer;
          font-size: 20px;
        }
        table {
        width: 100%;
        text-align: center;
        }
        th{
          color:dodgerblue;
          font-size:28px;
        }
        td{
          font-size:25px;
        }
    </style>

</head>
<body>

<?php 

$vendorid=$_SESSION['vendorid'];
?>

<center><h1><a class="a2" href="">E-FARM ADMIN</a></h1></center>
<div class="topnav">
<a class="a3" href="vendor_home.php">Home</a>
<a class="a3" href="admin_request.php">Admin Requests</a>
<a class="a3" href="my_orders.php">View Orders</a>
<a class="a3" href="my_request.php">View Request</a>
<div class="topnav-right">
<a class="a3" href="view_vendor_product_reject.php">View Rejected</a>
<a class="a3" href="vendor_account.php">My Account</a>
<a class="a3" href="logout.php">Log Out</a>
</div>
</div>
<table align="center" border="1" bgcolor="LightGoldenRodYellow">

<tr>
    <th>Item_ID</th>
    <th>Prize</th>
    <th>Quantity</th>
    <th>Total</th>
    <th>Requested date</th>
    <th>Process date</th>
    <th>Action </th>
</tr>
<?php

$host="localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "alb";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()) {
		die('Connect error('. mysqli_connect_error().')'. mysqli_connect_error());
	}
        $sql = "SELECT * from vendor_product  where vendorid='$vendorid' and (`status`=1 or `status`=3)";
        $result=mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
       
       if($resultCheck > 0){
           while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            $vendor_prod_id=$row['vendor_prod_id'];
            echo "<td>".$row['items_id'] ."</td>";
            echo "<td>".$row['prize'] ."</td>";
            echo "<td>".$row['qty_need'] ."</td>";
            echo "<td>".$row['qty_need']*$row['prize'] ."</td>";
            echo "<td>".$row['req_date'] ."</td>";
            echo "<td>".$row['proc_date'] ."</td>";
            $status=$row['status'];
            if($status==3){
                echo "<td><a href=../pdf/vendor-pdf-generation.php?vendor_prod_id=$vendor_prod_id><img src=../pdf/pdf-image.png height=35 width=25></a></td>";
            }
            else{
            echo "<td>Processing</td></tr>";
            }
            echo "</tr>";
            }
        }
    echo "</table>";
?>