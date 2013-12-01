<!DOCTYPE html>

<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
  <head>
    <title>Edit Event -  Westview Key Club</title>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/header.php"); ?>
  </head>

  <body>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/navbar.php"); ?>

    <header class="hide-for-small">
      <div class="row">
	<div class="small-12 columns">
	  <h1>Events Admin Panel</h1>
	  <h2>Edit Event</h2>
	</div>
      </div>
    </header>

    <div id="mainContent">

      <?php
	 $m = new MongoClient("mongodb://localhost");
	 $db = $m->wvkeyclub;

         $event_id = new MongoId($_GET["id"]);
         $event = $db->events->findOne(array("_id" => $event_id));

         $starttime = new DateTime();
         $starttime->setTimestamp(intval($event["time"]["start"]));

         $endtime = new DateTime();
         $endtime->setTimestamp(intval($event["time"]["end"]));
      ?>
      <form method="post" action="/events/admin/editevent_process.php" data-abide>
	<input type="hidden" name="event-id" value="<?php echo $_GET["id"]; ?>" />
	<div class="row">
	  <div class="small-12 columns">
	    <label>Event name <small>required</small></label>
	    <input type="text" name="name" value="<?php echo $event["name"]; ?>" required />
	  </div>
	</div>
	<div class="row">
	  <div class="small-6 columns">
	    <label>Start time (ex: 2013-11-27T22:22:16-08:00) <small>required</small></label>
	    <input type="datetime" name="start-time" value="<?php echo $starttime->format(DateTime::W3C); ?>" required />
	  </div>
	  <div class="small-6 columns">
	    <label>End time <small>required</small></label>
	    <input type="datetime" name="end-time" value="<?php echo $endtime->format(DateTime::W3C); ?>" required />
	  </div>
	</div>
	<div class="row">
	  <div class="small-12 columns">
	    <label>Location</label>
	    <input type="text" name="location" value="<?php echo $event["location"]; ?>" />
	  </div>
	</div>
	<div class="row">
	  <div class="small-12 columns">
	    <label>Description</label>
	    <textarea name="description"><?php echo $event["description"]; ?></textarea>
	  </div>
	</div>
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
