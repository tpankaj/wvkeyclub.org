<?php
   require_once($_SERVER["DOCUMENT_ROOT"] . "/lib/hours.php");
   $m = new MongoClient("mongodb://localhost");
   $db = $m->wvkeyclub;

   if (!empty($_GET["id"]))
   {
      $member_id = new MongoId($_GET["id"]);
      $member = $db->members->findOne(array("_id" => $member_id));
   }
   else
   {
      $member = $db->members->findOne(array("email" => $_POST["email"]));
   }

   if (array_key_exists("hours", $member))
      $hours_sum = sum_hours($member["hours"]);
   else
      $hours_sum = 0;
   ?>


<!DOCTYPE html>

<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
  <head>
    <title><?php echo $member["fname"]; ?> <?php echo $member["lname"]; ?> - Hours -  Westview Key Club</title>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/header.php"); ?>
    <link rel="stylesheet" href="/css/tablesorter.css">
  </head>

  <body>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/navbar.php"); ?>

    <header class="hide-for-small">
      <div class="row">
	<div class="small-12 columns">
	  <h1>Hours</h1>
	  <h2><?php echo $member["fname"]; ?> <?php echo $member["lname"]; ?></h2>
	</div>
      </div>
    </header>

    <div id="mainContent">

      <div class="row">
	<div class="small-12 columns">
	  <h3>Total Hours</h3>
	  <p>
	    You have a total of <?php echo $hours_sum; ?> hours.
	  </p>
	</div>
      </div>
      <div class="row">
	<div class="small-12 columns">
	  <h3>Events List</h3>
	  <table id="hourslist" class="tablesorter" style="margin-left:auto; margin-right:auto;">
	    <thead>
	      <tr>
		<th class="header">Name</th>
		<th class="header">Start Time</th>
		<th class="header">End Time</th>
		<th class="header">Hours</th>
	    </thead>
	    <tbody>
	      <?php
                 foreach ($member["hours"] as $event_hours)
                 {
		    $event_id = new MongoId($event_hours["event_id"]);
		    $event = $db->events->findOne(array("_id" => $event_id));
		 ?>
	      <tr>
		<td><?php echo $event["name"]; ?></td>
		<td>
		  <?php
		     $starttime = new DateTime();
		     $starttime->setTimestamp(intval($event["time"]["start"]));
		     echo $starttime->format("j F Y g:i:sa");
		     ?>
		</td>
		<td>
		  <?php
		     $endtime = new DateTime();
		     $endtime->setTimestamp(intval($event["time"]["end"]));
		     echo $endtime->format("j F Y g:i:sa");
		     ?>
		</td>
		<td><?php echo $event_hours["hours"]; ?></td>
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
