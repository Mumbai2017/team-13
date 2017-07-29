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

<div class="container" >
<form  class="form-horizontal" name="form0"  method="post">
<div class="form-group">
<label class="control-label col-sm-4">SDRN:</label>
<div class="col-sm-6">
<input class="form-control" required type="text" name="Sdrn" placeholder="SDRN ">
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-4">SUBJECT CODE:</label>
<div class="col-sm-6">
<input  class="form-control" required type="text" name="Subject_code" placeholder="SUBJECT CODE ">
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-4">YEAR:</label>
<div class="col-sm-6">
<input class="form-control" required type="text" name="Year" placeholder="YEAR ">
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-4">DIVISION:</label>
<div class="col-sm-6">
<input class="form-control" required type="text" name="Division" placeholder="Division">
</div>
</div>
<br>
<center>
<button class="button" style="margin-left:10%" type="submit" name="Delete_course_mapp" id="Delete_course_mapp">DELETE COURSE MAPPING</button>
</center>
  </form>
<?php 
if(isset($_POST['Delete_course_mapp']))
{
 $subject_code=$_POST['Subject_code'];
  $sdrn=$_POST['Sdrn'];
   $year=$_POST['Year'];
    $division=$_POST['Division'];
 //echo $subject_code;
 $q111="select * from coursemapping where Subject_code='$subject_code' and Sdrn='$sdrn' and Year='$year' and Division='$division'";
 $q112=mysqli_query($connect,$q111);
// echo $q11;
 $nq111=mysqli_num_rows($q112);
 //echo $nq11;
 if($nq111==0)
 {
	
	 echo ' <script>alert("Details entered are not valid..plz check");</script> ';
	  header('refresh:0 ;url:delete_course_mapping.php');
	
 }
 else
 {
	
	$sq12=mysqli_query($connect,"DELETE FROM `coursemapping` WHERE Subject_code='$subject_code' and Sdrn='$sdrn' and Year='$year' and Division='$division'");
	 if($sq12==true)
		 echo '<script>alert("Course Mapping Deleted. ");
	 </script>';
	 //header('refresh:5;url:delete_course_mapping.php'); 
	
		 
 }
 

}?>
</body>
</html>