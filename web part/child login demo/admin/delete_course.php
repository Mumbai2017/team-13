<?php
  include ('header_admin.php');

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>DELETE COURSE  PAGE</title>
<link rel="stylesheet" type="text/css" href="../../css/form.css">
</head>
<body>

<br>
<div class="container">
<form  class="form-horizontal" name="form0"  method="post">
<div class="form-group">
<label class="control-label col-sm-5">SUBJECT CODE:</label>
<div class="col-sm-3">
<input class="form-control" required type="text" name="Subject_code" placeholder="SUBJECT CODE ">
</div>
</div>
<br>
  <center>
  <button type="submit" class="button" name="Delete_course" id="Delete_course">DELETE COURSE</button>
</center>
  </form>
<?php 
if(isset($_POST['Delete_course']))
{
 $subject_code=$_POST['Subject_code'];
 //echo $subject_code;
 $q11="select * from course where Subject_code='$subject_code'";
 $q12=mysqli_query($connect,$q11);
// echo $q11;
 $nq11=mysqli_num_rows($q12);
 //echo $nq11;
 if($nq11==0)
 {
	
	 echo ' <script>alert("Not a valid Subject code ");</script> ';
	  header('refresh:0 ;url:delete_course.php');
	
 }
 else
 {
	
	$sq11=mysqli_query($connect,"DELETE FROM `course` WHERE `Subject_code` = '$subject_code'");
	 if($sq11==true)
		 echo '<script>alert("Course Deleted. ");
	 </script>';
	// header('refresh:5;url:delete_course.php'); 
	
		 
 }
 
}

?>
</body>
</html>