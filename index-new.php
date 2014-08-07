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
	    <div><img class="picture-gallery-img" src="http://media.wvkeyclub.org/homepage-picture-slideshow/index.php?id=<?php echo $picture_ids[$i]; ?>" /></div>
	    <?php
	       }
	       ?>
	  </div>
	</div>
      </div>
      <div class="row">
	<div class="three columns">
	  <h3>Quick Links</h3>
	</div>
	<div class="six columns">
	  <h3>What is Key Club?</h3>
	</div>
	<div class="three columns">
	  <h3>Announcements</h3>
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
      .picture-gallery-img
      {
      margin-left: auto;
      margin-right: auto;
      height: 40%;
      }
    </style>
  </body>

</html>
