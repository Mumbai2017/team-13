<?php
/**
 * Created by PhpStorm.
 * User: Maurya
 * Date: 7/5/2016
 * Time: 3:32 PM
 */
include 'header_student.php';
$test_id = $_GET['test_id'];
$check_test = "SELECT * FROM test_identification_table WHERE test_id=$test_id";
$res_check_test = mysqli_query($connect, $check_test);
$row_check_test = mysqli_fetch_array($res_check_test);
$time_alloted = $row_check_test['time_alloted'];
$rollno = $_SESSION['rollno'];
if(!isset($_SESSION['time_remaining'])) {
    $_SESSION['time_remaining'] = $time_alloted;
    echo "STARTING YOUR TIME NOW";
}
else
{
    $time_alloted = $_SESSION['time_remaining'];
}

if(mysqli_num_rows($res_check_test) <= 0)
{
    echo "PLEASE INPUT THE CORRECT TEST NUMBER";
}

else {
    $check_test = "SELECT * FROM student_marks WHERE test_id=$test_id AND roll_no='$rollno'";
    $res_check_test = mysqli_query($connect, $check_test);
    if (mysqli_num_rows($res_check_test) > 0)
        echo "<center>You have already given this test</center>";
    else {
        $sql_test = "SELECT * FROM test_table WHERE test_id=$test_id ORDER BY question_no ASC";
        $res_test = mysqli_query($connect, $sql_test);
        echo "<center>TEST ID->".$test_id;
        echo '<br><div><b>Test closes in <span id="time">' . $time_alloted . '</span> minutes!</div><br><b>';
        echo "<form action='4_start_test_submit.php' method='post'/>";
        echo "<input type='hidden' name='test_id' value='" . $test_id . "'/>";
        //TEMPORARY
        echo "<input type='hidden' name='roll_no' value='$rollno'/>";

        echo "<input type='hidden' name='no_questions' value='" . mysqli_num_rows($res_test) . "''/>";
        echo '<table border="1" class="table table-striped">';

        echo '<thead>';
        echo '<th>Q. No.</th>';
        echo '<th>Question</th>';
        echo '<th>Option A</th>';
        echo '<th>Option B</th>';
        echo '<th>Option C</th>';
        echo '<th>Option D</th>';
        echo '<th>Option E</th>';
        echo '<th>Correct option</th>';
        echo '</thead>';


        $counter = 0;
        while ($row_test = mysqli_fetch_array($res_test)) {
            echo '<tr>';
            echo "<td> (" . ($counter + 1) . ")</td>";
            echo "<td>" . $row_test['question'] . "</td>";
            echo "<td>" . $row_test['a'] . "</td>";
            echo "<td>" . $row_test['b'] . "</td>";
            echo "<td>" . $row_test['c'] . "</td>";
            echo "<td>" . $row_test['d'] . "</td>";
            echo "<td>" . $row_test['e'] . "</td>";
            echo "<td> <select name='answer_".$counter."'>
                        <option value='A'>A</option> 
                        <option value='B'>B</option> 
                        <option value='C'>C</option> 
                        <option value='D'>D</option> 
                        <option value='E'>E</option> 
             </td>";
            echo '</tr>';
			$counter++ ;
        }
        echo '</table>';
        echo '<input type="submit" class="btn btn-success" style="width: auto" id="submit_test" value="SUBMIT"></center>';
        echo '</form>';
    }
}

?>


<script>
function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10)
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (--timer < 0) {
            timer = duration;
			document.getElementById('submit_test').click();
        }
    }, 1000);
}

window.onload = function () {
    var fiveMinutes = <?php echo $time_alloted;?>*60 ,
        display = document.querySelector('#time');
    startTimer(fiveMinutes, display);
};
</script>

