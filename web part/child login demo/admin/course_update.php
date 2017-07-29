<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>COURSE UPDATE</title>
</head>


<body>
<?php


  include ('header_admin.php');

?>


<?php
if(isset($_POST['course_update']))
{
	
	
		$dept = $_POST['did'];
		
		$year = $_POST['Year'];
		$sem = $_POST['SEM'];
		$Sub_name = $_POST['Subject_name'];
		$Sub_shortname = $_POST['Subject_shortname'];
		$Sub_code = $_POST['Subject_code'];
						
		
		
		$sql = "INSERT INTO `course` VALUES ('$dept', '$sem', '$Sub_code','$Sub_name','$Sub_shortname','$year')";
		//echo $sql;
		if(mysqli_query($connect,$sql))
			{
				echo "<script type='text/javascript'>alert('COURSE SuccessfullY UPDATED.. ');</script>";
				header( "refresh:0 ;url=index.php" );	
			}
			else
			{
				echo "<script type='text/javascript'>alert(' COURSE NOT SuccessfullY UPDATED.. Please Try Again');</script>";
				
				header( "refresh:0 ;url=index.php" );
			}
	}

header('refresh:5;url:../index.php');
?>


</div>


</body>
</html>