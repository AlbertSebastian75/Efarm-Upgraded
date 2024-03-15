<!DOCTYPE html>
<html>
<head>
    <title>Register | Efarm</title>
</head>
<body>
	<style>
		body{
			background-image: url('../css/image/img11.jpg');
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-size: cover;
		}
		h1{
    		text-decoration: underline;
 			color: white;
    		text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;
    		font-size: 75px;
		}
		h2{
    		text-decoration: underline;
 			color: white;
    		text-shadow: 1px 1px 2px black, 0 0 25px indianred, 0 0 5px darkblue;
    		font-size: 35px;
		}
		a.a1{
			text-decoration: none;
			background-color:lavender;
			font-size:20px;
			padding: 10px 25px;
			border-radius:12px;
			border:2px solid turquoise;
			margin:50px;
		}
		b{
			font-size:20px;
			color:darkred;
			margin:25px;
		}
		td{
			padding:5px;
		}
		p.error{
			color:darkred;
			font-size:35px;
		}
		p.msg{
			color:darkred;
			font-size:35px;
		}
		a:hover {
  			background-color: darkgray;
			padding: 15px 35px;
		}
		input[type=email], [type=password], [list=types], [type=text], .w111, textarea
		{
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 5px;
			box-sizing: border-box;
			font-size: 15px;
		}
		input[type=submit] 
		{
			width: 150px;
			background-color: NavajoWhite;
			color: darkblue;
			padding: 14px 20px;
			margin: 8px 0;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			font-size: 20px;
		}	
        .nav-right {
            float: right;
        } 
        .nav-left {
            float: left;
        }   
	</style>
  <center>
    <h1>Efarm</h1>
	<h2>Supplier Registration</h2>
<center>
  <?php
			session_start();
		    if(isset($_SESSION['tmp10']))
		    {
				echo '<br><p class="error">'.$_SESSION['tmp10'].'</p>';
		    	unset($_SESSION['tmp10']);
		    }
		?>
</center>
  <form method="post" action="insert_supplier_connection.php" enctype="multipart/form-data">
   <table>
  	            <tr><th>Full Name:</th><td>
    			<input type="text" name="name" class="w1" required pattern="[A-Za-z ]+" title="No Special Character" autofocus>
    			<td></tr><tr><th>Email:</th><td>
    			<input type="email"  name="email" class="w1" required>    			
          <td></tr><tr><th>Aadhar:</th><td>
    			<input type="password"  name="aadhar" class="w1" required minlength="12" maxlength="12" required pattern="[0-9]+">
				<td></tr><tr><th>Mobile:</th><td>
    			<input type="text" name="mobile" class="w1" required minlength="10" maxlength="10" required pattern="[0-9]+">
<td></tr><tr><th>Location</th><td>
                <input list="types" class="b2" class="w1"  name="location" placeholder="Select your prefered location" required pattern="[A-Z ]+" title="Capital Letters Only">
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
					<tr> <th>Address:</th>
                <td><textarea rows="2" cols="15" class="w1" name="adr"  pattern="[A-Za-z0-9 ]+" placeholder="Address with PIN CODE" required  title="No numbers and Special Characters"></textarea></td><br>
				<tr><th>City:</th>
				<td><input type="text" name="city" class="w1" required pattern="[A-Za-z ]+" title="No numbers and Special Characters" ></td></tr>
    			<tr><th>District:</th>
				<td><input type="text" name="district" class="w1" required pattern="[A-Za-z ]+" title="No numbers and Special Characters" ></td></tr>
    		
 <td></tr><tr><th>State</th><td>
                <input list="types" class="w1"  name="states" placeholder="Select From List" required pattern="[A-Z ]+" title="Capital Letters Only">
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
				<tr><th>Country: </th>
				<td><input type="text" name="country" class="w1"  readonly value="India" ></td></tr>
    			<td></tr><tr><th>Password:</th><td>
    			<input type="password" name="password" class="w1" required minlength="6" pattern="[^' ']+" title="No Spaces" ><td></tr>
				
                </datalist>
				</table>
    		<input type="submit" class="w2" value="REGISTER"></center>
	</form>
  <br><br><br><center>
  <a class="a1" href="login.php">Login</a>
		<a class="a1" href="../index.php">Home</a></center>
</body>
</html>