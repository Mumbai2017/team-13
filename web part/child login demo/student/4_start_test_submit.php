<?php
/**
 * Created by PhpStorm.
 * User: Maurya
 * Date: 7/5/2016
 * Time: 5:36 PM
 */
include 'header_student.php';
$test_id = $_POST['test_id'];
$roll_no = $_POST['roll_no'];
$no_questions = $_POST['no_questions'];

$sql_check_option = "SELECT * FROM test_table WHERE test_id=$test_id ORDER BY question_no ASC";
$res_check_option = mysqli_query($connect, $sql_check_option);
$ans = array();
$timestamp = date("Y-m-d h:i:s");

while($row_check_option = mysqli_fetch_array($res_check_option))
{
    array_push($ans, $row_check_option['correct_option']);
}
$correct = 0;
for($i=0; $i<$no_questions; $i++) {
    $answer = $_POST['answer_'.$i];
    $sql_student_answers = "INSERT INTO `student_answers`(`test_id`, `roll_no`, `question_no`, `answer`) VALUES ($test_id,'$roll_no', $i,'$answer')";
    //echo $sql_student_answers;
    $res_student_answers = mysqli_query($connect, $sql_student_answers);
    if($res_student_answers != TRUE)
        echo "<br><br>Couldn't record response for question ".($i+1);
    if($answer == $ans[$i]) {
        $correct++;
    }
    //echo "MARKED RESPONSE->".$answer." ACTUAL ANSERR->".$ans[$i]."<br>";
    //echo $correct;
}

//echo "<br><br>You obtained ".$correct." / ".$no_questions;
$sql_student_marks = "INSERT INTO `student_marks`(`roll_no`, `test_id`, `marks_obtained`, `marks_total`, `timestamp_attempted`) VALUES ('$roll_no',$test_id,$correct,$no_questions,'$timestamp')";
if(mysqli_query($connect, $sql_student_marks) != TRUE)
    echo "<br><br>COULD NOT CAPTURE YOUR MARKS, PLEASE TRY AGAIN";


?>

<script>
alert ("Test submitted Successfully");
window.location="results.php?test_id=<?php echo $test_id?>";
</script>