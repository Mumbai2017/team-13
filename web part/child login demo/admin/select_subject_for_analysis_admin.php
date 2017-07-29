<!doctype html>
<html>
<head>
<meta charset="utf-8">


<link rel="stylesheet" type="text/css" href="../../css/css2.css">
<meta charset="utf-8">

</head>
<body>

<?php
/**
 * Created by PhpStorm.
 * User: Maurya
 * Date: 7/9/2016
 * Time: 12:12 AM
 */

	include('header_admin.php');

?>

<form action='subject_analysis_admin.php' method='POST' onsubmit="return avg_val();">
	<center>
		<table border='1' class="table table-striped" style="width: 50%;">
		<tr>
	<td>SUBJECT</td>
	<td>
	 <?php
	 $sql_subjects = "SELECT DISTINCT(Subject_code) FROM coursemapping ORDER BY Year ASC, Division ASC, Subject_code ASC;";
	 $res_subjects = mysqli_query($connect, $sql_subjects);
	 //echo $sql_subjects;
	 echo "<select name='subject' required>";
	 while($row_subjects = mysqli_fetch_array($res_subjects))
	 {
		 $sql_course = "SELECT * FROM course WHERE Subject_code='".$row_subjects['Subject_code']."'";
		 $subject_shortname = mysqli_fetch_array(mysqli_query($connect, $sql_course))['Subject_shortname'];
		echo "<option value=".$row_subjects['Subject_code'].">".$subject_shortname." - ".$row_subjects['Subject_code']."</option>";
	 }
	 echo "</select>";
	 ?>
	 </td>
	 </tr>
		<tr>
			<td>
				SELECT % AS AVERAGE CRITERIA
			</td>
			<td>
				FROM:
				<input type='number' min='0' max='100' name='min_avg_percent_criteria' id='min_avg_percent_criteria' value="30" onchange="avg_val();" required//>
				TO:
				<input type='number' min='0' max='100' name='max_avg_percent_criteria' id='max_avg_percent_criteria' value="50" onchange="avg_val();" required/>
			</td>
		</tr>
	</table>

	<input type='submit' value='SUBMIT'/>
		</center>
</form>
</html>


<script>
	function avg_val() {
		if (document.getElementById('min_avg_percent_criteria').value >= document.getElementById('max_avg_percent_criteria').value) {
			alert("MIN AVG should be smaller than MAX AVG");
			return false;
		}
	}
</script>