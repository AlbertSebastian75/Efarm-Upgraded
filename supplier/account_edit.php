<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $_SESSION['name'] ?> | Account </title>
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
			width: 35%;
			padding: 12px 20px;
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

?>

    <form method="post" action="edit_connection.php">

<!--for placeholder-->
	<?php
		$host="localhost";
		$dbusername = "root";
		$dbpassword = "";
		$dbname = "alb";
		$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
		
	$u=$_SESSION['supplier_id'];
	$sql1 = "SELECT * from supplier where supplier_id='$u'";
	$result1=mysqli_query($conn, $sql1);
    $resultCheck1 = mysqli_num_rows($result1);
    if($resultCheck1 > 0){
	   while ($row = mysqli_fetch_assoc($result1)) {
		$u1=$row['supplier_id'] ;
		$u2=$row['location'];
		$u3=$row['name'];
		$u4=$row['email'];
		$u5=$row['aadhar'];
		$u6=$row['mobile'];
		$u7=$row['address'];
		$u8=$row['city'];
		$u9=$row['district'];
		$u10=$row['state'];
		$u11=$row['country'];
		$u12=$row['password'];
		
	   }
   }
	?>
<!--Placeholder end-->
    			<input type="hidden" name="supplier_id" class="a8" value=<?php echo $u1; ?> required read only></td></tr>
				<tr><th>Name:</th><td>
    			<input type="text" name="name" class="a8" value=<?php echo $u3; ?> required pattern="[A-Za-z ]+" title="No Numbers and Special Characters"></td></tr>
    			<tr><th>Mobile:</th><td>
                <input type="text" name="mobile" class="a8" value=<?php echo $u6; ?> required minlength="10" maxlength="10" required pattern="[0-9]+"></td></tr>
    			<tr><th>Address:</th><td>
    			<input type="text" name="address" class="a8" value=<?php echo $u7; ?> required pattern="[A-Za-z0-9 ]+" title="No Special Characters"></td></tr>
    			<tr><th>City:</th><td>
    			<input type="text" name="city" class="a8" value=<?php echo $u8; ?> required pattern="[A-Za-z ]+" title="No Numbers and Special Characters"></td></tr>
    			<tr><th>District:</th><td>
    			<input type="text" name="district" class="a8" value=<?php echo $u9; ?> required pattern="[A-Za-z ]+" title="No Numbers and Special Characters"></td></tr>
                <tr><th>State:</th><td>
                <input list="types" class="b2" class="a8"  name="state"  value=<?php echo $u2; ?> required pattern="[A-Z ]+">
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
    			</td></tr>
    			<tr><th>Password:</th><td>
    			<input type="password" name="password" class="a8" value=<?php echo $u12; ?> required minlength="6" pattern="[^' ']+" title="No Spaces"></td></tr>
                
</table><br><br>
                <input type="submit" class="a7" value="UPDATE">
            </form>
   

<a href="supplier_account.php"><button class="a7">BACK</button></a>

</body>
</html>
