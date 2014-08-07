<!DOCTYPE html>

<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
  <head>
    <title>Hours -  Westview Key Club</title>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/header.php"); ?>
  </head>

  <body>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/navbar.php"); ?>

    <header class="hide-for-small">
      <div class="row">
	<div class="small-12 columns">
	  <h1>Hours</h1>
	</div>
      </div>
    </header>

    <div id="mainContent">

      <div class="row show-for-small">
	<div class="small-12 columns">
	  <h1>Hours</h1>
	</div>
      </div>

      <div class="row">
	<div class="small-12 columns">
	  <p>
	    <a href="#" data-reveal-id="view-my-hours-modal">View My Hours</a><br />
	    <a href="/hours/hourslist.php">View All Hours</a><br />
	    <a href="/hours/2013-2014/">View 2013-2014 Hours</a>
	  </p>
	</div>
      </div>

    </div>

    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/hours/view-my-hours-modal.php"); ?>
    
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/footer.php"); ?>
  </body>

</html>
