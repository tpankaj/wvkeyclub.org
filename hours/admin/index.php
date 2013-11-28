<!DOCTYPE html>

<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
  <head>
    <title>Hours Admin Panel -  Westview Key Club</title>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/header.php"); ?>
  </head>

  <body>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/navbar.php"); ?>

    <header class="hide-for-small">
      <div class="row">
	<div class="twelve columns">
	  <h1>Hours Admin Panel</h1>
	</div>
      </div>
    </header>

    <div id="mainContent">

      <div class="row show-for-small">
	<div class="twelve columns">
	  <h1>Hours Admin Panel</h1>
	</div>
      </div>

      <?php
	 if (isset($_GET["message"]))
	 {
	    if ($_GET["message"] == "addmember_success")
	    {
	 ?>
      <div class="row">
	<div class="twelve columns">
	  <div data-alert class="alert-box success radius">
	    Member successfully added!
	    <a href="#" class="close">&times;</a>
	  </div>
	</div>
      </div>
      <?php
	    }
	    else if ($_GET["message"] == "addeventhours_success")
	    {
	 ?>
      <div class="row">
	<div class="twelve columns">
	  <div data-alert class="alert-box success radius">
	    Hours successfully added!
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
	    <a href="/hours/admin/addmember.php">Add Member</a><br />
	    <a href="/hours/admin/addeventhours.php">Add Event Hours</a>
	  </p>
	</div>
      </div>
      <div class="row">
	<div class="twelve columns">
	  <h3>Data</h3>
	  <p>
	    <a href="/hours/admin/memberlist.php">Member List</a><br />
	  </p>
	</div>
      </div>

    </div>

    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/footer.php"); ?>
  </body>

</html>
