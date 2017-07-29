<?php

include('connect.php');

$email=$_POST['email'];

$sql="SELECT * FROM staff WHERE mail_id='$email'";
$res=mysqli_query($connect,$sql);

$count=mysqli_num_rows($res);
if($count==0)
{
	echo "No user found with such Username</br>";
	echo 'Try again <a href="staffforgotpassword.php">Forgot Password</a></br>';
}
else

{
	while(@$row=mysql_fetch_array($res))
		$sdrn=$row['sdrn'];
	
	echo "This is the password sent to the email: ";
	$generated_password = substr(md5(rand(999,999999)),0,8);
	echo $generated_password. "</br>";
	//echo $generated_password;
	$hashed_generated_password = md5($generated_password."".$sdrn);
	echo $hashed_generated_password;
	$sql = "UPDATE `student_profile`.`staff` SET `password` = '$hashed_generated_password' WHERE `staff`.`mail_id` = '$email';";
	$res=mysqli_query($connect,$sql);
	
	$to = $email;
	$subject = "Your new Password";
	$txt = "Your new password id" . $generated_password;
	$headers = "From: admin@admin.com" . "\r\n";
	@mail($to,$subject,$txt,$headers);
	
	
	echo "Your new password has been sent to your registered email id ".$email."</br>";
	echo '<a href="index.php">Sign In With New Password</a><br>';
}
?>