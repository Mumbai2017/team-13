<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Update Details</title>
</head>

<body>
<?php
	include("../connect.php");
	include('header_student.php'); 
	$rollno = $_SESSION['rollno'];
	if(isset($_POST['submit']))	
	{
		
		$sr_no = $_POST['sr_no'];
		$sem = $_POST['sem'];
		$last_name = $_POST['lastname'];
		$first_name = $_POST['firstname'];
		$middle_name = $_POST['middlename'];
		$year = $_POST['year'];
		$division = $_POST['division'];
		$batch = $_POST['batch'];
		$phone_no = $_POST['phone_no'];
		$email = $_POST['email'];
		//$password = $_POST['password'];
		//$new_password = $_POST['new_password'];
		//$confirm_new_password = $_POST['confirm_new_password'];
		
			$sql_update = 'UPDATE `student` SET `Serial_no`="'.$sr_no.'",`sem`="'.$sem.'",`Last_name`="'.$last_name.'",`First_name`="'.$first_name.'",`Middle_name`="'.$middle_name.'",`year`="'.$year.'",`division`="'.$division.'",`batch`="'.$batch.'",`Phone_no`="'.$phone_no.'",`email`="'.$email.'" WHERE rollno = "'.$rollno.'"';
			//echo $sql_update;
			
			if(mysqli_query($connect,$sql_update))
			{
				echo "<script type='text/javascript'>alert('Update Successful.. Please Login Again to continue');  window.location='../index.php';</script>";
				//header( "refresh:0 ;url=../" );	
				exit();
			}
			else
			{
				echo "<script type='text/javascript'>alert('Update Not Successful.. Please Try Again'); window.location='../index.php';</script>";
				
				//header( "refresh:0 ;url=../" );
				
			}
	}

?>
</body>
</html>