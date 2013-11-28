<!DOCTYPE html>

<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
  <head>
    <title>Add Member -  Westview Key Club</title>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/header.php"); ?>
  </head>

  <body>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/navbar.php"); ?>

    <header class="hide-for-small">
      <div class="row">
	<div class="twelve columns">
	  <h1>Hours Admin Panel</h1>
	  <h2>Add Member</h2>
	</div>
      </div>
    </header>

    <div id="mainContent">

      <form method="post" action="/hours/admin/addmember_process.php" data-abide>
	<div class="row">
	  <div class="large-6 columns">
	    <label>First name <small>required</small></label>
	    <input type="text" name="fname" required />
	  </div>
	  <div class="large-6 columns">
	    <label>Last name <small>required</small></label>
	    <input type="text" name="lname" required />
	  </div>
	</div>
	<div class="row">
	  <div class="large-12 columns">
	    <label>Email address</label>
	    <input type="email" name="email" />
	  </div>
	</div>
	<div class="row">
	  <div class="large-12 columns">
	    <label>Graduation year <small>required</small></label>
	    <input type="number" name="graduation_year" required />
	  </div>
	</div>
	<div class="row">
	  <div class="large-12 columns">
	    <label>Position <small>required</small></label>
	    <select name="position" required>
	      <option value="member">Member</option>
	      <option value="executive-board">Executive Board</option>
	      <option value="appointed-board">Appointed Board</option>
	    </select>
	  </div>
	</div>
	<div class="row">
	  <div class="large-12 columns">
	    <label>Registered? <small>required</small></label>
	    <input type="radio" name="registered" value="true" />Yes<br />
	    <input type="radio" name="registered" value="false" />No<br />
	  </div>
	</div>
	<div class="row">
	  <div class="large-2 columns">
	    <input type="submit" value="Submit" />
	  </div>
	</div>
      </form>
      
    </div>

    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/footer.php"); ?>
  </body>

</html>
