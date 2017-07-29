<?php
  include ('header_admin.php');

?>

<?php 
if(isset($_POST['delete_all']))
{
 
	
	$sq11=mysqli_query($connect,"Truncate Table course");
	 if($sq11==true)
		 echo '<script>alert("Course Deleted. ");
	 </script>';
	header('refresh:5;url:delete_course.php'); 
	
		 
 
 
}

?>