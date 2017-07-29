<?php
include 'header_student.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>STUDENT DASHBOARD : RAIT STUDENT PROFILE MANAGEMENT SYSTEM</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <style>

        th {
            height: 50px;
        }

        table {
            border-collapse: collapse;
            margin-top: 20px;
            margin-left: 30px;
            margin-right: 50px;
            width: 80%;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2
        }

        th {
            background-color: #EF5D5D;
            color: white;

        }
    </style>
</head>
<body>
<div align="center">

    <?php


    $test_id = $_GET['test_id'];
    $roll_no = $_SESSION['rollno'];
    $total_marks = 0;
    $total_outof = 0;

    $sql_student = "SELECT * FROM test_identification_table  where test_id='$test_id' ";
    //echo $sql_student;
    $res_student = mysqli_query($connect, $sql_student);

    if (mysqli_num_rows($res_student) > 0) {
        echo '<input type="button" onclick="window.print();" class="btn btn-success noPrint" style="width: auto" value="PRINT"/><br>';
        echo "TEST ID->".$test_id;
        echo "<br>ROLL NO->".$roll_no;


        echo '<table border="1"  cell spacing="1" cell padding="1" >';

        echo '<tr>';
        echo '<td>Question No.</td>';
        echo "<td> Marked </td>";
        echo "<td> Correct </td>";
        echo '<td>Marks</td>';
        echo '</tr>';

        while ($row_student = mysqli_fetch_array($res_student)) {

            $test_id = $row_student['test_id'];
            $subject_code = $row_student['subject_code'];
            $sql_course = "SELECT * FROM course WHERE subject_code='$subject_code'";
            $subject_name = mysqli_fetch_array(mysqli_query($connect, $sql_course))['Subject_name'];
            echo "<br>SUBJECT NAME->".$subject_name;


            $sql_student_ans = "SELECT * FROM student_answers where roll_no='$roll_no' and test_id='$test_id' ORDER BY question_no";
            $res_student_ans = mysqli_query($connect, $sql_student_ans);

            while ($row_student_ans = mysqli_fetch_array($res_student_ans)) {
                echo '<tr>';
                $question_no = $row_student_ans['question_no'];
                $marked_option = $row_student_ans['answer'];

                $sql_ans = "SELECT * FROM test_table WHERE test_id=$test_id AND question_no='$question_no'";
                $res_ans = mysqli_fetch_array(mysqli_query($connect, $sql_ans));
                $correct_option = $res_ans['correct_option'];

                $total_outof++;
                echo '<td>(' . ($question_no + 1) . ') '.$res_ans['question'].'</td>';
                echo '<td>(' . $marked_option . ') '.$res_ans[strtolower($marked_option)].'</td>';
                echo '<td>(' . $correct_option . ') '.$res_ans[strtolower($correct_option)].'</td>';
                if ($marked_option == $correct_option) {
                    echo '<td>1</td>';
                    $total_marks++;
                } else {
                    echo '<td>0</td>';
                }
                echo '</tr>';
            }


        }

        echo '</table>';

        echo "<br><br><b>TOTAL MARKS -> ".$total_marks."/" . $total_outof.'</b>';
        $wrong_marks = $total_outof - $total_marks;

    }
    else
    {
        echo "Invalid TEST ID, please try again";
    }
    ?>
</div>



<?php

$HTML = <<<start
<!--Load the AJAX API-->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

    // Load the Visualization API and the corechart package.
    google.charts.load('current', {'packages':['corechart']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.charts.setOnLoadCallback(drawChart);
   
    // Callback that creates and populates a data table,
    // instantiates the pie chart, passes in the data and
    // draws it.
    function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Correct');
        data.addColumn('number', 'Total');

        data.addRows([
            ['Correct Answer', {$total_marks}],
            ['Wrong Answers', {$wrong_marks}],
        ]);

        // Set chart options
        var options = {'title':'MARKS ANALYSIS FOR {$subject_name} - TEST ID {$test_id}',
            'width':800,
            'height':500};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }


</script>
<!--ALIGN THIS FOR CHART ORIENTATION-->
<center><div id="chart_div"></div></center>
start;

echo $HTML;
?>


</body>
</html>

