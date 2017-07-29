<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Subject Allocation</title>
</head>

<?php

	include ('header_admin.php');





?>
<body>



<?php
if(isset($_POST['sub_alloc']))
{
	
	
		$s1 = $_POST['suid'];
		$sub1 = $_POST['S_c'];
		$year = $_POST['Year'];
		$div = $_POST['Division'];

		
		$s0 = "INSERT INTO `coursemapping`(`Sdrn`, `Subject_code`, `Year`, `Division`, `Lec_count`) VALUES ('$s1','$sub1','$year','$div','0')";
		if(mysqli_query($connect,$s0))
			{
				echo "<script type='text/javascript'>alert('  SuccessfullY ALLOCATED.. ');</script>";
				header( "refresh:0 ;url=index.php" );	
			}
			else
			{
				echo "<script type='text/javascript'>alert(' NOT SuccessfullY ALLOCATED.. Please Try Again');</script>";
				
				header( "refresh:0 ;url=index.php" );
			}
	}   

//header('refresh:5;url:../index.php');
?>


</body>
</html>