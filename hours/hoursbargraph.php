<!DOCTYPE html>

<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
  <head>
    <title>Hours Chart -  Westview Key Club</title>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/header.php"); ?>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load('visualization', '1.0', {'packages':['corechart']});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
      var data = google.visualization.arrayToDataTable([
      ['Name', 'Hours'],
      <?php
	 require_once($_SERVER["DOCUMENT_ROOT"] . "/lib/hours.php");
	 $m = new MongoClient("mongodb://localhost");
	 $db = $m->wvkeyclub;

         $results = $db->members->find();
         $hours_list = array();
         $member_count = 0;
  
         foreach ($results as $member)
         {
             if (array_key_exists("hours", $member)) {
                 $hours_list[$member["fname"] . " " . $member["lname"]] = sum_hours($member["hours"]);
             }
             else {
                 $hours_list[$member["fname"] . " " . $member["lname"]] = 0;
             }
             $member_count++;
         }
         asort($hours_list);
         $i = 0;
         foreach ($hours_list as $member_name => $member_hours)
         {
	 ?>
         ['<?php echo $member_name; ?>', <?php echo $member_hours; ?>]
      <?php
	 $i++;
	 if ($i != $member_count - 1)
	 {
	     echo ',';
	 }
	 }
	 ?>
      ]);
      
      var options = {
          title : 'Westview Key Club Service Hours'
      }

      var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    </script>
      
  </head>

  <body>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/navbar.php"); ?>

    <header class="hide-for-small">
      <div class="row">
	<div class="small-12 columns">
	  <h1>Hours</h1>
	  <h2>Bar Graph</h2>
	</div>
      </div>
    </header>

    <div id="mainContent">

      <div class="row show-for-small">
	<div class="small-12 columns">
	  <h1>Hours</h1>
	  <h2>Bar Graph</h2>
	</div>
      </div>

      <div class="row">
	<div class="twelve columns">
	  <div id="chart_div" style="width:400; height:300">
	  </div>
	</div>
      </div>

    </div>

    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/hours/view-my-hours-modal.php"); ?>
    
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/footer.php"); ?>
  </body>

</html>
