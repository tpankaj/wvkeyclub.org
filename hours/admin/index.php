<!DOCTYPE html>

<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
  <head>
    <title>Hours Admin Panel -  Westview Key Club</title>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/header.php"); ?>
    <style>
      .alert-box.failure
      {
         background-color: #ff2222;
         border-color: #ff1100;
         color: white;
      }
    </style>
  </head>

  <body>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/navbar.php"); ?>

    <header class="hide-for-small">
      <div class="row">
	<div class="small-12 columns">
	  <h1>Hours Admin Panel</h1>
	</div>
      </div>
    </header>

    <div id="mainContent">

      <div class="row show-for-small">
	<div class="small-12 columns">
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
	<div class="small-12 columns">
	  <div data-alert class="alert-box success radius">
	    Member successfully added!
	    <a href="#" class="close">&times;</a>
	  </div>
	</div>
      </div>
      <?php
	    }
	    else if ($_GET["message"] == "addmember_failure_duplicate")
	    {
	 ?>
      <div class="row">
	<div class="small-12 columns">
	  <div data-alert class="alert-box failure radius">
	    Member is a duplicate. Not added.
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
	<div class="small-12 columns">
	  <div data-alert class="alert-box success radius">
	    Hours successfully added!
	    <a href="#" class="close">&times;</a>
	  </div>
	</div>
      </div>
      <?php
	    }
	    else if ($_GET["message"] == "editeventhours_success")
	    {
	 ?>
      <div class="row">
	<div class="small-12 columns">
	  <div data-alert class="alert-box success radius">
	    Hours successfully edited!
	    <a href="#" class="close">&times;</a>
	  </div>
	</div>
      </div>
      <?php
	    }
	 }
	 ?>

      <div class="row">
	<div class="small-12 columns">
	  <h3>Actions</h3>
	  <p>
	    <a href="/hours/admin/addmember.php">Add Member</a><br />
	    <a href="/hours/admin/addeventhours.php">Add Event Hours</a><br />
	    <a href="/hours/admin/editeventhours.php">Edit Event Hours</a>
	  </p>
	</div>
      </div>
      <div class="row">
	<div class="small-12 columns">
	  <h3>Data</h3>
	  <p>
	    <a href="/hours/admin/memberslist.php">Members List</a><br />
	    <a href="/hours/admin/emaillist.php">Email List</a><br />
	  </p>
	</div>
      </div>

    </div>

    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/footer.php"); ?>
  </body>

</html>
