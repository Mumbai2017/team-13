<?php
session_start();

//can be renamed as personal_details.php
require_once("../connect.php");

// define variables and set to empty values
$rollno =$sr_no= $sem= $l_name= $f_name= $m_name= $year= $division= $batch= $password= $el_1= "";
?>

<html>

<head>
	<title>Welcome Students</title>
	 <meta charset="utf-8">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

	<div style="padding:25px;">
<center>
           <img  src="../logo.png" class="img-responsive"  alt="RAIT LOGO">
       </center>
	   </div>
	   <script>
	   
	   function myfunc()
	   {
	   if(document.getElementById('year').value != 'BE')
			document.getElementById('el_1').disabled=true;
		else
			document.getElementById('el_1').disabled=false;
	   }
	   //window.onload = myfunc();
	   </script>
</head>

<body class="hold-transition" onload="myfunc();">
<center>
		<div class="form-group">
	<table >
	<form id="personal_details" name="personal_details" method="post"  class="form-horizontal">
		
		
			<tr >
				<td><div class="top-buffer"><label for="rollno" class="label label-primary">Roll Number</label></div></td>
				<td><div class="top-buffer"><input type="text" name="rollno" id="rollno" maxlength="8" placeholder="Roll Number" >
			</div></td></tr>

			<tr >
				<td><div class="top-buffer" style="margin-top:20px;"><label for="sr_no" class="label label-primary">Serial Number</label></td>
				<td><div class="top-buffer" style="margin-top:20px;"><input type="text" name="sr_no" id="sr_no" placeholder="Serial Number" autocomplete="off" required></td>
			</div></tr>
			<tr><td><div class="top-buffer" style="margin-top:20px;">
				<label for="sem" class="label label-primary">Semester</label></div></td>
				<td><div class="top-buffer" style="margin-top:20px;"><input type="text" name="sem" id="sem" maxlength="2" placeholder="Semester" autocomplete="off" required></td>
			</div></tr>
			<tr>
				<td><div class="top-buffer" style="margin-top:20px;"><label for="l_name" class="label label-primary">Last Name</label></td>
				<td><div class="top-buffer" style="margin-top:20px;"><input type="text" name="l_name" id="l_name" maxlength="15" placeholder="Last Name" autocomplete="off" required></td>
			</div></tr>
			<tr>
				<td><div class="top-buffer"style="margin-top:20px;"><label for="f_name" class="label label-primary">First Name</label></td>
				<td><div class="top-buffer" style="margin-top:20px;"><input type="text" name="f_name" id="f_name" maxlength="15" placeholder="First Name" autocomplete="off" required></td>
			</div></tr>
			<tr>
				<td><div class="top-buffer" style="margin-top:20px;"><label for="m_name" class="label label-primary">Middle Name</label></td>
				<td><div class="top-buffer" style="margin-top:20px;"><input type="text" name="m_name" id="m_name" maxlength="15" placeholder="Middle Name" autocomplete="off" required></td>
			</div></tr>
			<tr>
				<td><div class="top-buffer" style="margin-top:20px;"><label for="year" class="label label-primary">Year</label>	</td>
				<td><div class="top-buffer" style="margin-top:20px;"><select name="year" id="year" placeholder="Year" required onchange="myfunc();">
					<option value="FE">FE</option>
					<option value="SE">SE</option>
					<option value="TE">TE</option>
					<option value="BE">BE</option>
					</select></td>
			</div></tr>
			
			<tr>
				<td><div class="top-buffer" style="margin-top:20px;"><label for="division" class="label label-primary">Division</label></td>
				<td><div class="top-buffer" style="margin-top:20px;"><input type="text" name="division" id="division" autocomplete="off" maxlength="25" placeholder="Division" required></td>
			</div></tr>
			<tr>
				<td><div class="top-buffer" style="margin-top:20px;"><label for="batch" class="label label-primary">Batch</label></td>
				<td><div class="top-buffer" style="margin-top:20px;"><input type="text" name="batch" id="batch" autocomplete="off" placeholder="Batch" required></td>
			</div></tr>
			<tr>
				<td><div class="top-buffer" style="margin-top:20px;"><label for="password" class="label label-primary">Password</label></td>
				<td><div class="top-buffer" style="margin-top:20px;"><input type="password" name="password" id="password" autocomplete="off" placeholder="Password" required></td>
			</div></tr>
			<tr>
				<td><div class="top-buffer" style="margin-top:20px;"><label for="el_1" class="label label-primary">Elective Subject</label></td>
				<td><div class="top-buffer" style="margin-top:20px;"><input type="text" name="el_1" id="el_1" value="" autocomplete="off" placeholder="Elective"></td>
			</div></tr>
			
			
				<tr><td align= "center" colspan="2"><div class="top-buffer" style="margin-top:20px;"><button type="submit" style="width:100px;" class="btn btn-danger">SUBMIT</button></td>
			</div></tr>
				
			
	</form>
</table>
	</div>
	</center>
</body>
</html>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$rollno = test_input($_POST["rollno"]);
    $sr_no = test_input($_POST["sr_no"]);
    $sem = test_input($_POST["sem"]);
    $l_name = test_input($_POST["l_name"]);
    $f_name = test_input($_POST["f_name"]);
    $m_name = test_input($_POST["m_name"]);
    $year= test_input($_POST["year"]);
    $division = test_input($_POST["division"]);
    $batch = test_input($_POST["batch"]);
    $password = test_input($_POST["password"]);
    $el_1 = $_POST["el_1"];
    
  
$sql = "INSERT INTO `student` (`rollno`, `Serial_no`, `sem`, `Last_name`, `First_name`, `Middle_name`, `year`, `division`, `batch`, `password`, `EL_1`) 
VALUES ('$rollno', '$sr_no', '$sem', '$l_name', '$f_name', '$m_name', '$year', '$division', '$batch', '$password',  '$el_1')";

//mysqli_query($connect, $sql);
	if (mysqli_query($connect, $sql)) {
		$_SESSION["rollno"] = $rollno;
		$_SESSION['form_1_complete']=1;
		//echo "New record created primaryfully";
	} else {
		//echo "Error: " . $sql . "<br>" . mysqli_error($connect);
		echo "Data Not Inserted, Please Try Again After Rechcking The Form Details!";
	}
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
