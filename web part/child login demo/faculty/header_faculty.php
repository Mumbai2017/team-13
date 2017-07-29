<!doctype html>
<html>
<head>

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="..\js/bootstrap.min.js"></script>
  <script src="../css/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
    <script src="../css/bootstrap-3.3.6-dist/js/ajax.js"></script>
  <link rel="stylesheet" type="text/css" href="header.css">

</head>

<body>
<?php
include ('../connect.php');
session_start();
if(!isset($_SESSION['sdrn']))
{
    echo "<script> alert('Please login with correct credentials.. '); window.location='../' </script>";
}
else
{
$sdrn=$_SESSION['sdrn'] ;
?>

<center>
    <div><img src="raitlogo.png"></div>
</center>
<br>
<nav class="navbar navbar-default" role="navigation">

    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><label style="font-size:24px; color:#000000; float:left"
                                                    align="left"><?php echo 'Welcome, '.$_SESSION['fname']; ?></label>
            </a>
        </div>

        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="index.php">HOME</a></li>
                <li><a href="1_testinput_index.php">TEST</a></li>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">ANALYSIS<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="select_subject_for_analysis.php">OVERALL SUBJECT</a></li>
                        <li><a href="select_class_for_analysis.php">CLASSWISE ALL SUBJECTS</a></li>
                        <li><a href="select_for_division_subject_analysis.php">SUBJECTWISE CLASSWISE</a></li>
                     
                    </ul>
                </li>
                

				<li><a href="edit_profile.php">EDIT PROFILE</a></li>
				
				

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span> LOGOUT</a></li>
            </ul>
        </div>
    </div>
</nav>

</body>
</html>
<?php
}
?>