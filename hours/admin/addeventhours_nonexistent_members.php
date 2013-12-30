<!DOCTYPE html>

<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
  <head>
    <title>Nonexistent Members -  Westview Key Club</title>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/header.php"); ?>
  </head>

  <body>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/navbar.php"); ?>

    <header class="hide-for-small">
      <div class="row">
	<div class="small-12 columns">
	  <h1>Hours Admin Panel</h1>
	  <h2>Nonexistent Members</h2>
	</div>
      </div>
    </header>

    <div id="mainContent">
      <div class="row">
	<div class="twelve columns">
	  <p>The following members do not exist in the member database. Select yes to add them to the database as unregistered members (their status can be changed later).</p>
	</div>
      </div>
      <form method="post" action="/hours/admin/addeventhours_nonexistent_members_process.php" data-abide>
	<input type="hidden" name="count" value="<?php echo $_GET["c"]; ?>">
	<input type="hidden" name="event-id" value="<?php echo $_GET["id"]; ?>">
	<?php
	   for ($i = 0; $i < $_GET["c"]; $i++)
           {
	   ?>
	<div class="row">
	  <div class="twelve columns">
	    <input type="hidden" name="member-fname-<?php echo $i; ?>" value="<?php echo $_GET["f" . $i]; ?>">
	    <input type="hidden" name="member-lname-<?php echo $i; ?>" value="<?php echo $_GET["l" . $i]; ?>">
	    <input type="hidden" name="member-hours-<?php echo $i; ?>" value="<?php echo $_GET["h" . $i]; ?>">
	    <label><?php echo $_GET["f" . $i] . " " . $_GET["l" . $i]; ?><small>required</small></label>
	    <input type="radio" name="member-create-<?php echo $i; ?>" value="true" required>Yes<br />
	    <input type="radio" name="member-create-<?php echo $i; ?>" value="false" required>No<br />
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
