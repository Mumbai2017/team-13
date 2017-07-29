<?php
include('header_admin.php');
?>
<html>
<head>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript">
        // Load the Visualization API and the corechart package.
        google.charts.load('current', {'packages': ['corechart']});

    </script>


    <script type='text/javascript'>
        function showDiv(string) {
            //document.getElementById('balance').style.display = 'none';

            //TO HIDE IF ALREADY OPEN
            if (document.getElementById(string).style.display == 'block') {
                document.getElementById(string).style.display = 'none';
            }
            //TO OPEN IF HIDDEN
            else {
                document.getElementById(string).style.display = 'block';
            }
        }
    </script>

    
    <script type="text/javascript">
        function addToTable(tablename, rollno, batch, sr_no, name, percent) {
            //alert(tablename);
            var table = document.getElementById(tablename);
            var no_rows = table.rows.length;
            var row = table.insertRow(no_rows);
            row.insertCell(0).innerHTML = rollno;
            row.insertCell(1).innerHTML = batch;
            row.insertCell(2).innerHTML = sr_no;
            row.insertCell(3).innerHTML = name;
           // row.insertCell(4).innerHTML = percent;
        }
    </script>

</head>
<body>
<center>
    <input type="button" class="btn btn-primary noPrint" style="width: auto" value="PRINT" onclick="window.print();"/>
    <p class="noPrint">Barchart denotes the number of students, not percentage</p>
    <div id="chart_div" class="container"></div>
</center>


<!--
<div>
    <table id="below">

    </table>
</div>

<div>
    <table id="above">

    </table>
</div>

<div>
    <table id="avg">

    </table>
</div>
-->

<?php
/**
 * Created by PhpStorm.
 * User: Maurya
 * Date: 7/9/2016
 * Time: 12:12 AM
 */

$class = $_POST['class'];
$class = explode('-', $class);
$year = $class[0];
$division = $class[1];
$min_avg = $_POST['min_avg_percent_criteria'];
$max_avg = $_POST['max_avg_percent_criteria'];


$avg_all = $above_all = $below_all = 0;


$subject_codes = array();
$subject_shortnames = array();
$subject_names = array();
$elective_array = array();
$sql_subject = "SELECT * FROM course WHERE Year='$year'";
$res_subject = mysqli_query($connect, $sql_subject);
while ($row_subject = mysqli_fetch_array($res_subject)) {
	
	$sub_code = $row_subject['Subject_code'];
	$sql_coursemapping = "SELECT * FROM coursemapping WHERE Subject_code='$sub_code' AND Year='$year' AND Division='$division'";
	if(mysqli_num_rows(mysqli_query($connect, $sql_coursemapping)) >0)
	{		
		array_push($subject_codes, $row_subject['Subject_code']);
		array_push($subject_shortnames, $row_subject['Subject_shortname']);
		array_push($subject_names, $row_subject['Subject_name']);
		if($row_subject['Elective'] == 'E')
		{
			array_push($elective_array, $row_subject['Subject_code']);
		}
		$sem = $row_subject['Sem'];
	}
}

//echo mysqli_num_rows($res_student);
$obj_arr = array();


