<!DOCTYPE html>

<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
  <head>
    <title>Events Admin Panel -  Westview Key Club</title>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/header.php"); ?>
  </head>

  <body>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/navbar.php"); ?>

    <header class="hide-for-small">
      <div class="row">
	<div class="twelve columns">
	  <h1>Events Admin Panel</h1>
	</div>
      </div>
    </header>

    <div id="mainContent">

      <div class="row show-for-small">
	<div class="twelve columns">
	  <h1>Events Admin Panel</h1>
	</div>
      </div>

      <?php
	 if (isset($_POST["message"]))
	 {
	    if ($_POST["message"] == "addevent_success")
	    {
	 ?>
      <div class="row">
	<div class="twelve columns">
	  <div data-alert class="alert-box success radius">
	    Event successfully added!
	    <a href="#" class="close">&times;</a>
	  </div>
	</div>
      </div>
      <?php
	    }
	 }
	 ?>

      <div class="row">
	<div class="twelve columns">
	  <h3>Actions</h3>
	  <p>
	    <a href="/events/admin/addevent.php">Add Event</a>
	  </p>
	</div>
      </div>

    </div>

    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/footer.php"); ?>
  </body>

</html>