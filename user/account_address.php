<?php
    session_start();
    if(!isset($_SESSION['users_id']))
    {
    	header('Location: ../login/login.php');
    }
    else
    {
    	include 'user_config.php';
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $_SESSION['user'] ?> | Account </title>
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
		.a8{
			width: 50%;
			padding: 5px 10px;
			margin: 5px 0;
			border: 1px solid #ccc;
			border-radius: 5px;
			box-sizing: border-box;
			font-size: 18px;
		}   
      table {
        width: 75%;
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

<center><h1><a class="a2" href="">E-FARM</a></h1></center>

<div class="top">
<!--Search Code-->
<form method="post" action="search.php">
<b>Search: </b><input type="text" class="a4" name="search" placeholder="Search the Item here.">
<input type="submit" class="a5" name="submit">
</form>
<!--Search End-->
</div>

<div class="topnav">
<a class="a3" href="user_home.php">Home</a>
<a class="a3" href="view_wishlist.php">WishList</a>  
<a class="a3" href="item.php">All items</a>
<a class="a3" href="purchase.php">Purchase</a>
<a class="a3" href="user_order.php">My Orders</a>

<div class="topnav-right">
<a class="a3" href="user.php">My Account</a>
<a class="a3" href="u_logout.php">Log Out</a>\
</div>
</div>

<br><br><div class="user-identity">
<center>
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

?>
                <form method="post" action="address.php">
                <label>User ID:</label>
                <input type="number" class="a6" name="users_id" autofocus required readonly value=<?php echo $_SESSION['users_id'] ?> >
                <br><br>
                <th>Billing Address:</th>
                <td><textarea rows="2" cols="15" class="a8" name="adr"  pattern="[A-Za-z0-9 ]+" placeholder="Address with PIN CODE" required  title="No numbers and Special Characters"></textarea></td><br>
                <tr><th>Country: </th>
				<td><input type="text" name="country" class="a8"  readonly value="India" ></td></tr>
    			<td></tr><tr><th>States</th><td>
                <input list="types" class="b2" class="a8"  name="states" placeholder="Select From List" required pattern="[A-Z ]+" title="Capital Letters Only">
                <datalist id="types">
                    <option value="ANDHRA PRADESH">
                    <option value="ARUNACHAL PRADESH">
                    <option value="ASSAM">
                    <option value="BIHAR">
                    <option value="CHHATTISGARH">
                    <option value="GOA">
                    <option value="GUJARAT">
                    <option value="HARYANA">
                    <option value="HIMACHAL PRADESH">
                    <option value="JHARKHAND">
                    <option value="KARNATAKA">
                    <option value="KERALA">
                    <option value="MADHYA PRADESH">
                    <option value="MANIPUR">
                    <option value="MEGHALAYA">
                    <option value="MIZORAM">
                    <option value="NAGALAND">
                    <option value="ODISHA">
                    <option value="PUNJAB">
                    <option value="RAJASTHAN">
                    <option value="SIKKIM">
                    <option value="TAMIL NADU">
                    <option value="TELANGANA">
                    <option value="TRIPURA">
                    <option value="UTTAR PRADESH">
                    <option value="UTTARAKHAND">
                    <option value="WEST BENGAL">
                    <option value="ANDAMAN AND NICOBAR ISLAND">
                    <option value="CHANDIGRAH">
                    <option value="DADRA AND NAGAR HAVELI">
                    <option value="DAMAN AND DIU">
                    <option value="DELHI">
                    <option value="LADAK">
                    <option value="LAKSHADWEEP">
                    <option value="JAMMU AND KASHMIR">
                    <option value="PUDUCHERRY">
                </datalist><tr><th>District:</th>
				<td><input type="text" name="district" class="a8" required pattern="[A-Za-z ]+" title="No numbers and Special Characters" ></td></tr>
    			<tr><th>City:</th>
				<td><input type="text" name="city" class="a8" required pattern="[A-Za-z ]+" title="No numbers and Special Characters" ></td></tr>
    			
</table><br><br>
            <input type="submit" class="a7" value="ADD ADDRESS">
            </form>
   

<a href="user.php"><button class="a7">BACK</button></a>
</center>
</body>
</html>
