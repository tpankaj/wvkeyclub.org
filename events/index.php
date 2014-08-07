<!DOCTYPE html>

<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
  <head>
    <title>Events -  Westview Key Club</title>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/header.php"); ?>
  </head>

  <body>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/navbar.php"); ?>

    <header class="hide-for-small">
      <div class="row">
	<div class="small-12 columns">
	  <h1>Events</h1>
	</div>
      </div>
    </header>

    <div id="mainContent">

      <div class="row show-for-small">
	<div class="small-12 columns">
	  <h1>Events</h1>
	</div>
      </div>

      <div class="row">
	<div class="small-12 columns">
	  <p>
	    <a href="#" data-reveal-id="events-sign-up-modal">Events Sign-Up</a><br />
	  </p>
	</div>
      </div>

    </div>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/events/events-sign-up-modal.php"); ?>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/footer.php"); ?>
  </body>

</html>