for ($i = 0; $i < sizeof($subject_shortnames); $i++) 
{
    $marks_obt_all = 0;
    $marks_total_all = 0;
    $sub_name = $subject_shortnames[$i];
    $sub_code = $subject_codes[$i];
    $avg_count = $above_avg_count = $below_avg_count = 0;
		if($sem>6)
	{
		$elective = $row_subject['Elective'];
		if($elective != NULL && $elective!='')
			$sql_student = "SELECT * FROM student WHERE sem='$sem' AND (EL_1='$subject_code') AND batch LIKE '$division%' ORDER BY batch ASC, Serial_no ASC ";
		else
			$sql_student = "SELECT * FROM student WHERE sem='$sem' AND batch LIKE '$division%' ORDER BY batch ASC, Serial_no ASC ";
	}
	else
	{
		$sql_student = "SELECT * FROM student WHERE sem='$sem' AND batch LIKE '$division%' ORDER BY batch ASC, Serial_no ASC ";
	}
	
	//echo mysqli_num_rows(mysqli_query($connect,$sql_student));
	if(mysqli_num_rows(mysqli_query($connect,$sql_student)) <=0)
		continue;
   
 //  $sql_student = "SELECT * FROM student WHERE sem='$sem' AND batch LIKE '$division%' ORDER BY batch ASC, Serial_no ASC";
//echo $sql_student;
    $res_student = mysqli_query($connect, $sql_student);
//echo mysqli_num_rows($res_student);


    //TABLES FOR STUDENT DATA
    
    echo '<center><br><input type="button" name="print_analysis" value="Analyse '.$subject_names[$i].'"class="btn btn-lg noPrint" style="width: auto" onclick="showDiv(\'subject_div_'.$i.'\')"/>';
    echo "<div class='panel panel-success table-responsive' style='width: 90%; display: none' id='subject_div_" . $i . "'>";
    echo "<div class='panel-heading' style='width: 90%'><b>" . $subject_names[$i] . "</b></div>";
    echo "<div class='panel panel-primary  table-responsive' style='width: 90%' ><div class='panel-heading'><b>" . $sub_name . '-BELOW AVG </b></div><table class="table table-striped"  id="below_' . $i . '"></table></div>';
    echo "<div class='panel panel-danger  table-responsive'  style='width: 90%'><div class='panel-heading'><b>" . $sub_name . '-AVG </b></div><table class="table table-striped"  id="avg_' . $i . '"></table></div>';
    echo "<div class='panel panel-warning  table-responsive' style='width: 90%' ><div class='panel-heading'><b>" . $sub_name . '-ABOVE AVG </b></div><table class="table table-striped"  id="above_' . $i . '"></table></div>';
    echo "</div></center>";

    while ($row_student = mysqli_fetch_array($res_student)) {

        $roll_no = $row_student['rollno'];
        $name = $row_student['First_name'] . " " . $row_student['Middle_name'] . " " . $row_student['Last_name'];
        $batch = $row_student['batch'];
        $sr_no = $row_student['Serial_no'];
		$el_1 = $row_student['EL_1'];
		
		if(in_array($sub_code, $elective_array))
		{
			if($el_1 != $sub_code)
				continue;
		}


        $percent = 0;
		$marks_obt_all =0;
		$marks_total_all =0;

        $sql_test_id = "SELECT * FROM test_identification_table WHERE subject_code='$sub_code'";
        $res_test_id = mysqli_query($connect, $sql_test_id);
        $test_given = 0;
        while ($row_test_id = mysqli_fetch_array($res_test_id)) {
            $test_id = $row_test_id['test_id'];
            //TO GET STUDENT MARKS
            $sql_marks = "SELECT * FROM student_marks WHERE roll_no='$roll_no' AND test_id='$test_id'";
            $res_marks = mysqli_query($connect, $sql_marks);
            if (mysqli_num_rows($res_marks) > 0) {
                $row_marks = mysqli_fetch_array($res_marks);
                $marks_obt = $row_marks['marks_obtained'];
                $marks_total = $row_marks['marks_total'];
                $test_given++;
				

                $marks_obt_all += $marks_obt;
                $marks_total_all += $marks_total;
            }
        }

        $percent = $test_given > 0 ? (($marks_obt_all * 100) / $marks_total_all) : 0;
        //echo $percent;
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

        echo '<script type="text/javascript">addToTable("' . $tablename . '","' . $roll_no . '", "' . $batch . '", "' . $sr_no . '", "' . $name . '","' . $percent . '");</script>';

    }


    array_push($obj_arr, array($sub_name, $below_avg_count, $avg_count, $above_avg_count));

}//FOR SUBJECT LOOP ENDS

$jsonData = json_encode($obj_arr);
//echo $jsonData;
//GENERATING GRAPH

$SCR = <<<classwise
<script type="text/javascript">
    // Set a callback to run when the Google Visualization API is loaded.
    google.charts.setOnLoadCallback(drawChart);
    
    function drawChart() {
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Subject Name');
        data.addColumn('number', 'Below Avg');
        data.addColumn('number', 'Avg');
        data.addColumn('number', 'Above Avg');

        data.addRows({$jsonData});
        /*
        data.addRows([
        ['2010', 10, 24, 20],
        ['2020', 16, 22, 23],
        ['2030', 28, 19, 29]        
        ]);
        */

        // Set chart options
        var options = {'title':'Class Analysis : {$year} {$division}',
            'width':800,
            'height':500,
            legend: { position: 'top', maxLines: 3 },
            bar: { groupWidth: '75%' },
            isStacked: true,
            
            };

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>

classwise;

//END GENERATING GRAPH

echo $SCR;

?>


</body>

</html>



