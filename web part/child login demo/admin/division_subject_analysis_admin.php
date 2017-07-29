<?php
/**
 * Created by PhpStorm.
 * User: Maurya
 * Date: 7/10/2016
 * Time: 4:07 AM
 */

include('header_admin.php');

echo '<center><input type="button" class="btn btn-success noPrint" style="width: auto" value="PRINT" onclick="window.print();"/><br><br><br></center>';

$class = $_POST['class'];
$class = explode('-', $class);
$year = $class[0];
$division = $class[1];
$subject_code = $class[2];
$min_avg = $_POST['min_avg_percent_criteria'];
$max_avg = $_POST['max_avg_percent_criteria'];
$test_id_array = array();
$subject_shortname_array = array();

$sql_test_identification = "SELECT * FROM test_identification_table WHERE subject_code='$subject_code' ORDER BY test_id ASC";
$res_test_identification = mysqli_query($connect, $sql_test_identification);
while ($row_test_id = mysqli_fetch_array($res_test_identification)) //WILL RUN FOR EACH TEST PERTAINING TO THAT SUBJECT CODE
{
    $test_id = $row_test_id['test_id'];
    array_push($subject_shortname_array, $row_test_id['subject_code']);
    array_push($test_id_array, $test_id);
}

$sql_course = "SELECT * FROM course WHERE Subject_code='$subject_code'";
$res_course = mysqli_query($connect, $sql_course);
$row_course = mysqli_fetch_array($res_course);
$subject_shortname = $row_course['Subject_shortname'];
$semester = $row_course['Sem'];



//$sql_student = "SELECT * FROM student WHERE sem='$semester' AND batch LIKE '$division%' ORDER BY batch ASC, Serial_no ASC";
if($semester>6)
{
	$elective = $row_course['Elective'];
	if($elective != NULL && $elective!='')
		$sql_student = "SELECT * FROM student WHERE sem='$semester' AND (EL_1='$subject_code') AND batch LIKE '$division%' ORDER BY batch ASC, Serial_no ASC ";
	else
		$sql_student = "SELECT * FROM student WHERE sem='$semester' AND batch LIKE '$division%' ORDER BY batch ASC, Serial_no ASC ";
}
else
{
	$sql_student = "SELECT * FROM student WHERE sem='$semester' ORDER BY batch ASC, Serial_no ASC ";
}
//echo $sql_student;
$res_student = mysqli_query($connect, $sql_student);
//echo $sql_student;
echo "<center><div class='panel panel-primary table-responsive'>";
echo '<div class="panel-heading"> <center><b>'.$subject_shortname.'</b></center></div>';
echo "<table border='1' class='table'>";
echo "<tr>";
echo "<th>BATCH</th>";
echo "<th>SR NO</th>";
echo "<th>ROLL NO</th>";
echo "<th>NAME</th>";

for($i=0; $i<sizeof($test_id_array); $i++)
{
    echo "<th>TID:".$test_id_array[$i]."</th>";
}
echo "<th>PERCENT</th>";
echo "</tr>";


while ($row_student = mysqli_fetch_array($res_student)) 
{
    $roll_no = $row_student['rollno'];
    $name = $row_student['First_name']." ".$row_student['Middle_name']." ".$row_student['Last_name'];
    echo "<tr>";

    echo "<td>" . $row_student['batch'] . "</td>";
    echo "<td>" . $row_student['Serial_no'] . "</td>";
    echo "<td>" . $roll_no . "</td>";
    echo "<td>" . $name . "</td>";
    $marks_obt_all=0;
    $marks_total_all=0;

    $sql_marks = "SELECT * FROM student_marks WHERE roll_no='$roll_no'";
    $res_marks = mysqli_query($connect, $sql_marks);

    if(mysqli_num_rows($res_marks) >0) {
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
    }
    else
    {
        $percent =0;
        if ($percent < $min_avg)
            $color = '#ff9900';
        else if ($percent > $max_avg)
            $color = '#80d4ff';
        else
            $color = '#ff9999';
        for($j=0; $j<sizeof($test_id_array); $j++)
            echo "<td> N/A </td>";
    }

    $percent = $marks_total_all > 0 ? ceil(($marks_obt_all*100)/$marks_total_all) : 0;
    if($percent < $min_avg)
        $color = '#ff9900';
    else if($percent > $max_avg)
        $color = '#80d4ff';
    else
        $color = '#ff9999';
    echo "<td bgcolor='".$color."'>".$percent."</td>";
    echo "</tr>";
}


echo "</table></div></center>";
