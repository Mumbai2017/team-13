<html>
	<head>
		<title>Staff Sign Up Page</title>
		<link rel="stylesheet" href="pure-release-0.6.0/pure-min.css">
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
	</head>
	
	<body>
	<div>
		<center>
			<img src="raitlogo.png"/>
		</center>
	</div>
	
		<div class="div_center">
		
		<form id="staffsignup" name="staffsignup" method="post" 
		action="staffregistration.php" class="pure-form pure-form-aligned">
		
			<div class="pure-control-group">
				<label for="sdrn">SDRN</label>
				<input required type="text" name="sdrn" placeholder="3-Field Unique SDRN">
			</div>
			
			<div class="pure-control-group">
				<label for="name">First Name</label>
				<input required type="text" name="fnm" placeholder="First Name">
			</div>
			
			<div class="pure-control-group">
				<label for="name">Middle Name</label>
				<input required type="text" name="mnm" placeholder="Middle Name">
			</div>
			
			<div class="pure-control-group">
				<label for="name">Last Name</label>
				<input required type="text" name="lnm" placeholder="Last Name">
			</div>
			
			<div class="pure-control-group">
				<label for="dob">Date of Birth</label>
				<input required type="date" name="dob">
			</div>
			
			<div class="pure-control-group">
				<label for="phno">Phone Number</label>
				<input required type="number" name="phno" placeholder="10-Digit Mobile number" max="9999999999" min="7000000000">
			</div>
			
			<div class="pure-control-group">
				<label for="addr">Address</label>
				<textarea name="addr" id="addr" rows="5" cols="30" placeholder="Complete postal address" required></textarea>
			</div>
			
			<div class="pure-control-group">
				<label for="email">E-Mail ID</label>
				<input required type="email" name="email" placeholder="Registered Email ID">
			</div>
			
			<div class="pure-control-group">
				<label for="doj">Date of Joining</label>
				<input required type="date" name="doj">
			</div>
			
			<div class="pure-control-group">
				<label for="hq">Highest Qualification</label>
				<input required type="text" name="hq">
			</div>
			
			<div class="pure-control-group">
				<label for="desig">Designation Held</label>
				<input required type="text" name="desig" placeholder="Current Designation">
			</div>
			
			<div class="pure-control-group">
				<label for="pass">Password</label>
				<input required type="password" name="pass" placeholder="Max 10 characters">
			</div>
			
			<div class="pure-control-group">
				<label for="cpass">Confirm Password</label>
				<input required type="password" name="cpass" placeholder="Max 10 characters">
			</div>
			
			<div class="pure-controls">
				<button type="submit" class="pure-button pure-button-primary">Sign Up</button>
			</div>
		</form>
		</div>
	</body>
</html>