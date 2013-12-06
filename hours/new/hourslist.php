<!DOCTYPE html>

<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
  <head>
    <title>Hours List -  Westview Key Club</title>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/header.php"); ?>
    <link rel="stylesheet" href="/css/tablesorter.css">
  </head>

  <body>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/navbar.php"); ?>

    <header class="hide-for-small">
      <div class="row">
	<div class="small-12 columns">
	  <h1>Hours</h1>
	  <h2>Hours List</h2>
	</div>
      </div>
    </header>

    <div id="mainContent">

      <div class="row">
	<div class="small-12 columns">
	  <table id="hourslist" class="tablesorter" style="margin-left:auto; margin-right:auto;">
	    <thead>
	      <tr>
		<th class="header">Name</th>
		<th class="header">Total Hours</th>
		<th class="header">Graduation Year</th>
		<th class="header">Position</th>
		<th class="header">Registered?</th>
	    </thead>
	    <tbody>
	      <?php
		 require_once($_SERVER["DOCUMENT_ROOT"] . "/lib/hours.php");
		 $m = new MongoClient("mongodb://localhost");
		 $db = $m->wvkeyclub;

	         $results = $db->members->find();

                 foreach ($results as $member)
                 {
		 ?>
	      <tr>
		<td><a href="/hours/new/viewdetailedhours.php?id=<?php echo $member["_id"]; ?>"><?php echo $member["lname"]; ?>, <?php echo $member["fname"]; ?></a></td>
		<td>
		  <?php
		     if (array_key_exists("hours", $member))
		        echo sum_hours($member["hours"]);
		     else
		        echo "0";
		     ?>
		</td>
		<td><?php echo $member["graduation_year"]; ?></td>
		<td>
		  <?php
		     if ($member["position"] == "member")
		        echo "Member";
		     else if ($member["position"] == "executive-board")
		        echo "Executive Board";
		     else if ($member["position"] == "appointed-board")
		        echo "Appointed Board";
		     else
		        echo $member["position"];
		     ?>
		</td>
		<td>
		  <?php
		     if ($member["registered"])
		        echo "Yes";
		     else
		        echo "No";
		     ?>
		</td>
	      </tr>
	      <?php
		 }
		 ?>
	    </tbody>
	  </table>
	</div>
      </div>
      
    </div>

    <div id="delete-modal" class="reveal-modal" data-reveal>
    </div>

    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/footer.php"); ?>
    <script src="/js/jquery.tablesorter.min.js"></script>
    <script>
      $(document).ready(function()
         {
            $("#hourslist").tablesorter({sortList: [[0,0]]});
         }
      );
    </script>
  </body>

</html>
