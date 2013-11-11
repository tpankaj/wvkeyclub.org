<!DOCTYPE html>

<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Westview Key Club</title>
    <link rel="icon" type="image/png" href="/img/icon.png">
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/presentation.css">
    <link rel="stylesheet" href="/css/foundation.css">
    <script src="/js/vendor/custom.modernizr.js"></script>
  </head>

  <body>

    <nav class="top-bar">
      <ul class="title-area">
	<li class="name">
	  <h1><a href="/">Westview Key Club</a></h1>
	</li>
	<li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
      </ul>

      <section class="top-bar-section">
	<ul class="right">
	  <li class="show-for-small">
	    <a href="/">Home</a>
	  </li>
	  <li>
	    <a href="/officers">Officers</a>
	  </li>
	  <li>
	    <a href="/events">Events</a>
	  </li>
	  <li>
	    <a href="/hours">Hours</a>
	  </li>
	  <li>
	    <a href="/forms">Forms</a>
	  </li>
	  <li>
	    <a href="/about-us">About Us</a>
	  </li>
	</ul>
      </section>
    </nav>

    <div id="mainContent">
      <div class="row">
	<div class="twelve columns">
	  <h3>Announcements</h3>
	  <?php
	     require_once($_SERVER['DOCUMENT_ROOT'] . "/lib/simplepie/autoloader.php");

	     $feed = new SimplePie();
	     $feed->set_feed_url("http://wvkcsecretaries.blogspot.com/feeds/posts/default");
	     $feed->init();
             $feed->handle_content_type();

             foreach($feed->get_items() as $item) {
	     ?>
	  <div class="item">
	    <h4><a href="<?php echo $item->get_permalink(); ?>"><?php echo $item->get_title(); ?></a></h4>
	    <h5>Posted on <?php echo $item->get_date('j F Y | g:i a'); ?></h5>
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
    <script>
      document.write('<script src=' +
			      ('__proto__' in {} ? 'js/vendor/zepto' : 'js/vendor/jquery') +
			      '.js><\/script>')
      </script>
      <script src="/js/foundation.min.js"></script>
      <script>
	$(document).foundation();
      </script>
  </body>

</html>
