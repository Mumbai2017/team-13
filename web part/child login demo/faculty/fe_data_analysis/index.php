<?php

include '../connect.php';



$HTML = <<<START

<form action='fe_analysis.php' method='POST'>
	<table border='1'>
		<tr>
			<td>SELECT CLASS : </td>
			<td>
				<select name='class'>
					 <option value="A">A</option>
					 <option value="B">B</option> 
					 <option value="C">C</option>
					 <option value="D">D</option>
					 <option value="E">E</option>
					 <option value="F">F</option>
					 <option value="G">G</option>
					 <option value="H">H</option>
					 <option value="I">I</option>
					 <option value="J">J</option>
					 <option value="K">K</option>
					 <option value="L">L</option>
					 <option value="M">M</option>
				</select>
			</td>
		</tr>
		
		<tr>
			<td>
				SELECT % AS AVERAGE CRITERIA
			</td>
			<td>
			FROM:
				<input type='number' min='0' max='100' name='min_avg_percent_criteria'required//>
			TO:
				<input type='number' min='0' max='100' name='max_avg_percent_criteria' required/>
			</td>
		</tr>
	</table>
	<input type='submit' value='SUBMIT'/>
</form>

START;

echo $HTML;
?>