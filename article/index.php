<?php
   date_default_timezone_set("America/Los_Angeles");
   require_once($_SERVER['DOCUMENT_ROOT'] . "/lib/simplepie/autoloader.php");

   $feed = new SimplePie();
   $feed->enable_cache(false);
   $feed->set_feed_url("http://wvkcsecretaries.blogspot.com/feeds/posts/default");
   $feed->init();
   $feed->handle_content_type();
 
   foreach($feed->get_items() as $item) {
      if ($item->get_id() == urldecode($_GET['id']))
      {
           $article = $item;
           break;
      }
   }

?>
<!DOCTYPE html>

<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
  <head>
    <title><?php echo $article->get_title(); ?> -  Westview Key Club</title>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/header.php"); ?>
  </head>

  <body>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/navbar.php"); ?>

    <header class="hide-for-small">
      <div class="row">
	<div class="small-12 columns">
	  <h1><?php echo $article->get_title(); ?></h1>
	</div>
      </div>
    </header>

    <div id="mainContent">

      <div class="row show-for-small">
	<div class="small-12 columns">
	  <h1><?php echo $article->get_title(); ?></h1>
	</div>
      </div>

      <div class="row">
	<div class="twelve columns">
	  <h5><?php echo $article->get_date('j F Y | g:i a'); ?></h5>
	  <?php echo $article->get_content(); ?>
	</div>
      </div>

    </div>

    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/hours/view-my-hours-modal.php"); ?>
    
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/footer.php"); ?>
  </body>

</html>
