<?php
    session_start();
    if(!isset($_SESSION['usr']))
    {

        if($_POST['CODE']=='Admin123')
        {
          $_SESSION['usr']='ADMIN';
        }
        else
        {
          $_SESSION['tmp']="Invalid Code!";
          header('Location: verify.php');
        }
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
<b>Search Items:</b>
<input type="text" name="search" placeholder="Enter the product name here..."autofocus>
<input type="submit" name="submit">
</form>
<!--Search End-->

    <?php
        if(isset($_SESSION['temp']))
        {
          echo '<br><p class="error">'.$_SESSION['temp'].'</p>';
          unset($_SESSION['temp']);
        }
    ?>
    

    <div class="topnav">
    <a class="a3" href="admin_home.php">Home</a>
    <a class="a3" href="insert_item.php">Add Item</a>
    <a class="a3" href="rol.php">ROL</a>
    <a class="a3" href="vendor/view_vendor_allproduct.php">Vendor Products</a>

    <div class="topnav-right">
    <a class="a3" href="vendor/view_vendor.php">Manage Vendors</a>
    <a class="a3" href="supplier/view_supplier.php">Manage Supplier</a>
    <a class="a3" href="view_item.php">Manage Products</a>
    <a class="a3" href="view_user.php">Manage Users</a>
    <a class="a3" href="a_logout.php">Log Out</a>

    </div>
    </div>

    <center><a href="delivered.php"><button class="a7">Delivered</button></a>
    <a href="pending_confiramtion.php"><button class="a7">Pending Confirmation </button></a>
    <a href="processing.php"><button class="a7">Processing </button></a>
    <a href="assigned.php"><button class="a7">Assigned </button></a>
    <a href="requested.php"><button class="a7">Requested </button></a>
    <a href="new_request.php"><button class="a7">Not Processed Yet </button></a></center>

    <h2><u>ORDERS: NOT YET PROCESSED</U></h2>
    <table align="center" border="1" bgcolor="LightGoldenRodYellow">

		<tr>
			<th>Sales ID</th>
			<th>User ID</th>
			<th>Item ID</th>
			<th>Quantity</th>
			<th>Total</th>
			<th>Date</th>
			<th>Review</th>
			<th>Status</th>
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

  $t=0;$c=0;$delivery_total=0;$delivery_count=0;
        $sql = "SELECT * from sales where status=0 order by date desc;";
        $result=mysqli_query($conn, $sql);
       $resultCheck = mysqli_num_rows($result);
       if($resultCheck > 0){
           while ($row = mysqli_fetch_assoc($result)) {
            $c+=1;
            echo "<tr>";
            echo "<td>".$row['sales_id'] ."</td>";
            $users_id=$row['users_id'];


                    //Not to show view button to deleted user..
                    $sql100 = "SELECT * from users where users_id=$users_id;";
                    $result100=mysqli_query($conn, $sql100);
                    $resultCheck100 = mysqli_num_rows($result100);
                    //initailze $uuu 
                    $uuu=0;
                    if($resultCheck100 == 0){
                    $uuu=$users_id;
                    }
      

            echo "<td><a href=user_individual.php?users_id=".$row['users_id']. ">".$row['users_id'] ."</a></td>";
            //echo "<td>".$row['items_id'] ."</td>";
            echo "<td><a href=item_individual.php?items_id=".$row['items_id']. ">".$row['items_id'] ."</a></td>";
            //echo "<td>".$row['price'] ."</td>";
            echo "<td>".$row['qty'] ."</td>";
            echo "<td>₹".$row['total'] ."</td>";
            $t=$t+$row['total'];
            echo "<td>".$row['date'] ."</td>";
            echo "<td>".$row['review'] ."</td>";
            $delivery_total+=$row['total'];
            $delivery_count++;
           // echo "<td>Not Yet Processed</td>";
            echo "<td><a href=purchase.php?sales_id=".$row['sales_id']. "><button>VIEW</button></a></td>";
            echo "</tr>";
           }
       }
       if($delivery_count!=null){
       echo "</table><table border=5><tr>
       <td>Total no. of Sales: <th>".$delivery_count."</th></tr>
       <td>Total Amount: <th>₹".$delivery_total."</th></tr>";
      }
?>
</table>
</body>
</html>