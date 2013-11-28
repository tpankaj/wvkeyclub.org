<!DOCTYPE html>

<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
  <head>
    <title>Add Event Hours -  Westview Key Club</title>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/header.php"); ?>
  </head>

  <body>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/navbar.php"); ?>

    <header class="hide-for-small">
      <div class="row">
	<div class="twelve columns">
	  <h1>Hours Admin Panel</h1>
	  <h2>Add Event Hours</h2>
	</div>
      </div>
    </header>

    <div id="mainContent">

      <form method="post" action="/hours/admin/addeventhours_input.php" data-abide>
	<div class="row">
	  <div class="12 columns">
	    <label>Event <small>required</small></label>
	    <select name="event-id" required>
	      <?php
		    $m = new MongoClient("mongodb://localhost");
		    $db = $m->wvkeyclub;

	            $results = $db->events->find(array("hours_entered" => false));

                    foreach ($results as $event)
                    {
		 ?>
	      <option value="<?php echo $event["_id"]; ?>"><?php echo $event["name"]; ?></option>
	      <?php
		    }
		 ?>
	    </select>
	  </div>
	</div>
	<div class="row">
	  <div class="12 columns">
	    <label>Number of attendees <small>required</small></label>
	    <input type="text" pattern="integer" name="attendee-count" required />
	  </div>
	</div>
	<div class="row">
	  <div class="2 columns">
	    <input type="submit" value="Submit" />
	  </div>
	</div>
      </form>
      
    </div>

    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/footer.php"); ?>
  </body>

</html>
