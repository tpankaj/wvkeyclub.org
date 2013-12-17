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
	<input type="hidden" name="attendees-to-add" value="<?php if (isset($_POST["attendees-to-add"])) echo $_POST["attendees-to-add"]; else echo "0";?>" />
	<?php
	   $m = new MongoClient("mongodb://localhost");
	   $db = $m->wvkeyclub;

	   $eventid = new MongoId($_POST["event-id"]);
	   $event = $db->events->find(array("_id" => $eventid);

           $attendees = $db->members->find(array("hours" => array('$elemMatch' => array("event_id" => $_POST["event-id"]))));
           $i = 1;
           foreach ($i = 1; $i <= count($attendees); $i++)
           {
          ?>
	<div class="row">
	  <div class="small-5 columns">
	    <label>Member first name <small>required</small></label>
	    <input type="text" name="member-fname-<?php echo $i; ?>" value="<?php echo $attendees[$i - 1]["fname"]; ?>" required />
	  </div>
	  <div class="small-5 columns">
	    <label>Member last name <small>required</small></label>	    
	    <input type="text" name="member-lname-<?php echo $i; ?>" value="<?php echo $attendees[$i - 1]["lname"]; ?>" required />
	  </div>
	  <div class="small-2 columns">
	    <label>Hours <small>required</small></label>
	    <input type="number" name="member-hours-<?php echo $i; ?>" value="<?php echo $attendees[$i - 1]["hours"]; ?>" required />
	  </div>
	</div>
	<?php
	   }
	   ?>

	<?php
	   for (; $i <= (count($attendees) + intval($_POST["attendees-to-add"])); $i++)
	   {
         ?>
	<div class="row">
	  <div class="small-5 columns">
	    <label>Member first name <small>required</small></label>
	    <input type="text" name="member-fname-<?php echo $i; ?>" required />
	  </div>
	  <div class="small-5 columns">
	    <label>Member last name <small>required</small></label>	    
	    <input type="text" name="member-lname-<?php echo $i; ?>" required />
	  </div>
	  <div class="small-2 columns">
	    <label>Hours <small>required</small></label>
	    <input type="number" name="member-hours-<?php echo $i; ?>" required />
	  </div>
	</div>
	<?php
	   }
	   ?>
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
