<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Update Details</title>
</head>

<body>
<?php

	include('header_faculty.php'); 
	$sdrn = $_SESSION['sdrn'];
	if(isset($_POST['submit']))	
	{
		$firstname = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$lastname = $_POST['lastname'];
		$dob = $_POST['dob'];
		$department = $_POST['department'];
		$contact_no = $_POST['contact_no'];
		$addr = $_POST['addr'];
		$email = $_POST['email'];
		$doj = $_POST['doj'];
		$qualification = $_POST['qualification'];
		$designation= $_POST['designation'];
		//$password = $_POST['password'];
		//$new_password = $_POST['new_password'];
		//$confirm_new_password = $_POST['confirm_new_password'];
		
			$sql_update = 'UPDATE `faculty` SET `First_name`="'.$firstname.'",`Middle_name`="'.$middlename.'",`Last_name`="'.$lastname.'",`DOB`="'.$dob.'",`Contact_no`="'.$contact_no.'",`Addr`="'.$addr.'",`Email`="'.$email.'",`Doj`="'.$doj.'",`Qualification`="'.$qualification.'",`Desig`="'.$designation.'",`Department`="'.$department.'" WHERE Sdrn = "'.$sdrn.'"';
			//echo $sql_update;
			
			if(mysqli_query($connect,$sql_update))
			{
				echo "<script type='text/javascript'>alert('Update Successful.. Please Login Again to continue');</script>";
				header( "refresh:0 ;url=../" );	
			}
			else
			{
				echo "<script type='text/javascript'>alert('Update Not Successful.. Please Try Again');</script>";
				
				header( "refresh:0 ;url=../" );
			}
	}

?>
</body>
</html>