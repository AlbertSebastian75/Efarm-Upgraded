<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Requests | <?php echo $_SESSION['name'] ?></title>
    <style>
		body{
			background-image: url('../css/image/img5.jpeg');
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-size: cover;
		}
        .topnav {
            background-color: darkgreen;
            overflow: hidden;
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
		a.a2{
    		text-decoration: underline;
 			color: burlywood;
    		text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;
    		font-size: 75px;
		}   
		a.a2:hover {
  			background-color: linen;
			  padding: 25px 45px;
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
        .top {
            color: indigo;
            font-size: 25px;
        }
        </style>

</head>
<body>
<center><h1><a class="a2" href="">E-FARM</a></h1></center>
<div class="topnav">
<a class="a3" href="supplier_home.php">Home</a>
<a class="a3" href="my_orders.php">My Orders</a>
<a class="a3" href="processing.php">My Processing</a>
<a class="a3" href="delivery_pending.php">Pending Delivery Confirm</a>

    <div class="topnav-right">
<a class="a3" href="my_request.php">My Request</a>
<a class="a3" href="my_delivery.php">My Delivery</a>
<a class="a3" href="supplier_account.php">My Account</a>
<a class="a3" href="logout.php">Log Out</a>
    </div>
    </div>

</body>
</html>

<?php
$supplier_id=$_SESSION['supplier_id'];
$location=$_SESSION['location'];

$host="localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "alb";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()) {
		die('Connect error('. mysqli_connect_error().')'. mysqli_connect_error());
	}

    echo "<table align=center border=1 bgcolor=LightGoldenRodYellow><tr>
        <th>Sales ID</th>
        <th>User ID</th>
        <th>Item ID</th>
        <th>Quantity</th>
        <th>Total</th>
        <th>Customer order Date</th>
        <th>Supplier requested Date</th>
        <th>User Details</th>
        <th>Item Details</th>
    </tr>";

        
        $sql = "SELECT * from users where `state`='$location'";
        $result=mysqli_query($conn, $sql);
       $resultCheck = mysqli_num_rows($result);
       if($resultCheck > 0){
           while ($row = mysqli_fetch_assoc($result)) {
            $u=$row['users_id'];
                       
            $sql1 = "SELECT * from sales where users_id=$u and supplier=$supplier_id and `status`='1'";
            $result1=mysqli_query($conn, $sql1);
            $resultCheck1 = mysqli_num_rows($result1);
            if($resultCheck1 > 0){
            while ($row1 = mysqli_fetch_assoc($result1)) {
                echo "<tr>";
                echo "<td>".$row1['sales_id'] ."</td>";
                echo "<td>".$row1['users_id'] ."</td>";
                echo "<td>".$row1['items_id'] ."</td>";
                echo "<td>".$row1['qty'] ."</td>";
                echo "<td>₹".$row1['total'] ."</td>";
                echo "<td>".$row1['date'] ."</td>";	
                echo "<td>".$row1['req_date'] ."</td>";		
                echo "<td><a href=user_individual.php?users_id=".$row1['users_id']. ">USER DETAILS</a></td>";
                echo "<td><a href=item_individual.php?items_id=".$row1['items_id']. ">ITEM DETAILS</a></td>";
                //echo "<td><a href=book_request.php?sales_id=".$row1['sales_id']. "><button>BOOK REQUEST</button></a></td>";
                echo "</tr>";
          
           }
       }
    }
 }

        echo "</table>";
?>