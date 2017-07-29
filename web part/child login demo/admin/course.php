<?php

  include ('header_admin.php');

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>COURSE PAGE</title>
<link rel="stylesheet" type="text/css" href="../../css/form.css">
</head>
<body>

<div class="container" >
<form class="form-horizontal" name="form0" action="course_update.php" method="post">
               <div class="form-group">
			   <label class="control-label col-sm-4" for="DEPARTMENT">DEPARTMENT</label>
			   <div class="col-sm-6">
                <select class="form-control" name="did" id="did">
				 
	 <option value="COMPS" default>COMPS</option>	
		   </select>
		</div>
  </div>
   
		   <div class="form-group">
          <label class="control-label col-sm-4">YEAR:</label>
		  <div class="col-sm-6">
	  <select  class="form-control"name="Year" id="Year">
	  <option value="FE">FE</option>
	 <option value="SE">SE</option>
     <option value="TE">TE</option>
     <option value="BE">BE</option>
	  </select>
	  </div>
  </div>
  
	  <div class="form-group">
	  <label class="control-label col-sm-4">SEM:</label>
	  <div class="col-sm-6">
	  <select class="form-control" name="SEM" id="SEM">
	  <option value="1">1</option>
	 <option value="2">2</option>
     <option value="3">3</option>
     <option value="4">4</option>
	 <option value="5">5</option>
	 <option value="6">6</option>
	 <option value="7">7</option>
	 <option value="8">8</option>
	  </select>
	  </div>
  </div>
  
	  <div class="form-group">
	  <label class="control-label col-sm-4">SUBJECT NAME:</label>
	  <div class="col-sm-6">
	  <input class="form-control" required type="text" name="Subject_name" placeholder="SUBJECT NAME">
	  </div>
  </div>
  
	  <div class="form-group">
	  <label class="control-label col-sm-4">SUBJECT SHORTNAME:</label>
	  <div class="col-sm-6">
	  <input class="form-control" required type="text" name="Subject_shortname" placeholder="SUBJECT SHORTNAME ">
	  </div>
  </div>
  
	  <div class="form-group">
	  <label class="control-label col-sm-4">SUBJECT CODE:</label>
	  <div class="col-sm-6">
      <input class="form-control" required type="text" name="Subject_code" placeholder="SUBJECT CODE ">
	  </div>
  </div>
  <center>
  <button style="margin-left:10%"class="button" style="font-size:20px" type="RESET" onClick="parent.">RESET</button>
  
   <button style="margin-left:12%"class="button" type="submit"   name="course_update">SUBMIT </button>
 </center>
 
 </form>
</div>
 
</body>
</html>
