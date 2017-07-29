<?php
include('header_admin.php');
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


<script type="text/javascript">
    function addToTable(tablename, rollno, name, percent) {
        //alert(tablename);
        var table = document.getElementById(tablename);
        var no_rows = table.rows.length;
        var row = table.insertRow(no_rows);
        row.insertCell(0).innerHTML = rollno;
        row.insertCell(1).innerHTML = name;
        row.insertCell(2).innerHTML = percent;
    }
</script>
<style>
    @media print {
        tr.vendorListHeading {
            background-color: #1a4567 !important;
            -webkit-print-color-adjust: exact;
        }}

    @media print {
        .vendorListHeading th {
            color: white !important;
        }}
</style>

<?php
/**
 * Created by PhpStorm.
 * User: Maurya
 * Date: 7/9/2016
 * Time: 12:12 AM
 */

$subject_code = $_POST['subject'];
$min_avg = $_POST['min_avg_percent_criteria'];
$max_avg = $_POST['max_avg_percent_criteria'];


echo '<center><input type="button" onclick="window.print();" value="PRINT" class="btn btn-danger noPrint" style="width: auto"/></center>';

$sql_course = "SELECT * FROM course WHERE Subject_code='$subject_code'";
$res_course = mysqli_query($connect, $sql_course);
$row_course = mysqli_fetch_array($res_course);
$subject_shortname = $row_course['Subject_shortname'];
$semester = $row_course['Sem'];
$avg_all = $above_all = $below_all = 0;

echo "<center><div class='table-responsive>' ".$subject_shortname."</center>";

$test_id_array = array();

$sql_test_identification = "SELECT * FROM test_identification_table WHERE subject_code='$subject_code' ORDER BY test_id ASC";
$res_test_identification = mysqli_query($connect, $sql_test_identification);
$i = 0;
while ($row_test_id = mysqli_fetch_array($res_test_identification)) //WILL RUN FOR EACH TEST PERTAINING TO THAT SUBJECT CODE
{
    $i++;
    $test_id = $row_test_id['test_id'];
    array_push($test_id_array, $test_id);
    $sql_marks = "SELECT * FROM student_marks WHERE test_id='$test_id'";
    $res_marks = mysqli_query($connect, $sql_marks);

    $avg_count = 0;
    $above_avg_count = 0;
    $below_avg_count = 0;
    $total_student_count = 0;


    echo "<center><div class='panel panel-success' style='width: 80%'>";


    while ($row_marks = mysqli_fetch_array($res_marks)) // WILL RUN FOR EACH STUDENT PERTAINING TO THAT TEST_ID
    {
        $roll_no = $row_marks['roll_no'];
        $sql_name = "SELECT * FROM student WHERE rollno='$roll_no'";
        $res_name = mysqli_fetch_array(mysqli_query($connect, $sql_name));
        $name = $res_name['First_name'] . " " . $res_name['Middle_name'] . " " . $res_name['Last_name'];
        $marks_obt = $row_marks['marks_obtained'];
        $marks_total = $row_marks['marks_total'];
        $percent = $marks_total > 0 ? $marks_obt * 100 / $marks_total : 0;
        /*
        //CAN FETCH NAME AND OTHER DETAILS THROUGH THIS
        $sql_student = "SELECT * FROM student WHERE rollno = '$roll_no'";
        $row_student = mysqli_fetch_array(mysqli_query($connect, $sql_student));
        */
        $total_student_count++;
        if ($percent < $min_avg) {
            $below_avg_count++;
            $tablename = 'below_' . $i;
        } else if ($percent > $max_avg) {
            $above_avg_count++;
            $tablename = 'above_' . $i;
        } else {
            $avg_count++;
            $tablename = 'avg_' . $i;
        }

        //echo '<script type="text/javascript">addToTable("'.$tablename.'","'.$roll_no.'", "'.$name.'","'.$percent.'");</script>';

    }

    $SCR = <<<testwise
<script type="text/javascript">
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
            ['Above Average', {$above_avg_count}],
            ['Average', {$avg_count}],
            ['Below Average', {$below_avg_count}],
        ]);

        // Set chart options
        var options = {'title':'Marks Analysis : SUBJECT:{$subject_shortname}-{$subject_code}, TEST ID:{$test_id}',
            'width':800,
            'height':500};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('{$i}'));
        chart.draw(data, options);
    }
</script>

TOTAL STUDENTS ATTEMPTED -> {$total_student_count}
<div id="{$i}"></div>

</center>
</div><!-- ENDING DIV PANEL-->
testwise;

    echo $SCR;

    $avg_all += $avg_count;
    $above_all += $above_avg_count;
    $below_all += $below_avg_count;
}//END OF WHILE TEST


