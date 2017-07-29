<?php
include '../connect.php';


$class = $_POST['class'];
$min_avg = $_POST['min_avg_percent_criteria'];
$max_avg = $_POST['max_avg_percent_criteria'];

$sql_fe = "SELECT * FROM fe_educational_details WHERE batch LIKE '$class%' ORDER BY batch ASC, name ASC";
$res_fe = mysqli_query($connect, $sql_fe);


$count_avg_pcm = 0;
$count_max_pcm = 0;
$count_min_pcm = 0;

$count_avg_hsc=0;
$count_max_hsc=0;
$count_min_hsc=0;

while($row_fe = mysqli_fetch_array($res_fe))
{
	$roll_no = $row_fe['roll_no'];
	$batch = $row_fe['batch'];
	$name = $row_fe['name'];
	
	$hsc_pcm = $row_fe['hsc_pcm'];
	$hsc_pcm_outof = $row_fe['hsc_pcm_outof'];
	$pcm_per = $hsc_pcm*100/$hsc_pcm_outof;

	$hsc_total = $row_fe['hsc_total'];
	$hsc_total_outof = $row_fe['hsc_tot_outof'];
	$hsc_per = $hsc_total*100/$hsc_total_outof;
	
	//FOR HSC PCM
	if($pcm_per > $max_avg)
	{
		$count_max_pcm++;
	}
	else if($pcm_per < $min_avg)
	{
		$count_min_pcm++;
	}
	else
	{
		$count_avg_pcm++;
	}

	//FOR HSC Total
	if($hsc_per > $max_avg)
	{
		$count_max_hsc++;
	}
	else if($hsc_per < $min_avg)
	{
		$count_min_hsc++;
	}
	else
	{
		$count_avg_hsc++;
	}
}







$HTML = <<<XYZ
<html>
  <head>
  
  	<!--Load the Bootstrap-->
  	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChartpcm);
      google.charts.setOnLoadCallback(drawCharthsc);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChartpcm() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'CRITERIA');
        data.addColumn('number', 'NUMBER OF STUDENTS');
        
		data.addRows([
          ['HSC PCM AVG', {$count_avg_pcm}],
          ['HSC PCM ABOVE AVG', {$count_max_pcm}],
          ['HSC PCM BELOW AVG', {$count_min_pcm}],
        ]);
		
        // Set chart options
        var options = {'title':'HSC PCM DATA ANALYSIS FOR CLASS "FE - {$class}" CRITERIA MIN:{$min_avg} MAX:{$max_avg}',
                       'width':800,
                       'height':500};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('pcm_chart_div'));
        chart.draw(data, options);
      }
      
      
      function drawCharthsc() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        
		data.addRows([
          ['HSC TOTAL AVG', {$count_avg_hsc}],
          ['HSC TOTAL ABOVE AVG', {$count_max_hsc}],
          ['HSC TOTAL BELOW AVG', {$count_min_hsc}],
        ]);
		
        // Set chart options
        var options = {'title':'HSC TOTAL DATA ANALYSIS FOR CLASS "FE - {$class}" CRITERIA MIN:{$min_avg} MAX:{$max_avg}',
                       'width':800,
                       'height':500};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('hsc_chart_div'));
        chart.draw(data, options);
      }
      
      
      
    </script>
  </head>

  <body>
    <!--Div that will hold the pie chart-->
    <div  class="responsive">
		<div id="pcm_chart_div"></div>
		<div id="hsc_chart_div"></div>
	</div>
  </body>
</html>
XYZ;

echo $HTML;


?>