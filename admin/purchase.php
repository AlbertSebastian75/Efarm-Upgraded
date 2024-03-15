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
        .a22 
        {
          width: 150px;
          background-color: darkgrey;
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

    <h2><u>ORDER DETAILS</U></h2>
    <table align="center" border="1" bgcolor="LightGoldenRodYellow">

		<tr>
			<th>Sales ID</th>
			<th>Quantity</th>
			<th>Total</th>
			<th>Date</th>
		</tr>
 <?php

 $sales_id=$_GET['sales_id'];

$host="localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "alb";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()) {
		die('Connect error('. mysqli_connect_error().')'. mysqli_connect_error());
	}

        $sql = "SELECT * from sales where sales_id=$sales_id;";
        $result=mysqli_query($conn, $sql);
       $resultCheck = mysqli_num_rows($result);
       if($resultCheck > 0){
           while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['sales_id'] ."</td>";
            $sales_id=$row['sales_id'];
            $users_id=$row['users_id'];
            //echo "<td><a href=user_individual.php?users_id=".$row['users_id']. ">".$row['users_id'] ."</a></td>";
            $items_id=$row['items_id'];
            //echo "<td><a href=item_individual.php?items_id=".$row['items_id']. ">".$row['items_id'] ."</a></td>";
            //echo "<td>".$row['price'] ."</td>";
            echo "<td>".$row['qty'] ."</td>";
            echo "<td>₹".$row['total'] ."</td>";
            echo "<td>".$row['date'] ."</td>";
            $supplier=$row['supplier'];
            
            $status=$row['status'];
            //echo "<td>".$row['review'] ."</td>";
            //echo "<td><a href=purchase.php?sales_id=".$row['sales_id']. "><button>VIEW</button></a></td>";
            echo "</tr>";
           }
       }
       echo "</table>";

       if($status==1){
           echo "<center><html>
           <form action=supplier/assign_order.php method=post>
           Request made by: 
           <input type=hidden class=b2 name=sales_id autofocus required readonly value= $sales_id>
           <input type=hidden class=b2 name=supplier_idd autofocus required readonly value= $supplier>
           <a href=supplier/view_individual_supplier.php?supplier_id=".$supplier. ">$supplier</a>
           <input type=submit value=GRAND>
           </form>
           </html></center>";
       }

       if($status!=0&&$status!=1){
        echo "<center>GRANDED FOR SUPPLIER: <a href=supplier/view_individual_supplier.php?supplier_id=".$supplier. "><button class=a22>$supplier</button></a></center>";
    }



       $sql1 = "SELECT * from users where users_id='$users_id'";
       $result1=mysqli_query($conn, $sql1);
      $resultCheck1 = mysqli_num_rows($result1);
      echo "<table>";
      if($resultCheck1 > 0){
          while ($row = mysqli_fetch_assoc($result1)) {
           echo "<tr>";
           echo "<th>Users ID </th><td>".$row['users_id'] ."</td></tr>";
           echo "<th>First Name </th><td>".$row['firstname'] ."</td></tr>";
           echo "<tr><th>Last Name </th><td>".$row['lastname'] ."</td></tr>";
           echo "<tr><th>Email </th><td>".$row['email'] ."</td></tr>";
           echo "<tr><th>Mobile </th><td>".$row['mobile'] ."</td></tr>";
           //echo "<td> ".$row['password'] ."</td>";
           echo "<tr><th>Address </th><td> ".$row['adr'] ."</td></tr><tr><th></th>
     <td> ".$row['country'] .", ".$row['state'] .", ".$row['district'] .", ".$row['city'] ."</td>";
     $state=$row['state'];
           echo "</tr>";
         
          }
      }
      echo "</table><hr>";
      echo "<table>";

      $sql2 = "SELECT * from items where items_id=$items_id";
       $result2=mysqli_query($conn, $sql2);
      $resultCheck2 = mysqli_num_rows($result2);
      if($resultCheck2 > 0){
          while ($row = mysqli_fetch_assoc($result2)) {
           echo "<tr>";
           echo "<th>Item_ID</th><td>".$row['items_id'] ."</td></tr>";
           echo "<th>Item Name</th><td>".$row['name'] ."</td></tr>";
           echo "<th>Product Brand</th><td>".$row['brand'] ."</td></tr>";
           echo "<th>Description</th><td>".$row['description'] ."</td></tr>";
           echo "<th>TYPES</th><td>".$row['types'] ."</td></tr>";
           echo "<th>PRICE</th><td>₹".$row['price'] ."</td></tr>";
          // echo "<th>STOCK</th><td>".$row['stock'] ."</td></tr>";
           $pathx = "image/";
           $file = $row["img"];
           echo "<th>IMAGE</th><td>";
           echo '<img src="'.$pathx.$file.'" height=100 width=100>';
           echo "</td></tr>";
          }
      }
      echo "</table>";

?>

</table>
</body>
</html>

<?php

$host="localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "alb";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()) {
		die('Connect error('. mysqli_connect_error().')'. mysqli_connect_error());
	}

   //only assign button until it is assigned.
   if($status==0){

        echo "<table align=center border=1 bgcolor=LightGoldenRodYellow>";
        $sql = "SELECT * from supplier where `location`='$state'";
        $result=mysqli_query($conn, $sql);
       $resultCheck = mysqli_num_rows($result);
      echo  "<tr>
       <th>SUPPLIER ID</th>
       <th>LOCATION</th>
       <th>NAME</th>
       <th>EMAIL</th>
       <th>AADHAR</th>
       <th>MOBILE</th>
       <th>ADDRESS</th>
       <th>ACTION</th>
   </tr>";
       if($resultCheck > 0){
           while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['supplier_id'] ."</td>";
            $supplier_idd=$row['supplier_id'];
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

            
?>

<html>
<form action="supplier/assign_order.php" method="post">
<input type="hidden" class="b2" name="sales_id" autofocus required readonly value=<?php echo $sales_id; ?> <br>
<input type="hidden" class="b2" name="supplier_idd" autofocus required readonly value=<?php echo $supplier_idd; ?> <br>         
<td><input type="submit" value="ASSIGN"></td>
</form>
</html>

<?php
            
            echo "</tr>";
           }
        }
   }

        echo "</table>";
?>