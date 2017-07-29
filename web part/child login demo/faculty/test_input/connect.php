<?php
$hostname="localhost";        
$username="root";
$password="";
$dbname="student_profile";
$department = "Computer";
$connect= mysqli_connect($hostname,$username,$password,$dbname) or die("Error connecting to database");  
//mysql_select_db($dbname);
?>