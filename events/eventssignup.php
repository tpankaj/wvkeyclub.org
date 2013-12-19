<!DOCTYPE html>

<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
  <head>
    <title>Events List -  Westview Key Club</title>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/header.php"); ?>
  </head>

  <body>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/navbar.php"); ?>

    <header class="hide-for-small">
      <div class="row">
	<div class="twelve columns">
	  <h1>Events</h1>
	  <h2>Sign-Ups for <?php echo $_REQUEST["email"]; ?></h2>
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
	<div class="twelve columns">
	  <div data-alert class="alert-box success radius">
	    Event sign-up successful!
	    <a href="#" class="close">&times;</a>
	  </div>
	</div>
      </div>
      <?php
	    }
	    else if ($_GET["message"] == "eventremoval_success")
	    {
	 ?>
      <div class="row">
	<div class="twelve columns">
	  <div data-alert class="alert-box success radius">
	    Event removal successful!
	    <a href="#" class="close">&times;</a>
	  </div>
	</div>
      </div>
      <?php
	    }
	 }
	 ?>

      <div class="row">
	<div class="one column">
	  <ul class="side-nav">
	    <li><a href="/events/">&larr; Go back</a></li>
	  </ul>
	</div>

	<div class="eleven columns">
	  <table style="margin-left:auto; margin-right:auto;">
	    <thead>
	      <tr>
		<th class="header">Name</th>
		<th class="header">Start Time</th>
		<th class="header">End Time</th>
		<th class="header">Action</th>
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
		  <a href="/events/eventssignup_process.php?id=<?php echo $event["_id"];?>&action=pull&email=<?php echo urlencode($_REQUEST["email"]); ?>">Remove</a>
		  <?php
		     }
		     else
		     {
		     ?>
		  <a href="/events/eventssignup_process.php?id=<?php echo $event["_id"];?>&action=push&email=<?php echo urlencode($_REQUEST["email"]); ?>">Sign Up</a>
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
