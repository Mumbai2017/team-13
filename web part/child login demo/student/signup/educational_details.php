<?php
session_start();

if (!isset($_SESSION['form_1_complete'])) {
    header("Location: index.php");
}

require_once("../../connect.php");

// define variables and set to empty values
$hsc_phy = $hsc_chem = $hsc_math = $hsc_pcm = $hsc_total = $hsc_pcm_outof = $hsc_tot_outof = $hsc_per = $ssc_maths = $ssc_maths_outof = $ssc_total = $ssc_tot_outof = $ssc_per = $ssc_medium = $board_district = $vocational_course = $composite_score = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $roll_no = $_SESSION["roll_no"];

    //start checking db for existing user
    $sql = "SELECT * FROM `fe_educational_details` WHERE roll_no='$roll_no'";
    $res = mysqli_query($connect, $sql) /*or die(mysql_error())*/
    ;
    $count = mysqli_num_rows($res);

    if ($count == 0) {
        $roll_no = $_POST["roll_no"];
        $hsc_phy = test_input($_POST["hsc_phy"]);
        $hsc_chem = test_input($_POST["hsc_chem"]);
        $hsc_math = test_input($_POST["hsc_math"]);
        $hsc_pcm = test_input($_POST["hsc_pcm"]);
        $hsc_total = test_input($_POST["hsc_total"]);
        $hsc_pcm_outof = test_input($_POST["hsc_pcm_outof"]);
        $hsc_tot_outof = test_input($_POST["hsc_tot_outof"]);
        $hsc_per = test_input($_POST["hsc_per"]);
        $ssc_maths = test_input($_POST["ssc_maths"]);
        $ssc_maths_outof = test_input($_POST["ssc_maths_outof"]);
        $ssc_total = test_input($_POST["ssc_total"]);
        $ssc_tot_outof = test_input($_POST["ssc_tot_outof"]);
        $ssc_per = test_input($_POST["ssc_per"]);
        $board_district = test_input($_POST["board_district"]);
        $composite_score = test_input($_POST["composite_score"]);
        $vocational_course = test_input($_POST["vocational_course"]);

        $sql = "INSERT INTO `fe_educational_details` (`roll_no`, `hsc_phy`, `hsc_chem`, `hsc_math`, `hsc_pcm`, `hsc_total`, `hsc_pcm_outof`, `hsc_tot_outof`, `hsc_per`, `ssc_maths`, `ssc_maths_outof`, `ssc_total`, `ssc_tot_outof`, `ssc_per`,  `board_district`, `vocational_course`, `composite_score`) 
VALUES ('$roll_no', '$hsc_phy', '$hsc_chem', '$hsc_math', '$hsc_pcm', '$hsc_total', '$hsc_pcm_outof', '$hsc_tot_outof', '$hsc_per', '$ssc_maths', '$ssc_maths_outof', '$ssc_total', '$ssc_tot_outof', '$ssc_per', '$board_district', '$vocational_course', '$composite_score')";

//mysqli_query($connect, $sql);
        if (mysqli_query($connect, $sql)) {
            //echo "New record created successfully";
            $_SESSION['form_2_complete'] = 1;
            header("Location: upload_photo.php");

        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connect);
            echo "Data Not Inserted, Please Try Again After Rechcking The Form Details!";
        }
    } else {
        $_SESSION['form_2_complete'] = 1;
        header("Location: upload_photo.php");
    }

}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

<html>

<head>
    <title>Welcome Students</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
<div>
    <center>
        <img src="raitlogo.png"/>
    </center>
</div>
<div class="div_center">
    <form id="educational_details" name="educational_details" method="post" class="pure-form pure-form-aligned"
          action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <fieldset>
            <div class="pure-control-group">
                <label for="roll_no">Roll Number</label>
                <input type="text" name="roll_no" id="roll_no" maxlength="8" placeholder="Roll Number"
                       required>
            </div>
            <div class="pure-control-group">
                <label for="hsc_phy">HSC Physics marks</label>
                <input type="number" name="hsc_phy" id="hsc_phy" min="1" required>
            </div>
            <div class="pure-control-group">
                <label for="hsc_chem">HSC Chemistry marks</label>
                <input type="number" name="hsc_chem" id="hsc_chem" min="1" required>
            </div>
            <div class="pure-control-group">
                <label for="hsc_math">HSC Maths marks</label>
                <input type="number" name="hsc_math" id="hsc_math" min="1" required>
            </div>
            <div class="pure-control-group">
                <label for="hsc_pcm">PCM marks obtained</label>
                <input type="number" name="hsc_pcm" id="hsc_pcm" min="1" required>
            </div>
            <div class="pure-control-group">
                <label for="hsc_pcm_outof">PCM Out-Of</label>
                <input type="number" name="hsc_pcm_outof" id="hsc_pcm_outof" min="1" required>
            </div>
            <div class="pure-control-group">
                <label for="hsc_total">HSC Total marks obtained</label>
                <input type="number" name="hsc_total" id="hsc_total" min="1" required>
            </div>
            <div class="pure-control-group">
                <label for="hsc_tot_outof">HSC Total Out-Of</label>
                <input type="number" name="hsc_tot_outof" id="hsc_tot_outof" min="1" required>
            </div>
            <div class="pure-control-group">
                <label for="hsc_per">HSC %</label>
                <input type="text" name="hsc_per" id="hsc_per" required>
            </div>
            <div class="pure-control-group">
                <label for="ssc_maths">SSC Maths marks obtained</label>
                <input type="number" name="ssc_maths" id="ssc_maths" min="1" required>
            </div>
            <div class="pure-control-group">
                <label for="ssc_maths_outof">SSC Maths Out-Of</label>
                <input type="number" name="ssc_maths_outof" id="ssc_maths_outof" min="1" required>
            </div>
            <div class="pure-control-group">
                <label for="ssc_total">SSC Total Marks Obtained</label>
                <input type="number" name="ssc_total" id="ssc_total" min="1" required>
            </div>
            <div class="pure-control-group">
                <label for="ssc_tot_outof">SSC Total Out-Of</label>
                <input type="number" name="ssc_tot_outof" id="ssc_tot_outof" min="1" required>
            </div>
            <div class="pure-control-group">
                <label for="ssc_per">SSC %</label>
                <input type="text" name="ssc_per" id="ssc_per" required>
            </div>

            <div class="pure-control-group">
                <label for="board_district">Board District</label>
                <input type="text" name="board_district" id="board_district" maxlength="15" required>
            </div>
            <div class="pure-control-group">
                <label for="vocational_course">Vocational Course</label>
                <input type="text" name="vocational_course" id="vocational_course" maxlength="15">
            </div>
            <div class="pure-control-group">
                <label for="composite_score">Composite Score</label>
                <input type="text" name="composite_score" id="composite_score" maxlength="15" required>
            </div>
            <div class="pure-controls">
                <button type="submit" class="pure-button pure-button-primary">Next</button>
            </div>

        </fieldset>

    </form>
</div>
</body>
</html>