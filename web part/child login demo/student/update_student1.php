<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Update Details</title>
</head>

<body>
<?php

	include('header_student.php'); 
		    $rollno = $_SESSION['rollno'];
	if(isset($_POST['submit']))	
	{
		$rollno = $_SESSION['rollno'];
    $batch= test_input($_POST["batch"]);
	  $name = test_input($_POST["name"]);
	    $branch = test_input($_POST["branch"]);
  $hsc_phy = test_input($_POST["hsc_phy"]);
  $hsc_chem = test_input($_POST["hsc_chem"]);
  $hsc_math = test_input($_POST["hsc_math"]);
  $hsc_pcm = test_input($_POST["hsc_pcm"]);
  $hsc_total = test_input($_POST["hsc_total"]);
  $hsc_pcm_outof = test_input($_POST["hsc_pcm_outof"]);
  $hsc_tot_outof = test_input($_POST["hsc_tot_outof"]);
  $hsc_per = test_input($_POST["hsc_per"]);
  $ssc_maths = test_input($_POST["ssc_maths"]);
  $ssc_maths_outof = test_input($_POST["ssc_maths_outof"]);
  $ssc_total = test_input($_POST["ssc_total"]);
  $ssc_tot_outof = test_input($_POST["ssc_tot_outof"]);
  $ssc_per = test_input($_POST["ssc_per"]);
  $board_district = test_input($_POST["board_district"]);
    $vocational_course = test_input($_POST["vocational_course"]);
  $composite_score = test_input($_POST["composite_score"]);
  $mothertongue = test_input($_POST["mother_tongue"]);
    $admission_year= test_input($_POST["admission_year"]);
  
$sql = "UPDATE `fe_educational_details` SET `roll_no`='$rollno',`batch`='$batch',`name`='$name',`branch`='$branch',`hsc_phy`='$hsc_phy',`hsc_chem`='$hsc_chem',`hsc_math`='$hsc_math',`hsc_pcm`='$hsc_pcm',`hsc_total`='$hsc_total',`hsc_pcm_outof`='$hsc_pcm_outof',`hsc_tot_outof`='$hsc_tot_outof',`hsc_per`='$hsc_per',`ssc_maths`='$ssc_maths',`ssc_total`='$ssc_total',`ssc_maths_outof`='$ssc_maths_outof',`ssc_tot_outof`='$ssc_tot_outof',`ssc_per`='$ssc_per',`board_district`='$board_district',`vocational_course`='$vocational_course',`composite_score`='$composite_score',`mothertongue`='$mother_tongue',`admission_year`='$admission_year' ";

//mysqli_query($connect, $sql);
	if (mysqli_query($connect, $sql)) {
		echo "New record created successfully";
		
	} 

			
			else
			{
				echo "<script type='text/javascript'>alert('Update Not Successful.. Please Try Again');</script>";
				}
	}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
</body>
</html>