<!doctype html>
<html>
<head>
<meta charset="utf-8">


<link rel="stylesheet" type="text/css" href="../../css/css2.css">
<meta charset="utf-8">

</head>
<body>
<?php   
   

	include('header_student.php'); 
	    $rollno = $_SESSION['rollno'];
	$sql="SELECT * FROM `fe_educational_details` WHERE roll_no='$rollno'";
	$res=mysqli_query($connect,$sql) /*or die(mysql_error())*/;
	$count=mysqli_num_rows($res);
if($count>0)
	{
		$row_entry = mysqli_fetch_array($res);
		echo '<div>';
		echo '<table class="table table-striped" border="0"><form  class="form-horizontal" action="update_student1.php" method="POST" onsubmit="myfunction()">';
		
		echo '<tr>';
		echo '<td><b><center>';
		echo 'ROLL NO: ';
		echo '</td>';
		echo '<td style="padding-left:50px ;font-size:20px"><b>';
		echo $rollno;
		echo '</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td><b><center>';
		echo ' NAME : ';
		echo '</td>';
		echo '<td>';
		$name = $row_entry['name'];
		echo '<input type="text" value="'.$name.'" name="name"/> ';
		echo '</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td><b><center>';
		echo 'BRANCH : ';
		echo '</td>';
		echo '<td>';
		$branch = $row_entry['branch'];
		echo '<input type="text" value="'.$branch.'" name="branch"/> ';
		echo '</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td><b><center>';
		echo ': ';
		echo '</td>';
		echo '<td>';
		$batch = $row_entry['batch'];
		echo '<input type="text" value="'.$batch.'" name="batch"/> ';
		echo '</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td><b><center>';
		echo 'HSC PHYSICS : ';
		echo '</td>';
		echo '<td>';
		$hsc_phy = $row_entry['hsc_phy'];
		echo "<input type='text' value='$hsc_phy' name='hsc_phy'/> ";
		echo '</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td><b><center>';
		echo 'HSC CHEM : ';
		echo '</td>';
		echo '<td>';
		$hsc_chem = $row_entry['hsc_chem'];
		echo "<input type='text' value='$hsc_chem' name='hsc_chem'/> ";
		echo '</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td><b><center>';
		echo 'HSC MATH : ';
		echo '</td>';
		echo '<td>';
		$hsc_math = $row_entry['hsc_math'];
		echo "<input type='text' value='$hsc_math' name='hsc_math'/> ";
		echo '</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td><b><center>';
		echo 'HSC PCM : ';
		echo '</td>';
		echo '<td>';
		$hsc_pcm = $row_entry['hsc_pcm'];
		echo "<input type='text' value='$hsc_pcm' name='hsc_pcm'/> ";
		echo '</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td><b><center>';
		echo 'HSC TOTAL : ';
		echo '</td>';
		echo '<td>';
		$hsc_total = $row_entry['hsc_total'];
		echo "<input type='text' value='$hsc_total' name='hsc_total'/> ";
		echo '</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td><b><center>';
		echo 'HSC PCM OUT OF : ';
		echo '</td>';
		echo '<td>';
		$hsc_pcm_outof = $row_entry['hsc_pcm_outof'];
		echo "<input type='text' value='$hsc_pcm_outof' name='hsc_pcm_outof'/> ";
		echo '</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td><b><center>';
		echo 'HSC TOTAL OUT OF: ';
		echo '</td>';
		echo '<td>';
		$hsc_tot_outof = $row_entry['hsc_tot_outof'];
		echo "<input type='text' value='$hsc_tot_outof' name='hsc_tot_outof'/> ";
		echo '</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td><b><center>';
		echo 'HSC PERCENT : ';
		echo '</td>';
		echo '<td>';
		$hsc_per = $row_entry['hsc_per'];
		echo "<input type='text' value='$hsc_per' name='hsc_per'/> ";
		echo '</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td><b><center>';
		echo 'SSC MATHS : ';
		echo '</td>';
		echo '<td>';
		$ssc_maths = $row_entry['ssc_maths'];
		echo "<input type='text' value='$ssc_maths' name='ssc_maths'/> ";
		echo '</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td><b><center>';
		echo 'SSC TOTAL : ';
		echo '</td>';
		echo '<td>';
		$ssc_total = $row_entry['ssc_total'];
		echo "<input type='text' value='$ssc_total' name='ssc_total'/> ";
		echo '</td>';
		echo '</tr>';
		
		
		echo '<tr>';
		echo '<td><b><center>';
		echo 'SSC MATHS OUT OF : ';
		echo '</td>';
		echo '<td>';
		$ssc_maths_outof = $row_entry['ssc_maths_outof'];
		echo "<input type='text' value='$ssc_maths_outof' name='ssc_maths_outof'/> ";
		echo '</td>';
		echo '</tr>';
		
		
		echo '<tr>';
		echo '<td><b><center>';
		echo 'SSC TOTAL OUT OF : ';
		echo '</td>';
		echo '<td>';
		$ssc_tot_outof = $row_entry['ssc_tot_outof'];
		echo "<input type='text' value='$ssc_tot_outof' name='ssc_tot_outof'/> ";
		echo '</td>';
		echo '</tr>';
		
		
		echo '<tr>';
		echo '<td><b><center>';
		echo 'SSC PER : ';
		echo '</td>';
		echo '<td>';
		$ssc_per = $row_entry['ssc_per'];
		echo "<input type='text' value='$ssc_per' name='ssc_per'/> ";
		echo '</td>';
		echo '</tr>';
		
		
		echo '<tr>';
		echo '<td><b><center>';
		echo 'BOARD DISTRICT : ';
		echo '</td>';
		echo '<td>';
		$board_district = $row_entry['board_district'];
		echo "<input type='text' value='$board_district' name='board_district'/> ";
		echo '</td>';
		echo '</tr>';
		
		
		echo '<tr>';
		echo '<td><b><center>';
		echo 'VOCATIONAL COURSE : ';
		echo '</td>';
		echo '<td>';
		$vocational_course = $row_entry['vocational_course'];
		echo "<input type='text' value='$vocational_course' name='vocational_course'/> ";
		echo '</td>';
		echo '</tr>';
		
		
		echo '<tr>';
		echo '<td><b><center>';
		echo 'COMPOSITE SCORE : ';
		echo '</td>';
		echo '<td>';
		$composite_score = $row_entry['composite_score'];
		echo "<input type='text' value='$composite_score' name='composite_score'/> ";
		echo '</td>';
		echo '</tr>';
		
		
		echo '<tr>';
		echo '<td><b><center>';
		echo 'MOTHER TONGUE	: ';
		echo '</td>';
		echo '<td>';
		$mothertongue = $row_entry['mothertongue'];
		echo "<input type='text' value='$mothertongue' name='mothertongue'/> ";
		echo '</td>';
		echo '</tr>';
		
		
		echo '<tr>';
		echo '<td><b><center>';
		echo 'ADMISSION YEAR: ';
		echo '</td>';
		echo '<td>';
		$admission_year = $row_entry['admission_year'];
		echo "<input type='text' value='$admission_year' name='admission_year'/> ";
		echo '</td>';
		echo '</tr>';
		
		
		echo '<tr>';
		echo '<td colspan="2">';
		//$designation = $row_entry['Desig'];
		echo '<center><input type="submit" class="button"name="submit"/>';
		echo '</td>';
		echo '</tr>';
		
		echo '</table></form>';
		echo '</div>';
	}

	
?>
</html>