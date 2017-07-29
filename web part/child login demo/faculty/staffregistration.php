<?php
include_once("connect.php");

$sdrn = $_POST['sdrn'];

$sql = "SELECT * FROM `staff` WHERE `sdrn`='$sdrn' ";
$res=mysqli_query($connect,$sql);
//echo $sdrn;
if(mysqli_num_rows($res)==1 || $sdrn=="No SDRN")
{
	echo 'Given SDRN already present in DATABASE... Please click the link forgot password below or try again';
	 $string = "window.location.href = 'att_login.php' ";
      echo '<br><br> <input type="button" style="font-size:20px" value="GO BACK" class="back" id="back" onClick=" '.$string.' ">';
}

else if($_POST['pass'] != $_POST['cpass'])
	{
		echo 'Passwords do not match.... Try again..';
		$string = "window.location.href = 'sfreg.php' ";
		echo '<br><br> <div style="align-content:center"><input type="button" style="font-size:20px" value="GO BACK" class="back" id="back" onClick=" '.$string.' "></div>';
	}
		else
		{
			$fnm = $_POST['fnm'];
			$mnm = $_POST['mnm'];
			$lnm = $_POST['lnm'];
			$dob = $_POST['dob'];
			$phno = $_POST['phno'];
			$addr = $_POST['addr'];
			$email = $_POST['email'];
			$doj = $_POST['doj'];
			$hq = $_POST['hq'];
			$desig = $_POST['desig'];
			$pass = $_POST['pass'];
			$hashedpass = md5($pass."".$sdrn);
			
			$sql = " INSERT INTO `student_profile`.`staff` (`sdrn`, `first_name`,`middle_name`,`last_name`, `dob`, `staff_contact`, `personal_address`, `mail_id`, `date_of_joining`, `qualification`, `designation`, `password`) 
									  VALUES ('$sdrn', '$fnm', '$mnm', '$lnm', '$dob', '$phno', '$addr', '$email', '$doj', '$hq', '$desig', '$hashedpass') ";	
			mysqli_query($connect,$sql);
			echo '<br>Sign up Successful!!!';
			$string = "window.location.href = 'staff_login.php' ";
			  echo '<br><br> <input type="button" style="font-size:20px; align:center" value="Proceed to login Page" class="loginpg" id="loginp" onClick=" '.$string.' ">';
		}
?>