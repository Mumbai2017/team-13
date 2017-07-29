<!doctype html>
<html>
<head>
<meta charset="utf-8">

<link rel="stylesheet" type="text/css" href="../../css/form.css">
</head>
<body>
<?php


	include('header_admin.php'); 
	$sdrn = $_SESSION['username'];
	$sql_entry = "SELECT * FROM admin_details WHERE username = '$sdrn'";
	$res_entry = mysqli_query($connect,$sql_entry);
	if(mysqli_num_rows($res_entry)>0)
	{
		$row_entry = mysqli_fetch_array($res_entry);
		echo '<div class="container">';
		echo '<form class="form-horizontal" action="update_admin.php" method="POST" onsubmit="myfunction()">';
		
		echo '<tr>';
		echo '<td><b>';
		echo 'Username: ';
		echo '</td>';
		echo '<td><b><em>';
		echo $row_entry['username'];
		echo '</em></td>';
		echo '</tr>';
		
		echo '<tr><br>';
		echo '<td><br><b>';
		echo 'EMAIL ID : ';
		echo '</td>';
		echo '<td>';
		$Email_id = $row_entry['Email_id'];
		echo '<input class="form-control" type="text" value="'.$Email_id.'" name="Email_id"/> ';
		echo '</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td><br>';
		echo 'PHONE NO: ';
		echo '</td>';
		echo '<td>';
		//echo $row_entry['Middle_name'];
		$phone_no = $row_entry['phone_no'];
		echo '<input class="form-control" type="text" value="'.$phone_no.'" name="phone_no"/> ';
		echo '</td>';
		echo '</tr>';
		
		
		echo '<tr>';
		echo '<td colspan="2"><br>';
		//$designation = $row_entry['Desig'];
		echo '<center><input class="button"  type="submit" name="submit" value="SUBMIT"/> ';
		echo '</td>';
		echo '</tr>';
		
		
		echo '</table></form>';
		echo '</div>';
	}

	
?>
 </body><center><br><input type="button" name="change_pass" id="change_pass" class="button" value="CHANGE PASSWORD" onclick="parent.location='adminchangepassword.php'"/>

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