<?php
session_start();

//can be renamed as personal_details.php
require_once("connect.php");

// define variables and set to empty values
$roll_no =$sr_no= $batch= $f_name= $m_name= $l_name= $student_contact= $parent_contact= $mail_id= $recent_address= $permanent_address= $branch= $mothertongue = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$roll_no=$_SESSION["roll_no"];
	//start checking db for existing user
	$sql="SELECT * FROM `personal_details` WHERE roll_no='$roll_no'";
	$res=mysqli_query($connect,$sql) /*or die(mysql_error())*/;
	$count=mysqli_num_rows($res);

if($count==0)
{
	$roll_no = $_SESSION["roll_no"];
    $sr_no = test_input($_POST["sr_no"]);
    $batch = test_input($_POST["batch"]);
    $f_name = test_input($_POST["f_name"]);
    $m_name = test_input($_POST["m_name"]);
    $l_name = test_input($_POST["l_name"]);
    $student_contact = test_input($_POST["student_contact"]);
    $parent_contact = test_input($_POST["parent_contact"]);
    $mail_id = test_input($_POST["mail_id"]);
    $recent_address = test_input($_POST["recent_address"]);
    $permanent_address = test_input($_POST["permanent_address"]);
    $branch = test_input($_POST["branch"]);
    $mothertongue = test_input($_POST["mothertongue"]);
	
  
$sql = "INSERT INTO `personal_details` (`roll_no`, `sr_no`, `batch`, `first_name`, `middle_name`, `last_name`, `student_contact`, `parent_contact`, `mail_id`, `recent_address`, `permanent_address`, `branch`, `mothertongue`) 
VALUES ('$roll_no', '$sr_no', '$batch', '$f_name', '$m_name', '$l_name', '$student_contact', '$parent_contact', '$mail_id', '$recent_address', '$permanent_address', '$branch', '$mothertongue')";

//mysqli_query($connect, $sql);
	if (mysqli_query($connect, $sql)) {
		$_SESSION["roll_no"] = $roll_no;
		$_SESSION['form_1_complete']=1;
		//echo "New record created successfully";
		header("Location: educational_details.php");	
	} else {
		//echo "Error: " . $sql . "<br>" . mysqli_error($connect);
		echo "Data Not Inserted, Please Try Again After Rechcking The Form Details!";
	}
}
else
{
$_SESSION['form_1_complete']=1;
$_SESSION["roll_no"] = $roll_no;
header("Location: educational_details.php");
}
	
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

<html>

<head>
	<title>Welcome Students</title>
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
	
	<form id="personal_details" name="personal_details" method="post" class="pure-form pure-form-aligned" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<fieldset>
			<div class="pure-control-group">
				<label for="roll_no">Roll Number</label>
				<input type="text" name="roll_no" id="roll_no" maxlength="8" placeholder="Roll Number" value="<?php echo $_SESSION["roll_no"]; ?>" disabled>
			</div>
			<div class="pure-control-group">
				<label for="batch">Batch</label>
				<input type="text" name="batch" id="batch" maxlength="2" placeholder="Batch" autocomplete="off" required>
			</div>
			<div class="pure-control-group">
				<label for="sr_no">Serial Number</label>
				<input type="text" name="sr_no" id="sr_no" placeholder="Serial Number" autocomplete="off" required>
			</div>
			<div class="pure-control-group">
				<label for="f_name">First Name</label>
				<input type="text" name="f_name" id="f_name" maxlength="15" placeholder="First Name" autocomplete="off" required>
			</div>
			<div class="pure-control-group">
				<label for="m_name">Middle Name</label>
				<input type="text" name="m_name" id="m_name" maxlength="15" placeholder="Middle Name" autocomplete="off" required>
			</div>
			<div class="pure-control-group">
				<label for="l_name">Last Name</label>
				<input type="text" name="l_name" id="l_name" maxlength="15" placeholder="Last Name" autocomplete="off" required>
			</div>
			<div class="pure-control-group">
				<label for="mail_id">E-mail</label>
				<input type="email" name="mail_id" id="mail_id" autocomplete="off" maxlength="25" placeholder="E-mail" required>
			</div>
			<div class="pure-control-group">
				<label for="student_contact">Mobile Number</label>
				<input type="text" name="student_contact" id="student_contact" autocomplete="off" placeholder="Mobile Number" required>
			</div>
			<div class="pure-control-group">
				<label for="parent_contact">Parent' Mobile Number</label>
				<input type="text" name="parent_contact" id="parent_contact" autocomplete="off" placeholder="Parent' Mobile Number" required>
			</div>
			<div class="pure-control-group">
				<label for="branch">Branch</label>	
				<select name="branch" id="branch" placeholder="Branch" required>
					<option value="COMPS">Computer Science</option>
					<option value="IT">Information Technology</option>
					<option value="INSTRU">Instrumentation</option>
					<option value="EXTC">EXTC</option>
					<option value="ETRX">Electronics</option>
				</select>
			</div>
			<div class="pure-control-group">
				<label for="recent_address">Recent Address</label>
				<textarea name="recent_address" id="recent_address" rows="2" cols="50" maxlength="100" placeholder="Recent Address" autocomplete="off" required></textarea>
			</div>
			
			<div class="pure-control-group">
				<label for="permanent_address">Permanent Address</label>
				<textarea name="permanent_address" id="permanent_address" rows="2" cols="50" maxlength="100" placeholder="Permanent Address" autocomplete="off" required></textarea>
			</div>
			<div class="pure-control-group">
				<label for="mothertongue">Mothertongue</label>
				<input type="text" name="mothertongue" id="mothertongue" maxlength="15" placeholder="Mothertongue" autocomplete="off" required>
			</div>
			<div class="pure-controls">
				<button type="submit" class="pure-button pure-button-primary">Next</button>
			</div>
				
		</fieldset>		
	</form>

	</div>
	
</body>
</html>