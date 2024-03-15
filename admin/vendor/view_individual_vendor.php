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
    

    <?php

$txt6=$_GET['vendor_id'];

$host="localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "alb";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);


if (mysqli_connect_error()) {
		die('Connect error('. mysqli_connect_error().')'. mysqli_connect_error());
	}

    echo "</table>";
    echo "<h4>VIEW VENDOR</h4>
    
        <table align=center border=1 bgcolor=LightGoldenRodYellow>
    
            <tr>
                <th>VENDOR ID</th>
                <th>NAME</th>
                <th>COMPANY NAME</th>
                <th>EMAIL</th>
                <th>MOBILE</th>
                <th>ADDRESS</th>
            </tr>";
     
    
            $sql = "SELECT * from vendor where `vendorid`='$txt6';";
            $result=mysqli_query($conn, $sql);
           $resultCheck = mysqli_num_rows($result);
           if($resultCheck > 0){
               while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>".$row['vendorid'] ."</td>";
                echo "<td>".$row['fullname'] ."</td>";
                echo "<td>".$row['companyname'] ."</td>";
                echo "<td>".$row['email'] ."</td>";
                echo "<td>".$row['mobile'] ."</td>";
               // echo "<td> ".$row['password'] ."</td>";
                echo "<td> ".$row['address'] ."</td>";           
                echo "</tr>";
              
               }
            }

            
           $sql1 = "SELECT * from vendor_product where `vendorid`='$txt6' and `status`='3'";
           $result1=mysqli_query($conn, $sql1);
           $resultCheck1 = mysqli_num_rows($result1);
           echo "</table><table align=center border=1 bgcolor=LightGoldenRodYellow><h4>DELIVERED PURCHASE</h4>";
           $t=0;

           echo "<tr>
           <th>VENDOR <br>PRODUCT ID</th>
           <th>ITEM ID</th>
           <th>Prize</th>
           <th>Quantity</th>
           <th>Total</th>
           <th>Requested Date</th>
           <th>Payment Date</th>
           <th>Action</th>
       </tr>";

           if($resultCheck1 > 0){
               $t=0;$c=0;
           while ($row1 = mysqli_fetch_assoc($result1)) {
            $c+=1;
            echo "<tr>";
            
            echo "<td>".$row1['vendor_prod_id'] ."</td>"; 
            //echo "<td><a href=view_individual_vendor.php?vendor_id=".$row['vendorid'] .">".$row['vendorid'] ."</a></td>";            
            echo "<td><a href=../item_individual.php?items_id=".$row1['items_id']. ">".$row1['items_id'] ."</a></td>";
            //echo "<td>".$row['vendorid'] ."</td>";
            //echo "<td>".$row['items_id'] ."</td>";
            echo "<td>".$row1['prize'] ."</td>";
          //  echo "<td>".$row['qty'] ."</td>";
            echo "<td>".$row1['qty_need'] ."</td>";
            echo "<td>".$row1['qty_need']*$row1['prize'] ."</td>";
            $t+=$row1['qty_need']*$row1['prize'];
            echo "<td>".$row1['req_date'] ."</td>";
            echo "<td>".$row1['delivery_date'] ."</td>";
            $status=$row1['status'];
            if($status==3)
              echo "<td><a href=../../pdf/vendor-pdf-generation.php?vendor_prod_id=".$row1['vendor_prod_id']."><img src=../../pdf/pdf-image.png height=35 width=25></a></td></tr>";
           }
           echo "<td>Total Purchase<br> Done: ".$c."</td><td>Total Prize:<br> ₹".$t."</td>";
       }




       $sql1 = "SELECT * from vendor_product where `vendorid`='$txt6' and `status`='1'";
       $result1=mysqli_query($conn, $sql1);
       $resultCheck1 = mysqli_num_rows($result1);
       echo "</table><table align=center border=1 bgcolor=LightGoldenRodYellow><h4>PROCESSING PURCHASE</h4>";
       $t=0;

       echo "<tr>
       <th>VENDOR <br>PRODUCT ID</th>
       <th>ITEM ID</th>
       <th>Prize</th>
       <th>Quantity</th>
       <th>Total</th>
       <th>Requested Date</th>
       <th>Processed Date</th>
   </tr>";

       if($resultCheck1 > 0){
           $t=0;$c=0;
       while ($row1 = mysqli_fetch_assoc($result1)) {
        $c+=1;
        echo "<tr>";
        
        echo "<td>".$row1['vendor_prod_id'] ."</td>"; 
        //echo "<td><a href=view_individual_vendor.php?vendor_id=".$row['vendorid'] .">".$row['vendorid'] ."</a></td>";            
        echo "<td><a href=../item_individual.php?items_id=".$row1['items_id']. ">".$row1['items_id'] ."</a></td>";
        //echo "<td>".$row['vendorid'] ."</td>";
        //echo "<td>".$row['items_id'] ."</td>";
        echo "<td>".$row1['prize'] ."</td>";
      //  echo "<td>".$row['qty'] ."</td>";
        echo "<td>".$row1['qty_need'] ."</td>";
        echo "<td>".$row1['qty_need']*$row1['prize'] ."</td>";
        $t+=$row1['qty_need']*$row1['prize'];
        echo "<td>".$row1['req_date'] ."</td>";
        echo "<td>".$row1['proc_date'] ."</td></tr>";
       }

       echo "<td>Total no. of<br> Processing: ".$c."</td><td>Total Amount:<br> ₹".$t."</td>";
   }
   



   $sql1 = "SELECT * from vendor_product where `vendorid`='$txt6' and `status`='0'";
   $result1=mysqli_query($conn, $sql1);
   $resultCheck1 = mysqli_num_rows($result1);
   echo "</table><table align=center border=1 bgcolor=LightGoldenRodYellow><h4>REQUESTED PURCHASE</h4>";
   $t=0;

   echo "<tr>
   <th>VENDOR <br>PRODUCT ID</th>
   <th>ITEM ID</th>
   <th>Prize</th>
   <th>Quantity</th>
   <th>Total</th>
   <th>Requested Date</th>
