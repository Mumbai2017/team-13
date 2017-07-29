<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/form.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="..\js/bootstrap.min.js"></script>
    <script src="../css/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/header.css">
    <link rel="stylesheet" href="../css/bootstrap-3.3.6-dist/css/bootstrap.min.css">

    <script src="../css/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>




    <STYLE type="text/css" media="print">
        @media print {
            .noPrint {
                display:none;
            }
        }
    </STYLE>

</head>

<body>

<?php

session_start();
//if(!isset($_SESSION['roll']))
if(!isset($_SESSION['rollno']))
{
    echo "<script> alert('Please login with correct credentials.. '); window.location='../' </script>";
}
else
{
	//echo dirname(__DIR__);
    include dirname(__DIR__).'/connect.php';
    $rollno = $_SESSION['rollno'];
    $sql_all_info = "SELECT * FROM STUDENT WHERE rollno = '$rollno'";
    $res_all_info = mysqli_query($connect, $sql_all_info);
    $row_all_info = mysqli_fetch_array($res_all_info);
	$year=$row_all_info['year'];
	$division=$row_all_info['division'];
    $sem = $_SESSION['sem'] = $row_all_info['sem'];
    ?>
    <center ><div style="padding:25px;">

            <img  src="../logo.png" class="img-responsive"  alt="RAIT LOGO">
        </div>
    </center>
    <nav class="navbar navbar-default" >
        <div class="container-fluid" >
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header" >
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><label style="font-size:24px; color:#800000; float:left" align="left"><?php echo  "Welcome, ".$_SESSION['rollno']; ?></label></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class='noPrint'>


                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php" >HOME</a></li>
                        <li><a href="1_start_test_select_subject.php" >START NEW TEST</a></li>
                        <li><a href="history.php" >HISTORY</a></li>
                        <li><a href="educational_details1.php" >FILL EDUCATIONAL DETAILS</a></li>
                        <li><a href="edit_profile.php" >EDIT PROFILE</a></li>
                    
					</ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="../logout.php" style="float:right"><span class="glyphicon glyphicon-log-out"> LOGOUT</span></a></li>
                    </ul>
                </div>
            </div> <!-- DIV TO HIDE MENU FROM PRINTING-->
        </div>
        </div>
    </nav>
    <?php

}

?>

</body>
</html>
