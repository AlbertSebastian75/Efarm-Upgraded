
<!DOCTYPE html>
<html>
<head>
 <title><?php session_start(); echo $_SESSION['fullname']; ?> | Account</title>
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
		p.error{
			color:maroon;
			font-size:35px;
		}
    </style>

<center><h1><a class="a2" href="">E-FARM</a></h1></center>





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
<center>
  <?php
			//session_start();
		    if(isset($_SESSION['tmp10']))
		    {
				echo '<br><p class="error">'.$_SESSION['tmp10'].'</p>';
		    	unset($_SESSION['tmp10']);
		    }
		?>
</center>
<br><br><div class="user-identity">
<center><form method="post" action="delete_connection.php">
                <label>Vendor ID:</label>
                <input type="number" class="a6" name="vendorid" autofocus required readonly value=<?php echo $_SESSION['vendorid'] ?> >
</div><center><br><br>

<p class="error">Once you delete, the admin will confirm your request. Are you sure to delete your account?</p><br>
    
<br><br><br><br><br><br><br><br><br><br><br>
<input type="submit" class="a7" value="DELETE ME">&emsp;&ensp;

</form>

<a href="vendor_account.php"><button class="a7">BACK</button></a>

</body>
</html>
