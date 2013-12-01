<!DOCTYPE html>

<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
  <head>
    <title>Westview Key Club</title>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/header.php"); ?>
  </head>

  <body>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/navbar.php"); ?>
    <div id="mainContent">
      <div class="row">
	<div class="small-12 columns">
	  <h3>Announcements</h3>
	  <?php
	     date_default_timezone_set("America/Los_Angeles");
	     require_once($_SERVER['DOCUMENT_ROOT'] . "/lib/simplepie/autoloader.php");

	     $feed = new SimplePie();
	     $feed->set_feed_url("http://wvkcsecretaries.blogspot.com/feeds/posts/default");
	     $feed->init();
             $feed->handle_content_type();

             foreach($feed->get_items() as $item) {
	?>
	  <div class="item">
	    <h4><?php echo $item->get_title(); ?></h4>
	    <h5><?php echo $item->get_date('j F Y | g:i a'); ?></h5>
	    <?php
	       echo $item->get_content();
	    ?>
	  </div>
	  <?php
	     }
	     ?>
	</div>
      </div>
    </div>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/footer.php"); ?>
  </body>

</html>
