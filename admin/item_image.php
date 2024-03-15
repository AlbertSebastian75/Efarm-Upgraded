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
        p.error{
			color:darkred;
			font-size:35px;
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
        .b7 
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
        .b8
        {
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
            margin-right:16px;
        }
    </style>

    <center><h1><a class="a2" href="">E-FARM ADMIN</a></h1></center>

<div class="top">
<!--Search Code-->
<form method="post" action="search.php">
<b>Search Items:</b>
<input type="text" name="search" placeholder="Enter the product name here...">
<input type="submit" class="b7" name="submit">
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
		    if(isset($_SESSION['tmp8']))
		    {
				echo '<br><p class="error">'.$_SESSION['tmp8'].'</p>';
		    	unset($_SESSION['tmp8']);
		    }

		    if(isset($_SESSION['tmp7']))
		    {
				echo '<br><p class="error">'.$_SESSION['tmp7'].'</p>';
		    	unset($_SESSION['tmp7']);
		    }
		    if(isset($_SESSION['tmp77']))
		    {
				echo '<br><p class="error">'.$_SESSION['tmp77'].'</p>';
		    	unset($_SESSION['tmp77']);
		    }
		?>    
        
        <?php
        $items_id=$_GET['items_id'];
        ?>
  <form method="post" action="item_image_connection.php" enctype="multipart/form-data">
                <!--<label>Item ID:</label>
                <input type="number" name="items_id" autofocus> --><br>
                <center>
                ITEM ID:<input type="text" name="items_id" autofocus required readonly value=<?php echo $items_id; ?>><br><br><br>
               
                <input type="file" name="uploadfile" /><br><br>
                <button type="submit" class="b8" name="upload">Upload</button>
                </center>
            </form>