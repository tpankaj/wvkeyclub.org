<!DOCTYPE html>

<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
  <head>
    <title>Edit Event Hours -  Westview Key Club</title>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/header.php"); ?>
  </head>

  <body>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/navbar.php"); ?>

    <header class="hide-for-small">
      <div class="row">
	<div class="small-12 columns">
	  <h1>Hours Admin Panel</h1>
	  <h2>Edit Event Hours</h2>
	</div>
      </div>
    </header>

    <div id="mainContent">

      <form method="post" action="/hours/admin/editeventhours_process.php" data-abide>
	<input type="hidden" name="event-id" value="<?php echo $_POST["event-id"]; ?>" />
	<?php
	   $m = new MongoClient("mongodb://localhost");
	   $db = $m->wvkeyclub;

	   $eventid = new MongoId($_POST["event-id"]);
	   $event = $db->events->find(array("_id" => $eventid));

           $attendees = $db->members->find(array("hours" => array('$elemMatch' => array("event_id" => $_POST["event-id"]))));
          ?>
	<?php
           $i = 1;
           foreach ($attendees as $attendee)
           {
          ?>
	<div class="row">
	  <div class="small-5 columns">
	    <label>Member first name</label>
	    <input type="text" name="member-fname-<?php echo $i; ?>" value="<?php echo $attendee["fname"]; ?>" />
	  </div>
	  <div class="small-5 columns">
	    <label>Member last name</label>	    
	    <input type="text" name="member-lname-<?php echo $i; ?>" value="<?php echo $attendee["lname"]; ?>" />
	  </div>
	  <div class="small-2 columns">
	    <label>Hours</label>
	    <?php
	       foreach ($attendee["hours"] as $event)
	       {
	          if ($event["event_id"] == $_POST["event-id"])
	          {
	       ?>
	    <input type="number" name="member-hours-<?php echo $i; ?>" value="<?php echo $event["hours"]; ?>" />
	    <?php
	             break;
	          }
	       }
	       ?>
	  </div>
	</div>
	<?php
	   $i++;
	   }
	   ?>

	<?php
	   if (! isset($_POST["attendees-to-add"]))
	      $attendees_to_add = 0;
	   else
	      $attendees_to_add = intval($_POST["attendees-to-add"]);
	   $initial_attendee_count = $i;
	   for (; $i < ($initial_attendee_count + $attendees_to_add); $i++)
	   {
         ?>
	<div class="row">
	  <div class="small-5 columns">
	    <label>Member first name</label>
	    <input type="text" name="member-fname-<?php echo $i; ?>" />
	  </div>
	  <div class="small-5 columns">
	    <label>Member last name</label>	    
	    <input type="text" name="member-lname-<?php echo $i; ?>" />
	  </div>
	  <div class="small-2 columns">
	    <label>Hours</label>
	    <input type="number" name="member-hours-<?php echo $i; ?>" />
	  </div>
	</div>
	<?php
	   }
	   echo $i;
	   ?>
	<input type="hidden" name="attendee-count" value="<?php echo $i; ?>" />
	<div class="row">
	  <div class="small-2 columns">
	    <input type="submit" value="Submit" />
	  </div>
	</div>
      </form>
      
    </div>

    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/footer.php"); ?>
  </body>

</html>
