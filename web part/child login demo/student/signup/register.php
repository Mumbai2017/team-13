<?php
include ('../connect.php');

if(isset($_POST['submit']))
{
	$rollno = strtoupper($_POST['rollno']);
	$name = strtoupper($_POST['name']);
	$dept = strtoupper($_POST['dept']);
	$phno = strtoupper($_POST['phno']);
	$year = $_POST['year'];
	$addr = strtoupper($_POST['addr']);
	$email = $_POST['email'];
	$password = $_POST['password'];	
}

$sql_string ='INSERT INTO student VALUES ("'.$rollno.'","'.$name.'","'.$dept.'","'.$phno.'","'.$year.'","'.$addr.'","'.$email.'","'.$password.'", "")';


//echo $sql_string;

if(mysql_query($sql_string))
{
echo '<script> alert("Successfully registered... Redirecting to homepage"); window.location="../index.php"</script>';
}
else
{
echo '<script> alert("Registration unsuccessful. Please try again... Redirecting to Registration Page"); window.location="index.php"</script>';
}
?>