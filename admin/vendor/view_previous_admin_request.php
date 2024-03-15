<!DOCTYPE html>
<html>
<head>
 <title><?php session_start(); echo $_SESSION['usr']; ?> | Home</title>
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
  echo "<table align=center border=1 bgcolor=LightGoldenRodYellow>
  <tr>
  <th>Vendor Product ID</th>
  <th>Item ID</th>
  <th>Requested Date</th>
  <th>Removed Date</th>
  </tr>";
        $sql = "SELECT * from vendor_product where `status`=9 order by proc_date desc";
        $result=mysqli_query($conn, $sql);
       $resultCheck = mysqli_num_rows($result);
       if($resultCheck > 0){
           while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            
            echo "<td>".$row['vendor_prod_id'] ."</td>"; 
           // echo "<td><a href=view_individual_vendor.php?vendor_id=".$row['vendorid'] .">".$row['vendorid'] ."</a></td>";            
            echo "<td><a href=../item_individual.php?items_id=".$row['items_id']. ">".$row['items_id'] ."</a></td>";
            //echo "<td>".$row['vendorid'] ."</td>";
            //echo "<td>".$row['items_id'] ."</td>";
           // echo "<td>".$row['prize'] ."</td>";
           // echo "<td>".$row['qty'] ."</td>";
            
            echo "<td>".$row['req_date'] ."</td>";
            echo "<td>".$row['proc_date'] ."</td>";
          //  echo "<td>".$row['qty']*$row['prize'] ."</td>";
            echo "</tr>";
          
           }
      
        }
?>
</table>
</body>
</html>