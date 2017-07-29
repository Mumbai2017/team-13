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
include('header_faculty.php');
$sdrn = $_SESSION['sdrn'];

?>
<br><br>
<form action='division_subject_analysis.php' method='POST' onsubmit="return avg_val();">
    <center>
        <table border='1' class="table table-condensed" style="width:60%">

            <tr>
                <td>YEAR</td>
                <td>
                    <select name="class">
                        <?php
                        $sql_coursemapping = "SELECT * FROM coursemapping WHERE Sdrn='$sdrn'";
                        $res_coursemapping = mysqli_query($connect, $sql_coursemapping);
                        while($row_coursemapping = mysqli_fetch_array($res_coursemapping))
                        {
                            $year = $row_coursemapping['Year'];
                            $division = $row_coursemapping['Division'];
                            $subject_code = $row_coursemapping['Subject_code'];
                            echo "<option value='".$year."-".$division."-".$subject_code."'>".$year." - ".$division." - ".$subject_code."</option>";
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