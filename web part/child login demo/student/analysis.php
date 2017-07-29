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
    <table cellpadding="1" cellspacing="1">
        <tr>
            <th align="center">T_id</th>
            <th align="center">Subject_code</th>
            <th align="center">Score</th>
            <th align="center">Percent</th>
        </tr>

        <?php
        $rollno = $_SESSION['rollno'];
        $sql = mysqli_query($connect, "select * from student_marks where roll_no='$rollno'");

        while ($res = mysqli_fetch_array($sql)) {
            $test_id = $res['test_id'];
            $sql1 = mysqli_fetch_array(mysqli_query($connect, "select subject_code from test_identification_table where test_id='$test_id'"));
            echo "<tr>";
            echo "<td><a href='results.php?test_id=" . $test_id . "'>$test_id</a></td>";
            echo "<td>" . $sql1[0] . "</td>";
            echo "<td>" . $res['marks_obtained'] . "/" . $res['marks_total'] . "</td>";
            $per = ($res['marks_obtained'] / $res['marks_total']) * 100;
            echo "<td>" . $per . "</td>";
            echo "</tr>";
        }


        //FOR ANALYSIS
        $sem = $_SESSION['sem'];
        $sql_analysis = 'SELECT * FROM course WHERE Sem="' . $sem . '"';
        //echo $sql_analysis;
        $res_analysis = mysqli_query($connect, $sql_analysis);

        $subject_code = array();
        $subject_shortname = array();
        $subject_obtained = array();
        $attempted_array = array();

        while ($row_analysis = mysqli_fetch_array($res_analysis)) {
            array_push($subject_code, $row_analysis['Subject_code']);
            array_push($subject_shortname, $row_analysis['Subject_shortname']);
            //echo $row_analysis['Subject_shortname'];
            $subject_c = $row_analysis['Subject_code'];
            $sql_test_id = "SELECT * FROM test_identification_table WHERE subject_code='$subject_c'";
            $res_test_id = mysqli_query($connect, $sql_test_id);
            //echo $sql_test_id;
            $total = 0;
            $total_obtained = 0;
            while ($row_test_id = mysqli_fetch_array($res_test_id)) {
                $sql_student_marks = "SELECT * FROM student_marks WHERE roll_no='$rollno' AND test_id='$test_id'";
                $res_student_marks = mysqli_query($connect, $sql_student_marks);
                $row_student_marks = mysqli_fetch_array($res_student_marks);
                $total += $row_student_marks['marks_total'];
                $total_obtained += $row_student_marks['marks_obtained'];
                $timestamp_attempted = $row_student_marks['timestamp_attempted'];
            }

            if ($total != 0)
            {
                $percent = $total_obtained * 100 / $total;
                array_push($attempted_array, $timestamp_attempted);
            }
            else
            {
                $percent = 5;
                array_push($attempted_array, "No tests taken");
            }
            array_push($subject_obtained, $percent);
        }

        $obj = array();
        for ($i = 0; $i < sizeof($subject_shortname); $i++) {
            array_push($obj, array($subject_shortname[$i].", Last Test Taken:".$attempted_array[$i],$subject_obtained[$i], 'silver'));
        }
        $obj = json_encode($obj);
        ?>

    </table>
</div>

<?php
$HTML =<<<start
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
    google.charts.load('current', {packages: ['corechart', 'bar']});
    google.charts.setOnLoadCallback(drawMultSeries);


    function drawMultSeries() {
        var data =new google.visualization.DataTable()

        data.addColumn('string', 'Subject');
        data.addColumn('number', 'Percent');
        data.addColumn({ role: 'style' });
        data.addRows({$obj});


        var options = {
            title: 'PERFORMANACE ANALYSIS',
            chartArea: {width: '50%'},
            hAxis: {
                title: 'SUBJECTS',
                minValue: 0,
                maxValue:100
            },
            vAxis: {
                title: 'PERCENTAGE'
            }
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>

<div id="chart_div" style="width:900px; height:500px"></div>

</body>
</html>
start;

echo $HTML;