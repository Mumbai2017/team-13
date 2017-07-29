<html>
<head>
<meta charset="utf-8">


<link rel="stylesheet" type="text/css" href="css1.css">
<meta charset="utf-8">

</head>
<?php

	include ('header_admin.php');


?>
<body>


<?php 
if(isset($_POST['delete_all']))
{
 
	
	$sq11=mysqli_query($connect,"Truncate Table coursemapping");
	 if($sq11==true)
		 echo '<script>alert("ALL Mapping Deleted. ");
	 </script>';
	// header('refresh:5;url:delete_course.php'); 
	
		 
 
 
}

?>