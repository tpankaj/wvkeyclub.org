<!DOCTYPE html>

<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
  <head>
    <title>Add Event -  Westview Key Club</title>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/header.php"); ?>
  </head>

  <body>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/navbar.php"); ?>

    <header class="hide-for-small">
      <div class="row">
	<div class="twelve columns">
	  <h1>Events Admin Panel</h1>
	  <h2>Add Event</h2>
	</div>
      </div>
    </header>

    <div id="mainContent">

      <form method="post" action="/events/admin/addevent_process.php" data-abide>
	<div class="row">
	  <div class="twelve columns">
	    <label>Event name <small>required</small></label>
	    <input type="text" name="name" required />
	  </div>
	</div>
	<div class="row">
	  <div class="six columns">
	    <label>Start time (ex: 2013-11-27T22:22:16-07:00) <small>required</small></label>
	    <input type="datetime" placeholder="YYYY-MM-DDThh:mm:ssTZD" name="start-time" required />
	  </div>
	  <div class="six columns">
	    <label>End time <small>required</small></label>
	    <input type="datetime" placeholder="YYYY-MM-DDThh:mm:ssTZD" name="end-time" required />
	  </div>
	</div>
	<div class="row">
	  <div class="twelve columns">
	    <label>Location <small>required</small></label>
	    <input type="text" name="location" required />
	  </div>
	</div>
	<div class="row">
	  <div class="twelve columns">
	    <label>Description <small>required</small></label>
	    <textarea name="description" required>
	    </textarea>
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
