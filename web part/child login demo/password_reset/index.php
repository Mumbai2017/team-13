<html>
    <head>
		<title>
			Reset Password Page
		</title>
		
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="..\js/bootstrap.min.js"></script>
  <script src="../css/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
	</head>
	
	<body>

		<center>
  			<div style="padding:25px; height:100px;" >
    		  <img  src="../logo.png"  class="img-responsive" alt="RAIT LOGO">
  			</div>
				<br><br>
	
			<fieldset align = "center">
				<legend>  Password Reset Form</legend>
	
		
<br>

<!--
	<form class="form-horizontal col-md-offset-3 col-md-6" id="changepassword" name="changepassword" method="post" action="reset_password.php" >

<div class="form-group ">
    <label for="text" class="col-sm-2 control-label">Enter roll no:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="rollno" style="width:'50%';" placeholder="13ce1000" >
    </div>
  </div>

  <div class="form-group ">
    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail3" name="email" placeholder="Email">
    </div>
  </div>
    <div class="form-group">
    <div class="col-sm-offset-1 col-sm-10">
      <button type="submit" name="submit" class="btn btn-default">Reset Password</button>
    </div>
  </div>
</form>
-->
  <form  method="post" action="reset_password.php" >
  <div class="table-responsive">
  <table class="table table-striped">
  <tr>
  <td>Enter roll no:</td>
  <td><input type="text" class="form-control" name="rollno" style="width:'50%';" placeholder="10CE1000" required></td>
  </tr>
  
  <tr>
   <td>Email</td>
   <td><input type="email" class="form-control" id="inputEmail3" name="email" placeholder="Email" required></td>
  </tr>
  
  <tr>
   <td colspan="2"><center><button type="submit" name="submit_password_reset" class="btn btn-danger">Reset Password</button></center></td>
  </tr>
  
  <tr>
   <td colspan="2"><center><button type="button" name="otp_check" onclick="window.location='otp_check.php'" class="btn btn-warning">Continue to Fill OTP</button></center></td>
  </tr>
  
  </table>
  </div>
   </form>
  </center>


		
</fieldset>







</body>

   
</html>
