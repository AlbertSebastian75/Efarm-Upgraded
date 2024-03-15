<!DOCTYPE html>
<html>
<head>
    <title><?php session_start(); echo $_SESSION['name'] ?> | Account </title>
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
        .user-identity{
            font-size: 25px;
            font-weight:bold;
            color:crimson;
        } 
		.a4{
			width: 25%;
			padding: 12px 20px;
			margin: 8px 0;
			border: 1px solid #ccc;
			border-radius: 5px;
			box-sizing: border-box;
			font-size: 18px;
		}
		.a5 {
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
		.a6{
			width: 25%;
			padding: 12px 20px;
			margin: 8px 0;
			border: 1px solid #ccc;
			border-radius: 5px;
			box-sizing: border-box;
			font-size: 18px;
            color:crimson;
            font-weight:bold;
		}        
		.a7 {
			width: 200px;
			background-color: darkgrey;
			color: darkred;
			padding: 14px 20px;
			margin: 8px 0;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			font-size: 20px;
            font-weight:bold;
		}
      table {
        width: 75%;
        text-align: center;
        border-spacing: 1em .9em;
        }
        th{
          color:dodgerblue;
          font-size:28px;
        }
        td{
          font-size:25px;
        }
    </style>

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


<br><br><div class="user-identity">
<center><form method="post" action="">
                <label>Supplier ID:</label>
                <input type="number" class="a6" name="supplier_id" autofocus required readonly value=<?php echo $_SESSION['supplier_id'] ?> >
</form></div><center><br><br>

<table>
<?php

$host="localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "alb";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()) {
		die('Connect error('. mysqli_connect_error().')'. mysqli_connect_error());
	}
    $txt1 = $_SESSION['supplier_id'];
        $sql = "SELECT * from supplier where supplier_id='$txt1'";
        $result=mysqli_query($conn, $sql);
       $resultCheck = mysqli_num_rows($result);
       if($resultCheck > 0){
           while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>"; 
           // echo "<td>".$row['supplier_id'] ."</td>";
            echo "<td>".$row['name'] ."</td>";
            echo "<td>".$row['email'] ."</td>";
            echo "<td>".$row['aadhar'] ."</td>";
            echo "<td>".$row['mobile'] ."</td>";
            echo "<td> ".$row['address'];
            echo ", ".$row['country']; 
            echo ", ".$row['state'];
            echo ", ".$row['district'];
            echo ", ".$row['city'] ."</td>";
            echo "<td> ".$row['location'] ."</td>";
            echo "</tr>";
          
           }
       }
?>

</table>     
<br><br>

<a href="account_edit.php"><button class="a7">UPDATE</button></a>
<a href="account_delete.php"><button class="a7">DELETE</button></a>

</body>
</html>
