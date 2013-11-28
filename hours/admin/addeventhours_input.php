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

      <form method="post" action="/hours/admin/addeventhours_process.php" data-abide>
	<input type="hidden" name="event-id" value="<?php echo $_POST[\"event-id\"]; ?>" />
	<input type="hidden" name="attendee-count" value="<?php echo $_POST[\"attendee-count\"]; ?>" />
	<?php
	   for ($int i = 1; $i <= $_POST["attendee-count"]; $i++)
	   {
         ?>
	<div class="row">
	  <div class="5 columns">
	    <label>Member first name <small>required</small></label>
	    <input type="text" name="member-fname-<?php echo $i; ?>" required />
	  </div>
	  <div class="5 columns">
	    <label>Member last name <small>required</small></label>	    
	    <input type="text" name="member-lname-<?php echo $i; ?>" required />
	  </div>
	  <div class="2 columns">
	    <label>Hours <small>required</small></label>
	    <input type="number" name="member-hours-<?php echo $i; ?>" required />
	  </div>
	</div>
	<?php
	   }
	   ?>
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
