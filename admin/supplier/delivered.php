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
 <title><?php echo $_SESSION['usr']; ?> | Home</title>
</head>
<body>
    <style>
		body{
			background-image: url('../../css/image/img5.jpeg');
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-size: cover;
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

<?php    
$txt6=$_GET['supplier_id'];  
echo "<center><a href=delivered.php?supplier_id=".$txt6. "><button class=a7>Delivered</button></a>&ensp;";
echo "<a href=pending_confiramtion.php?supplier_id=".$txt6. "><button class=a7>Pending Confirmation</button></a>&ensp;";
echo "<a href=processing.php?supplier_id=".$txt6. "><button class=a7>Processing </button></a>&ensp;";
echo "<a href=assigned.php?supplier_id=".$txt6. "><button class=a7>Assigned</button></a>&ensp;";
echo "<a href=requested.php?supplier_id=".$txt6. "><button class=a7>Requested</button></a>&ensp;";
echo "<a href=new_request.php?supplier_id=".$txt6. "><button class=a7>Not Processed Yet</button></a></center>";

$host="localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "alb";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);


if (mysqli_connect_error()) {
		die('Connect error('. mysqli_connect_error().')'. mysqli_connect_error());
	}
/*
    //echo "</table>";  
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
            </tr>";
     
    
            $sql = "SELECT * from supplier where `supplier_id`='$txt6'";
            $result=mysqli_query($conn, $sql);
           $resultCheck = mysqli_num_rows($result);
           if($resultCheck > 0){
               while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>".$supplier_idd=$row['supplier_id'] ."</td>";
                echo "<td> ".$row['location'] ."</td>";
                echo "<td>".$row['name'] ."</td>";
                echo "<td>".$row['email'] ."</td>";
                echo "<td>".$row['aadhar'] ."</td>";
                echo "<td>".$row['mobile'] ."</td>";
                echo "<td> ".$row['address'];
                echo ", ".$row['country']; 
                echo ", ".$row['state'];
                echo ", ".$row['district'];
                echo ", ".$row['city'] ."</td>";            
                echo "</tr>";
              
               }
           }*/

           $sql1 = "SELECT * from sales where supplier=$txt6 and `status`='5' order by delivery_date desc";
            $result1=mysqli_query($conn, $sql1);
            $resultCheck1 = mysqli_num_rows($result1);
            echo "</table><table align=center border=1 bgcolor=LightGoldenRodYellow><h4>DELIVERED</h4>";
            $t=0;

            echo "<tr>
            <th>SALES ID</th>
            <th>USER ID</th>
            <th>ITEM ID</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Date</th>
            <th>Delivery Date</th>
            <th>Action</th>
        </tr>";

            if($resultCheck1 > 0){
                $t=0;$c=0;
            while ($row1 = mysqli_fetch_assoc($result1)) {
                echo "<tr>";
                $c+=1;
                echo "<td>".$row1['sales_id'] ."</td>";
                echo "<td><a href=../user_individual.php?users_id=".$row1['users_id']. ">".$row1['users_id']."</a></td>";
                echo "<td><a href=../item_individual.php?items_id=".$row1['items_id']. ">".$row1['items_id']."</a></td>";
                //echo "<td>".$row1['users_id'] ."</td>";
                //echo "<td>".$row1['items_id'] ."</td>";
                echo "<td>".$row1['qty'] ."</td>";
                echo "<td>₹".$row1['total'] ."</td>";
                $t=$t+$row1['total'];
                echo "<td>".$row1['date'] ."</td>";
                echo "<td>".$row1['delivery_date'] ."</td>";
                //echo "<td><a href=../user_individual.php?users_id=".$row1['users_id']. "><button>view</button></a></td>";
                //echo "<td><a href=../item_individual.php?items_id=".$row1['items_id']. "><button>view</button></a></a></td>";
                echo "<td><a href=../../pdf/user-pdf-generation.php?sales_id=$row1[sales_id]><img src=../../pdf/pdf-image.png height=35 width=25></a></td>";
                //echo "<td><a href=book_request.php?sales_id=".$row1['sales_id']. "><button>BOOK REQUEST</button></a></td>";
                echo "</tr>";
            }if($c!=null){
            echo "<td>Total Sales Done: ".$c."</td><td>Total Prize: ₹".$t."</td>";
            }
        }

