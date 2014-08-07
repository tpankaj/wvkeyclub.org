<!DOCTYPE html>

<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
  <head>
    <title>Westview Key Club</title>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/header.php"); ?>
    <link rel="stylesheet" type="text/css" href="/slick/slick.css">
  </head>

  <body>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/navbar.php"); ?>
    <div id="mainContent">
      <div class="row">
	<div class="12 columns">
	  <div class="picture-gallery">
	    <?php
	       $max_id = 0;
	       if ($handle = opendir('/var/www/media.wvkeyclub.org/homepage-picture-slideshow/images')) {
	           while (false !== ($entry = readdir($handle))) {
	               if ($entry != "." && $entry != "..") {
                           $max_id++;
    	               }
                   }
	       }
	       $max_id--;
	       $picture_ids = range(0, $max_id);
	       shuffle($picture_ids);
	       for ($i = 0; $i < 5; $i++)
               {
	       ?>
	    <div><img src="http://media.wvkeyclub.org/homepage-picture-slideshow/index.php?id=<?php echo $picture_ids[$i]; ?>" /></div>
	    <?php
	       }
	       ?>
	  </div>
	</div>
      </div>
      <div class="row">
	<div class="three columns">
	  <h3 style="text-align:center;">Quick Links</h3>
	</div>
	<div class="six columns">
	  <h3 style="text-align:center;">What is Key Club?</h3>
	</div>
	<div class="three columns">
	  <h3 style="text-align:center;">Announcements</h3>
	  <ul>
	    <?php
	       date_default_timezone_set("America/Los_Angeles");
	       require_once($_SERVER['DOCUMENT_ROOT'] . "/lib/simplepie/autoloader.php");

	       $feed = new SimplePie();
	       $feed->enable_cache(false);
 	       $feed->set_feed_url("http://blog.wvkeyclub.org/feeds/posts/default");
	       $feed->init();
               $feed->handle_content_type();

               $i = 0;
               foreach($feed->get_items() as $item) {
             ?>
	    <li><a href="/article?id=<?php echo $item->get_id(); ?>"><?php echo $item->get_title(); ?></a></li>
	    <?php
	           $i++;
	           if ($i >= 4)
	           {
	              break;
	           }
	        }
	     ?>
	  </ul>
	</div>
      </div>
    </div>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/footer.php"); ?>
    <script type="text/javascript" src="/js/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="/slick/slick.min.js"></script>
    <script type="text/javascript">   
      $(document).ready(function(){
      $('.picture-gallery').slick({
      dots: true,
      arrows: false,
      infinite: true,
      autoplay: true,
      autoplaySpeed: 5000
      });
      });
    </script>
    <style>
      .picture-gallery
      {
      margin-left: auto;
      margin-right: auto;
      height: 40%;
      }
    </style>
  </body>

</html>
