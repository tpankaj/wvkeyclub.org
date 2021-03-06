<!DOCTYPE html>

<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
  <head>
    <title>Bulk Signups -  Westview Key Club</title>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/header.php"); ?>
  </head>

  <body>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/navbar.php"); ?>

    <header class="hide-for-small">
      <div class="row">
	<div class="small-12 columns">
	  <h1>Events Admin Panel</h1>
	  <h2>Bulk Signups</h2>
	</div>
      </div>
    </header>

    <div id="mainContent">

      <form method="post" action="/events/admin/bulksignups_process.php" data-abide>
	<?php
	   for ($i = 1; $i <= 15; $i++)
	   {
         ?>
	<div class="row">
	  <div class="small-5 columns">
	    <label>Member email address <small>required</small></label>
	    <input type="email" name="member-email-<?php echo $i; ?>" required />
	  </div>
	  <div class="small-7 columns">
	    <input type="checkbox" name="events
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
