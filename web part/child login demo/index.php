<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>RAIT STUDENT PROFILE MANAGEMENT SYSTEM</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

</head>
<body>



<div class="container">

	<center>
		<div style="padding:25px;">
			<img src="logo.png" class="img-responsive" alt="RAIT LOGO">
		</div>
	</center>
	<br>
 <br><center><h3><b>STUDENT QUALITY ANALYSIS SYSTEM</b></h3> </center>

	<div class="row">
		<br><br><br>
		<form class="form-horizontal col-md-offset-3 col-md-9" method="POST" action="authenticate.php">

			<div class="form-group ">
				<label for="text" class="col-sm-2 control-labe
	l">Roll no/User ID:</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="userid" style="width:" 50%";"
					placeholder="13CE1000" required>
				</div>
			</div>

			<div class="form-group ">
				<label for="inputEmail3" class="col-sm-2 control-label">Password</label>
				<div class="col-sm-6">
					<input type="password" class="form-control" name="password" placeholder="Password" required>
				</div>
			</div>

			<div class="row" style="display:inline">
				<button type="submit" name="login" style="width:190px;" class="btn btn-primary">LOGIN</button>
				<a href="student/personal_details.php"><input type="button" style="width:190px" class="btn btn-success"
										value="SIGNUP"/></a>
				<a href="password_reset"><input style="width:190px" type="button" class="btn btn-warning "
												value="FORGOT PASSWORD"/></a>

			</div>

	</div>


	</form>


</div>

</body>
</html>