<!doctype html>
<html>
<head>
<meta charset="utf-8">


<link rel="stylesheet" type="text/css" href="../../css/css2.css">
<meta charset="utf-8">

</head>
<body>
<?php   
   

	include('header_faculty.php'); 
	$sdrn = $_SESSION['sdrn'];
	$sql_entry = "SELECT * FROM faculty WHERE Sdrn = '$sdrn'";
	$res_entry = mysqli_query($connect,$sql_entry);
	if(mysqli_num_rows($res_entry)>0)
	{
		$row_entry = mysqli_fetch_array($res_entry);
		echo '<center><div style="width:60%">';
		echo '<table class="table table-striped" border="0"><form  class="form-horizontal" action="update_faculty.php" method="POST" onsubmit="myfunction()">';
		
		echo '<tr>';
		echo '<td><b><center>';
		echo 'SDRN : ';
		echo '</td>';
		echo '<td style="padding-left:50px ;font-size:20px"><b>';
		echo $row_entry['Sdrn'];
		echo '</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td><b><center>';
		echo 'FIRST  NAME : ';
		echo '</td>';
		echo '<td>';
		$first_name = $row_entry['First_name'];
		echo '<input type="text" value="'.$first_name.'" name="firstname"/> ';
		echo '</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td><b><center>';
		echo 'MIDDLE NAME : ';
		echo '</td>';
		echo '<td>';
		//echo $row_entry['Middle_name'];
		$middle_name = $row_entry['Middle_name'];
		echo '<input type="text" value="'.$middle_name.'" name="middlename"/> ';
		echo '</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td><b><center>';
		echo 'LAST NAME : ';
		echo '</td>';
		echo '<td>';
		$last_name = $row_entry['Last_name'];
		echo '<input type="text" value="'.$last_name.'" name="lastname"/> ';
		echo '</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td><b><center>';
		echo 'DATE OF BIRTH : ';
		echo '</td>';
		echo '<td>';
		$dob = $row_entry['DOB'];
		echo "<input type='date' value='$dob' name='dob'/> ";
		echo '</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td><b><center>';
		echo 'DEPARTMENT : ';
		echo '</td>';
		echo '<td>';
		$department = $row_entry['Department'];
		$all_departments = ['COMP', 'IT', 'EXTC', 'INSTR', 'ETRX'];
		echo '<select type="text" name="department">';
		for($i=0;$i<sizeof($all_departments);$i++)
		{
			if($department == $all_departments[$i])
				echo '<option value="'.$all_departments[$i].'" selected>'.$all_departments[$i].'</option>';
			else
				echo '<option value="'.$all_departments[$i].'" >'.$all_departments[$i].'</option>';
		}
		echo '</select>';
		//echo '<input type="text" value="'.$department.'" name="department"/> ';
		echo '</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td><b><center>';
		echo 'CONTACT NO. : ';
		echo '</td>';
		echo '<td>';
		$contact_no = $row_entry['Contact_no'];
		echo '<input type="text" value="'.$contact_no.'" name="contact_no"/>';
		echo '</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td><b><center>';
		echo 'ADDRESS : ';
		echo '</td>';
		echo '<td>';
		$addr = $row_entry['Addr'];
		echo '<input type="text" value="'.$addr.'" name="addr"/>';
		echo '</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td><b><center>';
		echo 'E-MAIL : ';
		echo '</td>';
		echo '<td>';
		$email = $row_entry['Email'];
		echo '<input type="text" value="'.$email.'" name="email"/>';
		echo '</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td><b><center>';
		echo 'DATE OF JOINING : ';
		echo '</td>';
		echo '<td>';
		$doj = $row_entry['Doj'];
		echo '<input type="date" value="'.$doj.'" name="doj"/>';
		echo '</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td><b><center>';
		echo 'QUALIFICATION : ';
		echo '</td>';
		echo '<td>';
		$qualification = $row_entry['Qualification'];
		echo '<input type="text" value="'.$qualification.'" name="qualification"/>';
		echo '</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td><b><center>';
		echo 'DESIGNATION : ';
		echo '</td>';
		echo '<td>';
		$designation = $row_entry['Desig'];
		echo '<input type="text" value="'.$designation.'" name="designation"/>';
		echo '</td>';
		echo '</tr>';
		/*
		echo '<tr>';
		echo '<td>';
		echo 'Password : ';
		echo '</td>';
		echo '<td>';
		//$designation = $row_entry['Desig'];
		echo '<input type="password" name="password" id="password"/>';
		echo '</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td>';
		echo 'New Password : ';
		echo '</td>';
		echo '<td>';
		//$designation = $row_entry['Desig'];
		echo '<input type="password" name="new_password" id="new_password"/>';
		echo '</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td>';
		echo 'Confirm New Password : ';
		echo '</td>';
		echo '<td>';
		//$designation = $row_entry['Desig'];
		echo '<input type="password" name="confirm_new_password" id="confirm_new_password"/>';
		echo '</td>';
		echo '</tr>';
		*/
		echo '<tr>';
		echo '<td colspan="2">';
		//$designation = $row_entry['Desig'];
		echo '<center><input type="submit" class="button"name="submit"/>';
		echo '</td>';
		echo '</tr>';
		
		
		echo '</table></form>';
		echo '</div></center>';
	}

	
?>
 <input type="button" name="change_pass" id="change_pass" class="btn" value="CHANGE PASSWORD" onclick="parent.location='staffforgotpassword.php'"/>
</body>
<script>
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
</script>
</html>