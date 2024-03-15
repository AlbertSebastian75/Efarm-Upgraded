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
    </style>

    <center><h1><a class="a2" href="">E-FARM ADMIN</a></h1></center>

<div class="top">
<!--Search Code-->
<form method="post" action="search1.php">
<b>Search User:</b>
<input type="text" name="search" placeholder="Enter the  username here..."autofocus>
<input type="submit" name="submit">
</form>
<!--Search End-->

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

<?php
$con = new PDO("mysql:host=localhost;dbname=alb",'root','');
if (isset($_POST["submit"])) {
	$str = $_POST["search"];
	$sth = $con->prepare("SELECT * FROM `users` WHERE firstname like '%$str%'");
	$sth->setFetchMode(PDO:: FETCH_OBJ);
	$sth -> execute();
	if($row = $sth->fetch())
	{
		?>
		<br>
    	<table align="center" border="1" bgcolor="LightGoldenRodYellow">
			
			
		<tr><th>Users ID</th><td><?php echo $row->users_id;$ww=$row->users_id;?></td></tr>
		<tr><th>First Name</th><td><?php echo $row->firstname; ?></td></tr>
		<tr><th>Last Name</th><td><?php echo $row->lastname; ?></td></tr>
		<tr><th>Email</th><td><?php echo $row->email;?></td></tr>
		<tr><th>Mobile</th><td><?php echo $row->mobile;?></td></tr>
		<tr><th>Address</th><td><?php echo $row->adr;?></td></tr>
		<tr><th>Country</th><td><?php echo $row->country;?></td></tr>
		<tr><th>State</th><td><?php echo $row->state;?></td></tr>
		<tr><th>District</th><td><?php echo $row->district;?></td></tr>
		<tr><th>City</th><td><?php echo $row->city;?></td></tr>
            

		</table>
<?php 
	}
		else{
			echo "Name Does not exist";
		}
}
/*
echo "<center>";
echo "<a href=delete_user.php?users_id=".$ww."><button class=a7>DELETE</button></a>";
echo "</center>";
*/
?>

