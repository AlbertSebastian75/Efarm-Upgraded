<!DOCTYPE html>
<html>
<head>
 <title><?php session_start(); echo $_SESSION['name']; ?> | User Details</title>
</head>   
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
		button
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
		p.error{
			color:maroon;
			font-size:35px;
		}
        </style>

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

<h2><u><center>USER DETAILS</center></U></h2>
<br>
    <table align="center" border="1" bgcolor="LightGoldenRodYellow">
 <?php

$host="localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "alb";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()) {
		die('Connect error('. mysqli_connect_error().')'. mysqli_connect_error());
	}

        $users_id=$_GET['users_id'];
        $sql = "SELECT * from users where users_id=$users_id;";
        $result=mysqli_query($conn, $sql);
       $resultCheck = mysqli_num_rows($result);
       if($resultCheck > 0){
           while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<th>USERS ID</th><td>".$row['users_id'] ."</td></tr>";
            echo "<th>FIRST NAME</th><td>".$row['firstname'] ."</td></tr>";
            echo "<th>LAST NAME</th><td>".$row['lastname'] ."</td></tr>";
            echo "<th>EMAIL</th><td>".$row['email'] ."</td></tr>";
            echo "<th>MOBILE</th><td>".$row['mobile'] ."</td></tr>";
            echo "<th>PASSWORD</th><td> ".$row['password'] ."</td></tr>";
            echo "<th>ADDRESS</th><td> ".$row['adr'] ."</td></tr>";
            echo "<th>COUNTRY</th><td> ".$row['country'] ."</td></tr>";
            echo "<th>STATE</th><td> ".$row['state'] ."</td></tr>";
            echo "<th>DISTRICT</th><td> ".$row['district'] ."</td></tr>";
            echo "<th>CITY</th><td> ".$row['city'] ."</td>";
            echo "</tr>";
          
           }
       }
?>
</table>
</body>
</html>