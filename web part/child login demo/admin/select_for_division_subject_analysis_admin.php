<!doctype html>
<html>
<head>
    <meta charset="utf-8">


    <link rel="stylesheet" type="text/css" href="../../css/css2.css">
    <meta charset="utf-8">

</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: Maurya
 * Date: 7/9/2016
 * Time: 12:12 AM
 */

include '../connect.php';
include('header_admin.php');

?>
<br><br>
<form action='division_subject_analysis_admin.php' method='POST' onsubmit="return avg_val();">
    <center>
        <table border='1' class="table table-condensed" style="width:60%">

            <tr>
                <td>YEAR</td>
                <td>
                    <select name="class">
                        <?php
                        $sql_coursemapping = "SELECT * FROM coursemapping ORDER BY Year ASC, Division ASC, Subject_code ASC";
                        $res_coursemapping = mysqli_query($connect, $sql_coursemapping);
                        while($row_coursemapping = mysqli_fetch_array($res_coursemapping))
                        {
                            $year = $row_coursemapping['Year'];
                            $division = $row_coursemapping['Division'];
                            $subject_code = $row_coursemapping['Subject_code'];

                            $sql_course = "SELECT * FROM course WHERE Subject_code='$subject_code'";
                            $res_course = mysqli_query($connect, $sql_course);
                            $row_course = mysqli_fetch_array($res_course);
                            $subject_shortname = $row_course['Subject_shortname'];

                            echo "<option value='".$year."-".$division."-".$subject_code."'>".$year." - ".$division." - ".$subject_shortname." - ".$subject_code."</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>


            <tr>
                <td>
                    SELECT % AS AVERAGE CRITERIA
                </td>
                <td>
                    FROM:
                    <input type='number' min='0' max='100' name='min_avg_percent_criteria' id='min_avg_percent_criteria' value="30" onchange="avg_val();" required//>
                    TO:
                    <input type='number' min='0' max='100' name='max_avg_percent_criteria' id='max_avg_percent_criteria' value="50" onchange="avg_val();" required/>
                </td>
            </tr>
        </table>
        <input type='submit' class="btn" value='SUBMIT'/></center>
</form>
</html>

<script>
    function avg_val() {
        if (document.getElementById('min_avg_percent_criteria').value >= document.getElementById('max_avg_percent_criteria').value) {
            alert("MIN AVG should be smaller than MAX AVG");
            return false;
        }
    }
</script>