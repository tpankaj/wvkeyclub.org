<!DOCTYPE html>

<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
  <head>
    <title>Edit Member -  Westview Key Club</title>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/header.php"); ?>
  </head>

  <body>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/navbar.php"); ?>

    <header class="hide-for-small">
      <div class="row">
	<div class="small-12 columns">
	  <h1>Hours Admin Panel</h1>
	  <h2>Edit Member</h2>
	</div>
      </div>
    </header>

    <div id="mainContent">

      <?php
	 $m = new MongoClient("mongodb://localhost");
	 $db = $m->wvkeyclub;

         $member_id = new MongoID($_GET["id"]);
         $member = $db->members->findOne(array("_id" => $member_id));
	 ?>
      <form method="post" action="/hours/admin/editmember_process.php" data-abide>
	<input type="hidden" name="member-id" value="<?php echo $_GET["id"]; ?>" />
	<div class="row">
	  <div class="small-6 columns">
	    <label>First name <small>required</small></label>
	    <input type="text" name="fname" value="<?php echo $member["fname"]; ?>" required />
	  </div>
	  <div class="small-6 columns">
	    <label>Last name <small>required</small></label>
	    <input type="text" name="lname" value="<?php echo $member["lname"]; ?>" required />
	  </div>
	</div>
	<div class="row">
	  <div class="small-12 columns">
	    <label>Email address</label>
	    <input type="email" name="email" value="<?php echo $member["email"]; ?>" />
	  </div>
	</div>
	<div class="row">
	  <div class="small-12 columns">
	    <label>Graduation year</label>
	    <input type="number" name="graduation_year" value="<?php echo $member["graduation_year"]; ?>" />
	  </div>
	</div>
	<div class="row">
	  <div class="small-12 columns">
	    <label>Position <small>required</small></label>
	    <select name="position" required>
	      <option value="member" <?php if ($member["position"] == "member") echo "selected";?>>Member</option>
	      <option value="executive-board" <?php if ($member["position"] == "executive-board") echo "selected"; ?>>Executive Board</option>
	      <option value="appointed-board" <?php if ($member["position"] == "appointed-board") echo "selected"; ?>>Appointed Board</option>
	    </select>
	  </div>
	</div>
	<div class="row">
	  <div class="small-12 columns">
	    <label>Registered? <small>required</small></label>
	    <input type="radio" name="registered" value="true" <?php if ($member["registered"]) echo "checked";?> />Yes<br />
	    <input type="radio" name="registered" value="false" <?php if (! $member["registered"]) echo "checked";?> />No<br />
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
