<?php
include "connect.php";

$sem=$_POST['semester'];
$div='ALL';
$subject=$_POST['subject'];
$no_questions=$_POST['no_questions'];
$time_alloted=$_POST['time_alloted'];
$timestamp_test_given = date("Y-m-d h:i:s");
//CURRENTLY TEST WILL BE DISPLAYED AS SOON AS IT GETS UPLOADED
$timestamp_test_start = $timestamp_test_given;
//echo $timestamp_test_given;
$test_id = mysqli_fetch_array(mysqli_query($connect, "SELECT test_id FROM test_identification_table ORDER BY test_id DESC LIMIT 1"))['test_id'];
$test_id +=1;
//echo $test_id;


$sql_test_identification_insert="insert ignore into test_identification_table(test_id, sem,division,subject_code,no_of_questions, time_alloted, timestamp_test_given, timestamp_test_open) values ($test_id,'$sem','$div','$subject','$no_questions', $time_alloted, '$timestamp_test_given', '$timestamp_test_start')";
//echo $sql_test_identification_insert;
$res_test_identification=mysqli_query($connect,$sql_test_identification_insert);

if($res_test_identification==true)
{
	for($i=0; $i<$no_questions; $i++)
	{
		$question = $_POST['question_'.$i];
		$a = $_POST['a_'.$i];
		$b = $_POST['b_'.$i];
		$c = $_POST['c_'.$i];
		$d = $_POST['d_'.$i];
		$correct_option = $_POST['correct_'.$i];
		$sql_question_insert = "INSERT INTO `test_table`(`test_id`, `question_no`,`question`, `a`, `b`, `c`, `d`, `correct_option`) VALUES ('$test_id', $i,'$question','$a','$b','$c','$d','$correct_option')";
		mysqli_query($connect, $sql_question_insert);
	}
	echo "<script>alert('Submitted Successfully')</script>";
	//header("location: ques.php");	  
}
?>