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
 <title><?php echo $_SESSION['usr']; ?> |Purchase Vendor Products</title>
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
            
        .a222
        {
          width: 25%;
          padding: 12px 20px;
          margin: 8px 0;
          border: 1px solid #ccc;
          border-radius: 5px;
          box-sizing: border-box;
          font-size: 18px;
        }
        .a223 
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
    .a4{
      width:250px;
			font-size: 18px;
    }      
		.a331 {
			width: 200px;
			background-color: Gainsboro;
			color: darkred;
			padding: 20px 10px;
			margin: 8px 0;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			font-size: 20px;
            font-weight:bold;
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
<input type="text" name="search" class="a222" placeholder="Enter the  username here..."autofocus>
<input type="submit" class="a223" name="submit">
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


<?php

$host="localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "alb";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()) { 
    die('Connect error('. mysqli_connect_error().')'. mysqli_connect_error());
}
    
$vendor_prod_id=$_GET['vendor_prod_id'];
    
$sql1 = "SELECT * from vendor_product where vendor_prod_id='$vendor_prod_id';";
$result1=mysqli_query($conn, $sql1);
while ($row1 = mysqli_fetch_assoc($result1)) {
    $vendorid=$row1['vendorid'];
    $prize=$row1['prize'];
    $qty_need=$row1['qty_need'];
}
       
         $total=$prize*$qty_need;
  ?>

<html>
<body>
<form action="payment_connection.php" method="post">
<h2>PAYMENT MODULE</h2>

<center>
<table>

<tr><th>Vendor Product ID:</th><td> <?php echo $vendor_prod_id; ?></td></tr>
<tr><th>Vendor ID:</th><td> <?php echo $vendorid; ?></td></tr>
<tr><th>Price:</th><td> <?php echo "₹".$prize." per item"; ?> </td><tr>
<tr><th>Quantity:</th><td> <?php echo $qty_need; ?> </td></tr>
<tr><th>Total Price:</th><td> <?php echo "₹".$total; ?></td></tr>


<tr><th>Card Type:</th><td>
  <select name="card_type" class="a4" required>
    <option value="" selected="selected" disabled="disabled">Select your Card Type</option>
      <option>Debit Card</option>
      <option>Credit Card</option>
  </select></td></tr>

  <input type="hidden" name="vendor_prod_id" value="<?php echo $vendor_prod_id ?>">
       <tr><th>Card Name:</th>
       <td><input type="text"name="card_name" class="a4" required pattern="[A-Za-z_]+"></td></tr>

       <tr><th>Card Number:</th>
       <td><input type="password"name="card" class="a4" required pattern="[0-9]+"  minlength="16" maxlength="16" title="Invalid - 16 Digits Only" placeholder="xxxx-xxxx-xxxx-xxxx"></td></tr>
       <tr><th>Expiry(MM/YY):</th>
       <td><input type="month"name="valid" class="a4"class="a4" required  min="2022-07" max="2030-12" value="2022-07"></td></tr>

       <tr><th>CVV:</th>
       <td><input type="password"name="cvv" class="a4" required pattern="[0-9]+"  minlength="3" maxlength="3" title="Enter 3 Digit Number"placeholder="xxx"></td></tr>
      </tr>
</table>
       <br> <input type="submit"class="a331" value="PAY">  </center>
</form>
</body>
</html>

