<?php

	include ('header_admin.php');





?>



<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>VALIDATION PAGE</title>
<link rel="stylesheet" type="text/css" href="../../css/form.css">
</head>
<body>
				<?php

				$t1=mysqli_query($connect,"Select * from faculty ");
		        $t2=mysqli_query($connect,"select * from course"); 
				
                 ?>
<div class="container">
<form  class="form-horizontal" name="form0" action="sub_alloc_dat.php" method="post">
                <div class="form-group">
               <label class="control-label col-sm-4" for="Sdrn">SDRN: </label>
              <div class="col-sm-6">
			  <select  class="form-control" name="suid" id="suid">
				<?php 
				while($tr1=mysqli_fetch_array($t1))
				{
                      ?> <option value="<?php echo $tr1['Sdrn'];?>"> <?php echo $tr1['Sdrn'].' - '.$tr1['First_name']." ".$tr1['Last_name'];?> </option>
					 
					  
					  <?php
				
				}
				
				?>
		   </select>
           </div>
           </div>
		   
		   <div class="form-group">
		  <label class="control-label col-sm-4" for="Subject_code">SUBJECT CODE:</label>
          <div class="col-sm-6">
		  <select class="form-control" name="S_c" id="S_c">
				<?php 
				while($tr2=mysqli_fetch_array($t2))
				{
                      ?> <option value="<?php echo $tr2['Subject_code'];?>"><?php echo $tr2['Subject_code'].' - '.$tr2['Subject_shortname'];?> </option>
					  <?php
				
				}
				
				?>
		   </select>
           </div>
           </div>
	
		   <div class="form-group">
		  <label class="control-label col-sm-4">YEAR:</label>
		  <div class="col-sm-6">
	  <select  class="form-control" name="Year" id="Year">
	  <option value="FE">FE </option>
	 <option value="SE">SE </option>
     <option value="TE">TE </option>
     <option value="BE">BE </option>
    </select>
	   </div>
    </div>
	
	   <div class="form-group">
	  <label class="control-label col-sm-4">DIVISION:</label>
	  <div class="col-sm-6">
	  <input class="form-control" required type="text" name="Division" placeholder="ENTER DIVISION ">
	   </div>
    </div>
	
	<center> <button type="submit"class="button" style="margin-left:10%" name="sub_alloc">SUBMIT</button> </center>
   </form>
</div>
</body>
</html>
