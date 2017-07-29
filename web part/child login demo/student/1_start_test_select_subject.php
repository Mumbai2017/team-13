<?php
//echo dirname(__DIR__);
include 'header_student.php';
?>
<html>
<form action="2_start_test_select_testid.php" method="POST">
<center>
<div class="table-responsive" style="width:80%">
<table name='test_input_table' class="table table-condensed">
	<tr>
	<td>SEMESTER : </td>
		<td>
		<?php echo $sem; ?>
		</td>
	<tr>
 
	<tr>
	<td>SUBJECT</td>
	<td>
	 <?php
	 $sql_subjects = "SELECT * FROM COURSEMAPPING WHERE  Year='$year' AND Division='$division' ";
	 $res_subjects = mysqli_query($connect, $sql_subjects);
	 
	 
	 //echo $sql_subjects;
	 echo "<select name=subject>";
	 while($row_subjects = mysqli_fetch_array($res_subjects))
	 {
		 $sub_code = $row_subjects['Subject_code'];
		 $sql_subjects1 = "SELECT * FROM COURSE WHERE Subject_code='$sub_code'";
		 //echo $sql_subjects1;
		 $res_subjects1 = mysqli_query($connect, $sql_subjects1);
		 $row_subjects1 = mysqli_fetch_array($res_subjects1);
		 echo "<option value=".$sub_code.">".$row_subjects1['Subject_shortname']." - ".$sub_code."</option>";
	 }
	 echo "</select>";
	 ?>
	 </td>
	 </tr>
</table>
</div>
<br><br>
<input type="submit" class="btn btn-success" name="Submit"/> </center>
</form>

</html>