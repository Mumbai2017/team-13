<?php
include 'header_student.php';
$semester = $sem;
$subject_code = $_POST['subject'];
$roll_no = $_SESSION['rollno'];

$sql_tests = "SELECT * FROM test_identification_table WHERE sem=$semester AND subject_code='$subject_code';";
//echo $sql_tests;
$res_tests = mysqli_query($connect, $sql_tests);
if(mysqli_num_rows($res_tests) > 0) {

	echo "<div class='table-responsive' style='width:100%'><table BORDER='1' class='table table-striped'>";
	echo "<tr>";
	echo "<td>STATUS</td>";
	echo "<td>TEST ID</td>";
	echo "<td>SEMESTER</td>";
	echo "<td>DIVISION</td>";
	echo "<td>SUBJECT CODE</td>";
	echo "<td>NO. OF QUESTIONS</td>";
	echo "<td>TIME ALLOTED (IN MINUTES)</td>";
	echo "</tr>";

	while ($row_tests = mysqli_fetch_array($res_tests)) {

		//CHECK CONDITION IF STUDENT HAS ALREADY ATTEMPTED THE TEST
		//if()
		echo "<tr>";
		$test_id = $row_tests[0];
		$sql_marks = "SELECT * FROM student_marks WHERE roll_no='$roll_no' AND test_id='$test_id'";
		$res_marks = mysqli_query($connect, $sql_marks);
		if(mysqli_num_rows($res_marks) > 0)
			echo "<td><a href='results.php?test_id=$test_id'>View Result</a></td>";
		else
			echo "<td><a href='3_start_test.php?test_id=$test_id'>Start Test</a></td>";
		echo "<td>" . $test_id . "</td>";
		echo "<td>" . $row_tests[1] . "</td>";
		echo "<td>" . $row_tests[2] . "</td>";
		echo "<td>" . $row_tests[3] . "</td>";
		echo "<td>" . $row_tests[4] . "</td>";
		echo "<td>" . $row_tests[5] . "</td>";
		echo "</tr>";
	}
	echo "</table></div>";
}
else
{
	echo "No tests for given semester subject combination";
}
?>