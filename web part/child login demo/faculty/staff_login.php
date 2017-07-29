<html>
	<head>
		<title>Login Page</title>
		<style>
	.div_center {  
    width:50%;  
    height:auto;  
    padding:5px;  
    position:fixed;  
    left:50%;  
    top:40%;  
    margin-left:-250px;  
    margin-top:-250px;  
}  
 
</style>
		<link rel="stylesheet" href="pure-release-0.6.0/pure-min.css">
	</head>

	<body>
	
	<div>
		<center>
			<img src="raitlogo.png"/>
		</center>
	</div>
	
		<div class="div_center">
			<form id="staffloginform" name="staffloginform" method="post" action="staffvalidatelogin.php" class="pure-form">
				<fieldset>
					
					
					<table width="30%" cellpadding="7" cellspacing="7">
						<tr>
							<td colspan="2" align="center"><h4>Welcome Professor</h4></td>
						</tr>
						<tr>
							<td width="30%" align="center"> Username: </td>
							<td width="70%"><input type="text" name="sdrn" id="sdrn" required></td>
						</tr>
						<tr>
							<td align="center"> Password: </td>
							<td><input type="password" name="password" id="password" required></td>
						</tr>
						<tr>
							<td>&nbsp </td>
							<td>&nbsp </td>
						</tr>
						<tr>
							<td align="center"> <input type="submit" style="font-size:18px"></td>
							<td align="center"> <input type="reset" style="font-size:18px"></td>
						</tr>
						<tr>
							<td>&nbsp </td>
							<td>&nbsp </td>
						</tr>
						<tr>
							<td colspan="2" align="center"><label><a href="staffforgotpassword.php">Forgot Password</a></br></label></td>
						</tr>
						<tr>
							<td>&nbsp </td>
							<td>&nbsp </td>
						</tr>
						<tr>
							<td colspan="2" align="center"><label><a href="staffsignup.php">Sign Up</a></label></td>
						</tr>
					</table>
				</fieldset>
			</form>
		</div>

	</body>
</html>