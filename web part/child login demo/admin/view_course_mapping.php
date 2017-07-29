<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../../css/form.css">
</head>
<body>
<style>
.table-bordered td{
word-wrap: break-word;

}
</style>
<?php

	include ('header_admin.php');
	$q1=mysqli_query($connect,"select * from coursemapping ORDER BY Year ASC, Division ASC");
	

?>
<table class="table table-bordered"  border="0">
  		<tbody>
<tr>
<td><center><h4><b>
FACULTY SDRN
</center></td>

<td><center><h4><b>
FACULTY NAME
</center></td>

<td><center><h4><b>
SUBJECT CODE
</center></td>

<td><center><h4><b>
YEAR
</center></td>

<td><center><h4><b>
DIVISION
</center></td>

</tr>


<?php
while($rw=mysqli_fetch_array($q1))
{
?>
<tr>
<td><center>
<?php
echo $rw['Sdrn'];
?>
</td>

<td><center>
<?php
$sdrn= $rw['Sdrn'];
$q2=mysqli_query($connect,"select * from  faculty where Sdrn='$sdrn'");
$rw2=mysqli_fetch_array($q2);
$first=$rw2['First_name'];
$last=$rw2['Last_name'];
echo $first.' '.$last;
?>
</td>

<td><center>
<?php
echo $rw['Subject_code'];
?>
</td>

<td><center>
<?php
echo $rw['Year'];
?>
</td>

<td><center>
<?php
echo $rw['Division'];
?>
</td>


</tr>
<?php
}
?>
</tbody>
</table>
</body>
</html>