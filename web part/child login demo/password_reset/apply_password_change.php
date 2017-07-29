<?php
include('../connect.php');

	//echo "<script>alert('DETECTED CLICK');</script>";
	$roll = $_POST['roll'];
	$email = $_POST['email'];
	$otp = $_POST['otp'];
	$new_password = $_POST['new_password'];
	$confirm_new_password = $_POST['confirm_new_password'];
	$otp = $_POST['otp'];
	$sql="SELECT * FROM student WHERE rollno = '$roll' AND email='$email'";
	$res=mysqli_query($connect, $sql);
	$row = mysqli_fetch_array($res);
	//print_r($row);
	$otp_db = $row['otp'];
	//echo $otp_db;
	//echo $otp;
	//echo "BEFORE COMPARISION";
	if(strcmp($otp ,$otp_db) == 0)
	{
			echo "<script> alert('OTP Match'); </script>";
					if(strcmp($new_password, $confirm_new_password) == 0 )
					{
						echo "<script>alert('Passwords Match');</script>";
						$sql_update = "UPDATE `student` SET `password`='$new_password',`otp`='NULL' WHERE rollno = '$roll'";
						$res_update = mysqli_query($connect,$sql_update);
						if($res_update == true)
						{
							echo "<script type='text/javascript'>alert('Update Successful.. Login to continue');</script>";
							echo "<script>window.location='../index.php'</script>";
						}
						else
						{
							echo "<script type='text/javascript'>alert('Something went wrong.. Try again');</script>";	
							echo "<script>window.location='otp_check.php';</script>";
						}
					}
					else
					{
							echo "<script type='text/javascript'>alert('Passwords DO NOT Match');</script>";
							echo "<script>window.location='otp_check.php';</script>";
					}
			
	}
	else
	{
		//echo "IN EL";
		echo "<script>alert('OTP doesn't match');'</script>";
		//echo "OTP doesn't match";
		echo "<script>window.location='otp_check.php';</script>";
		
	}

?>