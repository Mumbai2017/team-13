<!doctype html>
<html>
<head>
<title>EDIT PROFILE</title>
</head>
<body>
<center>
<?php   
   
	include('header_student.php'); 
	$rollno = $_SESSION['rollno'];
	$sql_entry = "SELECT * FROM student WHERE rollno = '$rollno'";
	$res_entry = mysqli_query($connect,$sql_entry);
	if(mysqli_num_rows($res_entry)>0)
	{
		$row_entry = mysqli_fetch_array($res_entry);
		echo '<div>';
		echo '<table style="width:600px;" border="0"><form  class="form-horizontal" action="update_student.php" method="POST" onsubmit="myfunction()">';
		
		echo '<tr>';
		echo '<td height="40px" height="30px"><b><center>';
		echo '<label class="label label-primary"> ROLL NUMBER :</label>';
		echo '</td>';
		echo '<td height="40px" style="padding-left:50px ;font-size:20px"><b>';
		echo $row_entry['rollno'];
		echo '</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td height="40px"><b><center>';
		echo '<label class="label label-primary">SERIAL NUMBER : </label>';
		echo '</td>';
		echo '<td height="40px"  style="padding-left:50px;">';
		$sr_no = $row_entry['Serial_no'];
		echo "<input type='text' value='$sr_no' name='sr_no'/> ";
		echo '</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td height="40px"><b><center>';
		echo '<label class="label label-primary">SEMESTER : </label>';
		echo '</td>';
		echo '<td height="40px"  style="padding-left:50px;">';
		$sem = $row_entry['sem'];
		echo "<input type='text' value='$sem' name='sem'/> ";
		echo '</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td height="40px"><b><center>';
		echo '<label class="label label-primary">LAST NAME : </label>';
		echo '</td>';
		echo '<td height="40px" style="padding-left:50px;">';
	      $last_name = $row_entry['Last_name'];
		echo '<input type="text" value="'.$last_name.'" name="lastname" readonly/> ';
		echo '</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td height="40px" ><b><center>';
		echo '<label class="label label-primary">FIRST  NAME :</label> ';
		echo '</td>';
		echo '<td height="40px"  style="padding-left:50px;">';
		 $first_name = $row_entry['First_name'];
		echo '<input type="text" value="'.$first_name.'" name="firstname" readonly/> ';
		echo '</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td height="40px"><b><center>';
		echo '<label class="label label-primary">MIDDLE NAME : </label>';
		echo '</td>';
		echo '<td height="40px"  style="padding-left:50px;">';
		
		 $middle_name = $row_entry['Middle_name'];
		echo '<input type="text" value="'.$middle_name.'" name="middlename"/> ';
		echo '</td>';
		echo '</tr>';
		
		
		
		
		
		echo '<tr>';
		echo '<td height="40px"><b><center>';
		echo '<label class="label label-primary">YEAR : </label>';
		echo '</td>';
		echo '<td height="40px"  style="padding-left:50px;">';
		$year = $row_entry['year'];
		$all_years = ['FE', 'SE', 'TE', 'BE'];
		echo '<select type="text" name="year">';
		for($i=0;$i<sizeof($all_years);$i++)
		{
			if($year == $all_years[$i])
				echo '<option value="'.$all_years[$i].'" selected>'.$all_years[$i].'</option>';
			else
				echo '<option value="'.$all_years[$i].'" >'.$all_years[$i].'</option>';
		}
		echo '</select>';
		//echo '<input type="text" value="'.$year.'" name="year"/> ';
		echo '</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td height="40px"><b><center>';
		echo '<label class="label label-primary">DIVISION : </label>';
		echo '</td>';
		echo '<td height="40px"  style="padding-left:50px;">';
		$division = $row_entry['division'];
		echo "<input type='text' value='$division' name='division' maxlength='1'/> ";
		echo '</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td height="40px"><b><center>';
		echo '<label class="label label-primary">BATCH :</label> ';
		echo '</td>';
		echo '<td height="40px"  style="padding-left:50px;">';
		$batch = $row_entry['batch'];
		echo '<input type="text" value="'.$batch.'" name="batch" maxlength="2"/>';
		echo '</td>';
		echo '</tr>';
		
		
	/*	echo '<tr>';
		echo '<td height="40px"><b><center>';
		echo '<label class="label label-primary">PHONE NUMBER : </label>';
		echo '</td>';
		echo '<td height="40px"  style="padding-left:50px;">';
		$phone_no = $row_entry['Phone_no'];
		echo '<input type="number" value="'.$phone_no.'" name="phone_no" maxlength="10"/>';
		echo '</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td height="40px"><b><center>';
		echo '<label class="label label-primary">EMAIL ID :</label> ';
		echo '</td>';
		echo '<td height="40px"  style="padding-left:50px;">';
		$email = $row_entry['email'];
		echo '<input type="email" value="'.$email.'" name="email"/>';
		echo '</td>';
		echo '</tr>';
	*/	
		/*
		echo '<tr>';
		echo '<td height="40px">';
		echo 'Password : ';
		echo '</td>';
		echo '<td height="40px">';
		//$designation = $row_entry['Desig'];
		echo '<input type="password" name="password" id="password"/>';
		echo '</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td height="40px">';
		echo 'New Password : ';
		echo '</td>';
		echo '<td height="40px">';
		//$designation = $row_entry['Desig'];
		echo '<input type="password" name="new_password" id="new_password"/>';
		echo '</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td height="40px">';
		echo 'Confirm New Password : ';
		echo '</td>';
		echo '<td height="40px">';
		//$designation = $row_entry['Desig'];
		echo '<input type="password" name="confirm_new_password" id="confirm_new_password"/>';
		echo '</td>';
		echo '</tr>';
		*/
		echo '<tr>';
		echo '<td height="40px" colspan="2"  style="padding-left:50px;">';
		//$designation = $row_entry['Desig'];
		echo '<center><input type="submit" class="btn btn-success" style="width:100px" name="submit"/>';
		echo '</td>';
		echo '</tr>';
		
		
		echo '</table></form>';
		echo '</div>';
	}

	
?>
 <!--<input type="button" name="change_pass" id="change_pass" class="btn btn-warning " style="width:200px;margin-top:10px;" value="CHANGE PASSWORD" onclick="parent.location='staffforgotpassword.php'"/>-->
 </center>
</body>
<!--<script>
function myFunction() {
    var pass1 = document.getElementById("password").value;
    var pass2 = document.getElementById("confirm_password").value;
    var ok = true;
    if (pass1 != pass2) {
        alert("Passwords Do not match");
        document.getElementById("pass1").style.borderColor = "#E34234";
        document.getElementById("pass2").style.borderColor = "#E34234";
        ok = false;
    }
    else {
        alert("Passwords Match!!!");
    }
    return ok;
}
</script>-->
</html>