<?php
/**
 * Created by PhpStorm.
 * User: Maurya
 * Date: 7/7/2016
 * Time: 11:46 PM
 */
include 'header_faculty.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>FACULTY DASHBOARD : RAIT STUDENT PROFILE MANAGEMENT SYSTEM</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <div class="row" id="reading-sidebar-contents">
        <a href="1_testinput_index.php" class="btn btn-danger btn-lg btn-block" > Create Test </a><br><br>
        <a href="select_subject_for_analysis.php" class="btn btn-primary btn-lg btn-block">Overall Subject Analysis</a><br><br>
        <a href="select_class_for_analysis.php" class="btn btn-warning btn-lg btn-block">All Subjects Class Analysis</a><br><br>
        <a href="select_for_division_subject_analysis.php" class="btn btn-info btn-lg btn-block">Subjectwise Class Analysis</a><br><br>
        <a href="edit_profile.php" class="btn btn-success btn-lg btn-block"> Edit Profile  </a><br><br><br>
    </div>
</div>


</body>
</html>
