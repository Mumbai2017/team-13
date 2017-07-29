<?php
include('connect.php');
$sdrn=$_POST['sdrn'];
$password=$_POST['password'];
$hashedpass = md5($password."".$sdrn);

$sql="SELECT * FROM staff WHERE sdrn='$sdrn' and password='$hashedpass'";
$res=mysqli_query($connect,$sql ) /*or die(mysql_error())*/;

$count=mysqli_num_rows($res);
if($count==1){
	session_start();
	while(@$row=mysql_fetch_array($res))
	{
		$sdrn=$row['sdrn'];
		$hashedpass=$row['password'];
		$_SESSION['s_pass'] = $hashedpass;
	}
	$_SESSION['user']=$sdrn;
	echo "Welcome $sdrn";
	$location = ' "valid.php" ';
	$string = '<input type="submit" name="take_atten" id="take_atten" class="btn" value="GOTO HOMEPAGE" onClick="parent.location=$location"/>';
	//echo $string;
	echo "<br><br>Please wait Loading.....";
	header( "refresh:1 ;url=valid.php" );
	
	//$_SESSION['username']=$sdrn;
	//header('Location:index.php');
}
else {
	echo "No user found with such Username Password combination</br>";
	echo 'Try <a href="index.php">Signing in again</a></br>';
	echo 'Else <a href="staffsignup.php">Creating a new Account</a></br>';	
	//header('Location:index.php');
	//echo '<script>window.location.href="login.php"; </script>';
}
?>