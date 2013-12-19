<!DOCTYPE html>

<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
  <head>
    <title>Events List -  Westview Key Club</title>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/header.php"); ?>
    <link rel="stylesheet" href="/css/tablesorter.css">
  </head>

  <body>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/navbar.php"); ?>

    <header class="hide-for-small">
      <div class="row">
	<div class="small-12 columns">
	  <h1>Events Admin Panel</h1>
	  <h2>Events List</h2>
	</div>
      </div>
    </header>

    <div id="mainContent">

      <?php
	 if (isset($_GET["message"]))
	 {
	    if ($_GET["message"] == "eventsignup_success")
	    {
	 ?>
      <div class="row">
	<div class="small-12 columns">
	  <div data-alert class="alert-box success radius">
	    Event sign-up successful!
	    <a href="#" class="close">&times;</a>
	  </div>
	</div>
      </div>
      <?php
	    }
	 }
	 ?>

      <div class="row">
	<div class="small-12 columns">
	  <table style="margin-left:auto; margin-right:auto;">
	    <thead>
	      <tr>
		<th class="header">Name</th>
		<th class="header">Start Time</th>
		<th class="header">End Time</th>
		<th class="header">Sign Up</th>
	    </thead>
	    <tbody>
	      <?php
		 $m = new MongoClient("mongodb://localhost");
		 $db = $m->wvkeyclub;

	         $results = $db->events->find(array("time.start" => array('$gt' => time())))->sort(array("time.start" => 1));

                 foreach ($results as $event)
                 {
		 ?>
	      <tr>
		<td><?php echo $event["name"]; ?></td>
		<td>
		  <?php
		     $starttime = new DateTime();
		     $starttime->setTimestamp(intval($event["time"]["start"]));
		     echo $starttime->format("D, d-M-y g:i A");
		     ?>
		</td>
		<td>
		  <?php
		     $endtime = new DateTime();
		     $endtime->setTimestamp(intval($event["time"]["end"]));
		     echo $endtime->format("D, d-M-y g:i A");
		     ?>
		</td>
		<td>
		  <?php
		     if (isset($event["email_list"]) && in_array($_REQUEST["email"], $event["email_list"]))
	 	     {
		     ?>
		  Signed Up
		  <?php
		     }
		     else
		     {
		     ?>
		  <a href="/events/eventssignup_process.php?id=<?php echo $event["_id"];?>&email=<?php echo urlencode($_REQUEST["email"]); ?>">Sign Up</a>
		  <?php
		     }
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

    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/footer.php"); ?>
  </body>

</html>
