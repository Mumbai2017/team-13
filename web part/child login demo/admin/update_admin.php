<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Update Details</title>
</head>

<body>
<?php

	include('header_admin.php'); 
	$sdrn = $_SESSION['username'];
	if(isset($_POST['submit']))	
	{
		
		$email_id = $_POST['Email_id'];
		$phone_no = $_POST['phone_no'];
		
		
			$sql_update = 'UPDATE `admin_details` SET `Email_id`="'.$email_id.'",`phone_no`="'.$phone_no.'" WHERE username= "'.$sdrn.'"';
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