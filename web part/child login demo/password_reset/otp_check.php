<html>
<head>
<meta charset="utf-8">
<title>OTP CHECK</title>
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../css/form.css">
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="..\js/bootstrap.min.js"></script>
  <script src="../css/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/header.css">
   <link rel="stylesheet" href="../css/bootstrap-3.3.6-dist/css/bootstrap.min.css">
  
  <script src="../css/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
  
  <STYLE type="text/css" media="print">
 
@media print {
.noPrint {
    display:none;
  }
}
</STYLE>
</head>

<script>
checkPwd = function () {
    var str = document.getElementById('new_password').value;
    if (str.length < 6) {
        alert("Password too short");
        return ("too_short");
    } else if (str.length > 50) {
        alert("Password too long");
        return ("too_long");
    } else if (str.search(/\d/) == -1) {
        alert("Please Enter Number in Password ");
        return ("no_num");
    } else if (str.search(/[a-zA-Z]/) == -1) {
        alert("Please Enter Letter in Password ");
        return ("no_letter");
    } else if (str.search(/[^a-zA-Z0-9\!\@\#\$\%\^\&\*\(\)\_\+\.\,\;\:]/) != -1) {
        alert("Password bad_char");
        return ("Password bad_char");
    }
    alert("PASSWORD OKAY!!");
    return ("ok");
}
</script>

<body>
<?php

include('../connect.php');

?>
<center><img src="../logo.png" alt="RAIT LOGO"><center>
<br>
<form action="apply_password_change.php" method="post">
<!-- <form onclick="checkPwd"> -->
<div class="table-responsive">
<table class="table table-striped">
<tr>
<td>Roll Number : </td>
<td><input type="text" name="roll" value="" required/></td>
</tr>

<tr>
<td>Enter your Email ID : </td>
<td><input type="email" name="email" value="" required/></td>
</tr>

<tr>
<td>Enter your OTP (sent to your registered Email ID) : </td>
<td><input type="text" name="otp" value="" required placeholder="OTP is case-sensitive"/></td>
</tr>

<tr>
<td>Enter your New Pasword : </td>
<td><input type="password" name="new_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required></td>
</tr>

<tr>
<td>Confirm your New Password : </td>
<td><input type="password" name="confirm_new_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required></td>
</tr>

<tr>
<td colspan="2">
<input type="submit" class="btn btn-danger" name="submit_forgot_password"/>
</td>
</tr>
</table>
<div>
</form>
<?php	
?>

</body>
</html>