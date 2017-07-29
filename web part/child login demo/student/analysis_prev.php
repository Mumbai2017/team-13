<?php
//FOR ANALYSIS
$sem = $_SESSION['sem'];
$sql_analysis = 'SELECT * FROM course WHERE Sem="'.$sem.'"';
//echo $sql_analysis;
$res_analysis = mysqli_query($connect, $sql_analysis);

$subject_code = array();
$subject_shortname = array();
$subject_obtained = array();


while($row_analysis = mysqli_fetch_array($res_analysis))
{
array_push($subject_code, $row_analysis['Subject_code']);
array_push($subject_shortname, $row_analysis['Subject_shortname']);
//echo $row_analysis['Subject_shortname'];
$subject_c = $row_analysis['Subject_code'];
$sql_test_id = "SELECT * FROM test_identification_table WHERE subject_code='$subject_c'";
$res_test_id = mysqli_query($connect, $sql_test_id);
//echo $sql_test_id;
$total = 0;
$total_obtained =0;
while($row_test_id = mysqli_fetch_array($res_test_id))
{
$sql_student_marks = "SELECT * FROM student_marks WHERE roll_no='$rollno' AND test_id='$test_id'";
$res_student_marks = mysqli_query($connect, $sql_student_marks);
$row_student_marks = mysqli_fetch_array($res_student_marks);
$total += $row_student_marks['marks_total'];
$total_obtained+=$row_student_marks['marks_obtained'];
}

if($total != 0)
$percent = $total_obtained*100/$total;
else
$percent = 10;
array_push($subject_obtained, $percent);
}

$obj = array();
for($i=0; $i<sizeof($subject_shortname); $i++)
{
array_push($obj, array($subject_shortname[$i], $subject_obtained[$i]));
}

$obj= json_encode($obj);
echo $obj;

?>