//DISPLAYING ALL TEST COMBINED DATA
$SCR = <<<alltest
<script type="text/javascript">
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
            ['Above Average', {$above_all}],
            ['Average', {$avg_all}],
            ['Below Average', {$below_all}],
        ]);

        // Set chart options
        var options = {'title':'Marks Analysis COMBINED: SUBJECT:{$subject_shortname}-{$subject_code}, TEST ID: ALL',
            'width':800,
            'height':500};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('all'));
        chart.draw(data, options);
    }
</script>
<div class='panel panel-success' style='width: 80%'>
<center><div id="all"></div></center>
</div>

alltest;

//END DISPLAYING ALL TEST COMIBINED DATA

echo $SCR;


//DISPLAYING TABLE
if($semester>6)
{
	$elective = $row_course['Elective'];
	if($elective != NULL && $elective!='')
		$sql_student = "SELECT * FROM student WHERE sem='$semester' AND (EL_1='$subject_code') ORDER BY batch ASC, Serial_no ASC ";
	else
		$sql_student = "SELECT * FROM student WHERE sem='$semester'  ORDER BY batch ASC, Serial_no ASC ";
}
else
{
	$sql_student = "SELECT * FROM student WHERE sem='$semester' ORDER BY batch ASC, Serial_no ASC ";
}
$res_student = mysqli_query($connect, $sql_student);
//echo $sql_student;
echo "<div class='table-responsive'><center><table border='1' class='table' style='width: 90%; margin-left: auto;  margin-right: auto;'>";
echo '<thead>';
echo "<tr>";
echo "<th>BATCH</th>";
echo "<th>SR NO</th>";
echo "<th>ROLL NO</th>";
echo "<th>NAME</th>";

for ($i = 0; $i < sizeof($test_id_array); $i++) {
    echo "<th>TID:" . $test_id_array[$i] . "</th>";
}
echo "<th>PERCENT</th>";
echo "</tr>";
echo '</thead>';


while ($row_student = mysqli_fetch_array($res_student)) {
    $roll_no = $row_student['rollno'];
    $name = $row_student['First_name'] . " " . $row_student['Middle_name'] . " " . $row_student['Last_name'];
    echo "<tr>";
    echo "<td>" . $row_student['batch'] . "</td>";
    echo "<td>" . $row_student['Serial_no'] . "</td>";
    echo "<td>" . $roll_no . "</td>";
    echo "<td>" . $name . "</td>";
    $marks_obt_all = 0;
    $marks_total_all = 0;

    $sql_marks = "SELECT * FROM student_marks WHERE roll_no='$roll_no'";
    $res_marks = mysqli_query($connect, $sql_marks);

    if (mysqli_num_rows($res_marks) > 0) {
        while ($row_marks = mysqli_fetch_array($res_marks)) {
            $test_id = $row_marks['test_id'];
            if(in_array($test_id, $test_id_array)) {
                $marks_obt = $row_marks['marks_obtained'];
                $marks_total = $row_marks['marks_total'];
                $marks_obt_all += $marks_obt;
                $marks_total_all += $marks_total;

                $percent = $marks_obt * 100 / $marks_total;
                if ($percent < $min_avg)
                    $color = '#ff9900';
                else if ($percent > $max_avg)
                    $color = '#80d4ff';
                else
                    $color = '#ff9999';

                echo "<td bgcolor='" . $color . "'>" . $marks_obt . "/" . $marks_total . "</td>";
            }
        }
    } else {
        $percent = 0;
        if ($percent < $min_avg)
            $color = '#ff9900';
        else if ($percent > $max_avg)
            $color = '#80d4ff';
        else
            $color = '#ff9999';
        for ($j = 0; $j < sizeof($test_id_array); $j++)
            echo "<td> N/A </td>";
    }

    $percent = $marks_total_all > 0 ? ceil(($marks_obt_all * 100) / $marks_total_all) : 0;
    if ($percent < $min_avg)
        $color = '#ff9900';
    else if ($percent > $max_avg)
        $color = '#80d4ff';
    else
        $color = '#ff9999';
    echo "<td bgcolor='" . $color . "'>" . $percent . "</td>";
    echo "</tr>";
}


echo "</table></center></div>";

echo "</div>";//CLASS TABLE RESPONSIVE

?>

<script type="text/javascript">
    // Load the Visualization API and the corechart package.
    google.charts.load('current', {'packages': ['corechart']});

</script>

<style>
    @media print {
        div {
            page-break-inside: avoid;
        }
    }
</style>