</tr>";

   if($resultCheck1 > 0){
       $t=0;$c=0;
   while ($row1 = mysqli_fetch_assoc($result1)) {
    $c+=1;
    echo "<tr>";
    
    echo "<td>".$row1['vendor_prod_id'] ."</td>"; 
    //echo "<td><a href=view_individual_vendor.php?vendor_id=".$row['vendorid'] .">".$row['vendorid'] ."</a></td>";            
    echo "<td><a href=../item_individual.php?items_id=".$row1['items_id']. ">".$row1['items_id'] ."</a></td>";
    //echo "<td>".$row['vendorid'] ."</td>";
    //echo "<td>".$row['items_id'] ."</td>";
    echo "<td>".$row1['prize'] ."</td>";
    echo "<td>".$row1['qty'] ."</td>";
    //echo "<td>".$row1['qty']*$row1['prize']."</td>";
    echo "<td>".$row1['qty']*$row1['prize'] ."</td>";
    $t+=$row1['qty']*$row1['prize'];
    echo "<td>".$row1['req_date'] ."</td></tr>";
   }

   echo "<td>Total Purchase<br> Request: ".$c."</td><td>Total Prize:<br> ₹".$t."</td>";
}


   $sql1 = "SELECT * from vendor_product where `vendorid`='$txt6' and `status`='2'";
   $result1=mysqli_query($conn, $sql1);
   $resultCheck1 = mysqli_num_rows($result1);
   echo "</table><table align=center border=1 bgcolor=LightGoldenRodYellow><h4>REJECTED PURCHASE</h4>";
   $t=0;

   echo "<tr>
   <th>VENDOR <br>PRODUCT ID</th>
   <th>ITEM ID</th>
   <th>Prize</th>
   <th>Quantity</th>
   <th>Requested Date</th>
   <th>Rejected Date</th>
</tr>";

   if($resultCheck1 > 0){
       $c=0;
   while ($row1 = mysqli_fetch_assoc($result1)) {
    $c+=1;
    echo "<tr>";
    
    echo "<td>".$row1['vendor_prod_id'] ."</td>"; 
    //echo "<td><a href=view_individual_vendor.php?vendor_id=".$row['vendorid'] .">".$row['vendorid'] ."</a></td>";            
    echo "<td><a href=../item_individual.php?items_id=".$row1['items_id']. ">".$row1['items_id'] ."</a></td>";
    //echo "<td>".$row['vendorid'] ."</td>";
    //echo "<td>".$row['items_id'] ."</td>";
    echo "<td>".$row1['prize'] ."</td>";
    echo "<td>".$row1['qty'] ."</td>";
    echo "<td>".$row1['req_date'] ."</td>";
    echo "<td>".$row1['proc_date'] ."</td></tr>";
   }

   echo "<td>Total Purchase<br> Rejected: ".$c."</td>";
}
?>