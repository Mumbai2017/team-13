<?php
include 'connect.php';
?>
<html>
<head>
<title> Quiz </title>
</head>

<body>
<form action="setpaper.php" method="POST">  
<table name='test_input_table'>
	<tr>
	<td>SEMESTER</td>
		<td>
		 <select name="semester" id="sem" required>
				 <option value="blank"> </option> 	 
				 <option value="1">1</option>
				 <option value="2">2</option> 
				 <option value="3">3</option>
				 <option value="4">4</option>
				 <option value="5">5</option>
				 <option value="6">6</option>
				 <option value="7">7</option>
				 <option value="8">8</option>
			</select>  
		</td>
	<tr>
 
	<tr>
	<td>SUBJECT</td>
	<td>
	 <?php
	 $sql_subjects = "SELECT * FROM COURSE WHERE Department='".$department."';";
	 $res_subjects = mysqli_query($connect, $sql_subjects);
	 //echo $sql_subjects;
	 echo "<select name=subject required>";
	 while($row_subjects = mysqli_fetch_array($res_subjects))
	 {
		echo "<option value=".$row_subjects['Subject_code'].">".$row_subjects['Subject_shortname']." - ".$row_subjects['Subject_code']."</option>";
	 }
	 echo "</select>";
	 ?>
	 </td>
	 </tr>
	 
	<tr>
	<td>NUMBER OF QUESTIONS</td>
		<td>
		 <input type="number" name="no_questions" id="no_questions" value="5" onchange="populate_question_table();" required>
		</td>
	</tr>


	<tr>
	<td>Time Alloted (In minutes)</td>
	<td>
	 <input type="number" name="time_alloted" id="time_alloted" min="10" required> 
	</td>
	</tr>
	
	</table>


	<div id="questions_div">
		
	</div>

	 <input type="submit" value="Submit">

</form>
</body>
<script>
window.onload = populate_question_table()
function populate_question_table()
{
var questions_div = document.getElementById('questions_div');
var str='<table name="questions_table">';
var no_questions = document.getElementById('no_questions').value;
//alert (no_questions);

	for(i=0; i<no_questions; i++)
	{
		str+='<tr>';
		str+='<td>'+(i+1)+'</td>'
		str+='<td><input type="textarea" name="question_'+i+'"  placeholder="QUESTION '+(i+1)+'"> </td>';
		str+= '<td><input type="text" name="a_'+i+'" id="a_'+i+'"   </td>';
		str+= '<td><input type="text" name="b_'+i+'" id="b_'+i+'" > </td>';
		str+= '<td><input type="text" name="c_'+i+'" id="c_'+i+'" > </td>';
		str+= '<td><input type="text" name="d_'+i+'" id="d_'+i+'" > </td>';
		
		str+= '<td> <select name="correct_'+i+'"> \
		<option value="A">A</option> \
		<option value="B">B</option> \
		<option value="C">C</option> \
		<option value="D">D</option> \
		</select></td>';
		
		str+='</tr>';
	}
	
	str+='<table>';
	questions_div.innerHTML = str;
}
</script>
</html>
