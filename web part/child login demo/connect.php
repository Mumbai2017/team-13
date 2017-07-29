<?php
	$username="root_student"; //username for database
	$password=""; //database password
	$hostname="localhost"; //hostname
	$dbname="backup_student_profile_comp"; //database name
	
	
	//FOR COLLEGE PC
	$url = "118.102.168.162:81";

	$connect = mysqli_connect($hostname,$username,$password)
		or die("error connecting to database"); //make connection
	//echo "Connected to MySQL<br>";
	mysqli_select_db($connect,$dbname) //select database
		or die("Could not select examples");
	//echo "Database selected<br>";
?>

<!--
<style type="text/css">
	@media print
	{
		tr    { page-break-inside:avoid; page-break-after:auto }
		td    { page-break-inside:avoid; page-break-after:auto }
	}
</style>

-->
<style>
	@media print {
		a[href]:after {
			content: none !important;
		}
	}

</style>
