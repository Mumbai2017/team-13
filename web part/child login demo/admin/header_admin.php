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


    <script src="../../css/bootstrap-3.3.6-dist/js/ajax.js"></script>


    <STYLE type="text/css" media="print">
        @media print {
            .noPrint {
                display: none;
            }
        }
    </STYLE>

</head>

<body>

<?php

session_start();
//if(!isset($_SESSION['roll']))
if (!isset($_SESSION['username'])) {
    echo "<script> alert('Please login with correct credentials.. ') </script>";
    header("url : ../");
} else {
    //echo dirname(__DIR__);
    include dirname(__DIR__) . '/connect.php';
    $username = $_SESSION['username'];
    ?>
    <center>
        <div style="padding:25px;">

            <img src="../logo.png" class="img-responsive" alt="RAIT LOGO">
        </div>
    </center>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><label style="font-size:24px; color:#800000; float:left"
                                                        align="left"><?php echo "Welcome, " . $_SESSION['username']; ?></label></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class='noPrint'>


                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">HOME</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">COURSE<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="course.php">ADD COURSE</a></li>
                                <li><a href="delete_course.php">DELETE COURSE</a></li>
                                <li><a href="view_course_mapping.php">VIEW COURSE MAPPING</a></li>
                                <li><a href="sub_alloc.php">ADD COURSE MAPPING</a></li>
                                <li><a href="delete_course_mapping.php">DELETE COURSE MAPPING</a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">ANALYSIS<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="select_subject_for_analysis_admin.php">OVERALL SUBJECT</a></li>
                                <li><a href="select_class_for_analysis_admin.php">CLASSWISE ALL SUBJECTS</a></li>
                                <li><a href="select_for_division_subject_analysis_admin.php">SUBJECTWISE CLASSWISE</a></li>
                                <li><a href="select_history_admin.php">SEARCH STUDENT</a></li>
                            </ul>
                        </li>

                        <li><a href="admin_profile.php">EDIT PROFILE</a></li>


                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="../logout.php" style="float:right"><span class="glyphicon glyphicon-log-out"> LOGOUT</span></a>
                        </li>
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
