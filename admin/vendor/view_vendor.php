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
 <title><?php echo $_SESSION['usr']; ?> | Vendors</title>
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
<b>Search Vendor:</b>
<input type="text" name="search" placeholder="Enter the  username here..."autofocus>
<input type="submit" name="submit">
</form>
<!--Search End-->

<div class="topnav">
    <a class="a3" href="../admin_home.php">Home</a>
    <a class="a3" href="../insert_item.php">Add Item</a>
    <a class="a3" href="../rol.php">ROL</a>
    <a class="a3" href="view_vendor_allproduct.php">Vendor Products</a>

    <div class="topnav-right">
    <a class="a3" href="view_vendor.php">Manage Vendors</a>
    <a class="a3" href="../supplier/view_supplier.php">Manage Supplier</a>
    <a class="a3" href="../view_item.php">Manage Products</a>
    <a class="a3" href="../view_user.php">Manage Users</a>
    <a class="a3" href="../a_logout.php">Log Out</a>


    </div>
    </div>

 
    <div class="topnav-left"><h4>VENDOR REQUESTS</h4></div>
    <div class="topnav-right"><a href="view_vendor_reject.php">Rejected Vendor Request</a></div>
    
    <table align="center" border="1" bgcolor="LightGoldenRodYellow">

		<tr>
			<th>VENDOR_ID</th>
			<th>FULL NAME</th>
			<th>COMAPNY NAME</th>
			<th>EMAIL</th>
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

        $sql = "SELECT * from vendor where `status`=0;";
        $result=mysqli_query($conn, $sql);
       $resultCheck = mysqli_num_rows($result);
       if($resultCheck > 0){
           while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['vendorid'] ."</td>";
            echo "<td>".$row['fullname'] ."</td>";
            echo "<td>".$row['companyname'] ."</td>";
            echo "<td>".$row['email'] ."</td>";
            echo "<td>".$row['mobile'] ."</td>";
           // echo "<td> ".$row['password'] ."</td>";
            echo "<td> ".$row['address'] ."</td>";
            echo "<td><a href=vendor_approve.php?vendorid=".$row['vendorid']. "><button>Approve</button></a>
            <a href=vendor_reject.php?vendorid=".$row['vendorid']. "><button>Reject</button></a></td>";
            echo "</tr>";
          
           }
      
        }

    
echo "</table>";
echo "<h4>VIEW VENDORS</h4>";
echo "<table align=center border=1 bgcolor=LightGoldenRodYellow>
<tr>
    <th>VENDOR_ID</th>
    <th>FULL NAME</th>
    <th>COMAPNY NAME</th>
    <th>EMAIL</th>
    <th>MOBILE</th>
    <th>ADDRESS</th>
    <th>ACTION</th>
</tr>";

       $sql1 = "SELECT * from vendor where `status`=1;";
       $result1=mysqli_query($conn, $sql1);
      $resultCheck1 = mysqli_num_rows($result1);
      if($resultCheck1 > 0){
          while ($row = mysqli_fetch_assoc($result1)) {
           echo "<tr>";
           echo "<td>".$row['vendorid'] ."</td>";
           echo "<td>".$row['fullname'] ."</td>";
           echo "<td>".$row['companyname'] ."</td>";
           echo "<td>".$row['email'] ."</td>";
           echo "<td>".$row['mobile'] ."</td>";
          // echo "<td> ".$row['password'] ."</td>";
           echo "<td> ".$row['address'] ."</td>";
           echo "<td><a href=view_individual_vendor.php?vendor_id=".$row['vendorid']. "><button>VIEW</button></a><br>";
           echo "<a href=vendor_delete.php?vendorid=".$row['vendorid']. "><button>DELETE</button></a>";
           echo "</tr>";
         
          }
      }
?>
</table>
</body>
</html>