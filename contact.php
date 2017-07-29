<?php

$conn = mysqli_connect("localhost","root","","maw");

$fname = $_POST['name'];
$lname = $_POST['age'];
$email = $_POST['address'];
$contact = $_POST['contact'];


$sql = "INSERT INTO kid(name,age,address,contact)VALUES('$fname','$lname','$email','$contact');";
$result=mysqli_query($conn,$sql);
if($result){
	echo "Message has been sent successfully<br>Please wait, redirecting to Home page.";
}
else
	echo "Error";

?> 
