<?php
include '../connect.php';
include 'header_faculty.php';
$sdrn = $_SESSION['sdrn'];
?>
<html>
<head>
    <title> Quiz </title>
</head>

<body>
<form action="2_testinput_setpaper.php" method="POST">
    <table name='test_input_table' align="center" cellspacing="10">

        <tr>
            <td height="10px" colspan="3"></td>
        </tr>
        <tr>
            <td><label class="label label-primary">SUBJECT</label></td>
            <td width="20px"></td>
            <td>
                <?php
                $sql_subjects = "SELECT * FROM coursemapping WHERE Sdrn='$sdrn'";
                $res_subjects = mysqli_query($connect, $sql_subjects);
                //echo $sql_subjects;
                echo "<select name='subject' required>";
                while ($row_subjects = mysqli_fetch_array($res_subjects)) {
                    $sql_course = "SELECT * FROM course WHERE Subject_code='" . $row_subjects['Subject_code'] . "'";
                    $subject_shortname = mysqli_fetch_array(mysqli_query($connect, $sql_course))['Subject_shortname'];
                    echo "<option value=" . $row_subjects['Subject_code'] . ">" . $subject_shortname . " - " . $row_subjects['Subject_code'] . "</option>";
                }
                echo "</select>";
                ?>
            </td>
        </tr>
        <tr>
            <td height="10px" colspan="3"></td>
        </tr>
        <tr>
            <td><label class="label label-primary">NUMBER OF QUESTIONS</label></td>
            <td width="20px"></td>
            <td>
                <input type="number" name="no_questions" id="no_questions" min="1" value="5"
                       onchange="populate_question_table();" required>
            </td>
        </tr>

        <tr>
            <td height="10px" colspan="3"></td>
        </tr>
        <tr>
            <td><label class="label label-primary">Time Alloted (In minutes)</label></td>
            <td width="20px"></td>
            <td>
                <input type="number" name="time_alloted" id="time_alloted" min="10" required>
            </td>
        </tr>

    </table>


    <div id="questions_div" class="top-buffer">

    </div>

    <center><input type="submit" value="Submit" class="btn btn-warning">&nbsp&nbsp&nbsp&nbsp<input type="reset"
                                                                                                   class="btn btn-success"
                                                                                                   value="Reset">
    </center>

</form>
</body>
<script>
    window.onload = populate_question_table()
    function populate_question_table() {
        var questions_div = document.getElementById('questions_div');
        var str = '<table name="questions_table" class="table table-condensed">';
        var no_questions = document.getElementById('no_questions').value;
        if (no_questions > 100)
            alert("MAXIMUM 100 QUESTIONS PER TEST");
        else if (no_questions < 1)
            alert("MINIMUM 1 QUESTION REQUIRED");
        else {
//alert (no_questions);
            str += '<thead>';
            str += '<th>Q. No.</th>';
            str += '<th>Question</th>';
            str += '<th>Option A</th>';
            str += '<th>Option B</th>';
            str += '<th>Option C</th>';
            str += '<th>Option D</th>';
            str += '<th>Option E</th>';
            str += '<th>Correct option</th>';
            str += '</thead>';

            for (i = 0; i < no_questions; i++) {
                str += '<tr>';
                str += '<td>' + (i + 1) + '</td>'
                str += '<td><input type="textarea" required rows="5" cols="10" name="question_' + i + '"  placeholder="QUESTION ' + (i + 1) + '"> </td>';
                str += '<td><input type="text" required name="a_' + i + '" id="a_' + i + '" > </td>';
                str += '<td><input type="text" required name="b_' + i + '" id="b_' + i + '" > </td>';
                str += '<td><input type="text" required name="c_' + i + '" id="c_' + i + '" > </td>';
                str += '<td><input type="text" required name="d_' + i + '" id="d_' + i + '" > </td>';
                str += '<td><input type="text" required name="e_' + i + '" id="e_' + i + '" > </td>';

                str += '<td> <select name="correct_' + i + '" required> \
		<option value=""></option> \
		<option value="A">A</option> \
		<option value="B">B</option> \
		<option value="C">C</option> \
		<option value="D">D</option> \
		<option value="E">E</option> \
		</select></td>';

                str += '</tr>';
            }

            str += '<table>';
            questions_div.innerHTML = str;
        }
    }
</script>
</html>
