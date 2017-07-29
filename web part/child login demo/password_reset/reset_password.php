<?php

include('../connect.php');
if(isset($_POST['submit_password_reset']))
{
$email = $_POST['email'];
$rollno = $_POST['rollno'];
}

$sql="SELECT * FROM student WHERE rollno = '$rollno' AND email='$email'";
echo $sql;
//$_SESSION['forgot_password_sdrn'] = $sdrn;
//$_SESSION['forgot_password_email'] = $email;
$res=mysqli_query($connect, $sql);
if($res != true)
{
	echo "Error connecting in Database";
}
$count=mysqli_num_rows($res);
if($count==0)
{
	echo "No user found with such Username and E-Mail ID combination</br>";
	echo 'Try again <a href="index.php">Forgot Password</a></br>';
}
else
{
	echo "<script> alert('Sending OTP to your registered Email ID ".$email."'); </script> ";
	$generated_password = substr(md5(rand(999,999999)),0,8);
	//echo $generated_password. "</br>";
	//echo $generated_password;
	//$hashed_generated_password = $generated_password;
	//echo $hashed_generated_password;
	$sql_db = "UPDATE `student` SET `otp`='".$generated_password."' WHERE rollno = '$rollno'";
	$res=mysqli_query($connect, $sql_db);
	//echo $sql_db;
	if($res != true)
	{
		echo "SOME PROBLEM WITH OTP";
	}
	$to = $email;
	$subject = "RAIT Pay Forgot Password ";
	$txt = "Your new OTP is : " . $generated_password;
	
	$txt.="\n\n Continue to fill OTP at -> /http://".$url.'/raitpay/password_reset/otp_check.php';
	$headers = "From: RAIT-Student Profile Management System " .'transcript.rait@gmail.com'. "\r\n";
	//$headers = "From: RAIT PAY " . "\r\n";
	if(mail($to,$subject,$txt,$headers))
	{
		echo "<script type='text/javascript'>alert('Your OTP has been sent to your registered email id ".$email."');</script>";
		header("refresh:0; url:otp_check.php");
	}
	else
	{
		echo "<script type='text/javascript'>alert('EMAIL NOT SENT.. PLEASE TRY AGAIN..');</script>";
		header("refresh:0; url:index.php");
	}

	echo '<a href="otp_check.php">Continue to fill OTP</a><br><br>';
	echo '<a href="../index.php">Sign In With New Password</a><br>';
}
?>
