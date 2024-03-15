<?php
    session_start();
    if(!isset($_SESSION['usr']))
    {
        header('Location:verify.php');
    }
?>

<!DOCTYPE html>
<html>
<head>
 <title><?php echo $_SESSION['usr']; ?> | Suppliers</title>
</head>
<body>
    <style>
		body{
			background-image: url('../../css/image/img5.jpeg');
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
              
		.a7 {
			width: 250px;
			background-color: darkgrey;
			color: darkred;
			padding: 24px 20px;
			margin: 8px 0;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			font-size: 20px;
            font-weight:bold;
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

    <center><h1><a class="a2" href="">E-FARM ADMIN</a></h1></center>

<div class="top">
<!--Search Code-->
<form method="post" action="search.php">
<b>Search Supplier:</b>
<input type="text" name="search" placeholder="Enter the  username here..."autofocus>
<input type="submit" name="submit">
</form>
<!--Search End-->

<div class="topnav">
    <a class="a3" href="../admin_home.php">Home</a>
    <a class="a3" href="../insert_item.php">Add Item</a>
    <a class="a3" href="../rol.php">ROL</a>
    <a class="a3" href="../vendor/view_vendor_allproduct.php">Vendor Products</a>

    <div class="topnav-right">
    <a class="a3" href="../vendor/view_vendor.php">Manage Vendors</a>
    <a class="a3" href="view_supplier.php">Manage Supplier</a>
    <a class="a3" href="../view_item.php">Manage Products</a>
    <a class="a3" href="../view_user.php">Manage Users</a>
    <a class="a3" href="../a_logout.php">Log Out</a>

    </div>
    </div>

 
    <div class="topnav-left"><h4>SUPPLIER REQUESTS</h4></div>
    <div class="topnav-right"><a href="view_supplier_reject.php">Rejected Supplier Request</a></div><br>
    <div class="topnav-right"><a href="view_delete_request.php">Deletion Supplier Request</a></div>

    <table align="center" border="1" bgcolor="LightGoldenRodYellow">

		<tr>
			<th>SUPPLIER ID</th>
			<th>LOCATION</th>
			<th>NAME</th>
			<th>EMAIL</th>
			<th>AADHAR</th>
			<th>MOBILE</th>
			<th>ADDRESS</th>
            <th>ACTION</th>   
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

        $sql = "SELECT * from supplier where `status`=0;";
        $result=mysqli_query($conn, $sql);
       $resultCheck = mysqli_num_rows($result);
       if($resultCheck > 0){
           while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['supplier_id'] ."</td>";
            echo "<td> ".$row['location'] ."</td>";
            echo "<td>".$row['name'] ."</td>";
            echo "<td>".$row['email'] ."</td>";
            echo "<td>".$row['aadhar'] ."<br><a href=https://myaadhaar.uidai.gov.in/verifyAadhaar?id=".$row['aadhar']."><button>verify</button></a></td>";
            echo "<td>".$row['mobile'] ."</td>";
            echo "<td> ".$row['address'];
            echo ", ".$row['country']; 
            echo ", ".$row['state'];
            echo ", ".$row['district'];
            echo ", ".$row['city'] ."</td>";
            echo "<td><a href=supplier_approve.php?supplier_id=".$row['supplier_id']. "><button>Approve</button></a>
            <a href=supplier_reject.php?supplier_id=".$row['supplier_id']. "><button>Reject</button></a></td>";
            echo "</tr>";
          
           }
      
        }

    
echo "</table>";
echo "<h4>VIEW SUPPLIERS</h4>

    <table align=center border=1 bgcolor=LightGoldenRodYellow>

		<tr>
			<th>SUPPLIER ID</th>
			<th>LOCATION</th>
			<th>NAME</th>
			<th>EMAIL</th>
			<th>AADHAR</th>
			<th>MOBILE</th>
			<th>ADDRESS</th>
            <th>ACTION</th>   
		</tr>";
 

        $sql = "SELECT * from supplier where `status`=1;";
        $result=mysqli_query($conn, $sql);
       $resultCheck = mysqli_num_rows($result);
       if($resultCheck > 0){
           while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['supplier_id'] ."</td>";
            echo "<td> ".$row['location'] ."</td>";
            echo "<td>".$row['name'] ."</td>";
            echo "<td>".$row['email'] ."</td>";
            echo "<td>".$row['aadhar'] ."<br><a href=https://myaadhaar.uidai.gov.in/verifyAadhaar?id=".$row['aadhar']."><button>verify</button></a></td>";
            echo "<td>".$row['mobile'] ."</td>";
            echo "<td> ".$row['address'];
            echo ", ".$row['country']; 
            echo ", ".$row['state'];
            echo ", ".$row['district'];
            echo ", ".$row['city'] ."</td>";            
            echo "<td><a href=view_individual_supplier.php?supplier_id=".$row['supplier_id']. "><button>VIEW</button></a>";
            echo "<a href=delete_supplier.php?supplier_id=".$row['supplier_id']. "><button>DELETE</button></a></td>";
            echo "</tr>";
          
           }
       }
?>
</table>
</body>
</html>