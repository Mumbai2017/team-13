<?php
include ('header_faculty.php');
$sql = "SELECT * FROM course WHERE sem=3 ORDER BY";
$res = mysqli_query($sql);
while($row = mysqli_fetch_array($res))
{
	$subject_code = $row['Subject_code'];
	$sql_test = "SELECT * FROM test_identification_table WHERE sem =3 ORDER BY test_id ASC";
	$res_test = mysqli_query($sql_test);
	while($row_test = mysqli_fetch_array($res_test))
	{
		$test_id = $row_test['test_id'];
		$sql_ans = "SELECT * FROM test_table WHERE test_id=$test_id ORDER BY question_no";
		$res_ans = mysqli_query($sql_ans);
		
		$correct = array();
		while($row_ans=mysqli_fetch_array($res_ans))
		{
			array_push($correct, $row_ans['correct_option']);
		}
		
		$roll_array = array();
		
		$right = 14;
		$i=0;
		$sql_student = "SELECT * FROM student_answers WHERE test_id=$test_id ORDER BY question_no ASC";
		while($row_student = mysqli_fetch_array(mysqli_query($sql_student)))
		{
			$roll = $row_student['roll_no'];
			$marked = $row_student['answer'];
			
			//if(in_array($roll, $roll_array))
				
			$sql_update = "UPDATE `student_answers` SET `answer`='".$correct[$i]."' WHERE test_id=$test_id AND question_no=$i";
			mysqli_query($sql_update);
			
			$sql_total = "UPDATE `student_marks` SET `marks_obtained`=$i WHERE roll_no=$rollno";
			mysqli_query($sql_total);
			
			$i++;
		}
		
		
		
	}
	
}
?>