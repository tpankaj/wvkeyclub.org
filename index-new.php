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
	<div class="small-12 columns">
	  <div class="picture-gallery">
	    <div><img class="picture-gallery-img" src="http://ofbuckleyandbeatles.files.wordpress.com/2011/01/testpattern.gif" /></div>
	    <div><img class="picture-gallery-img" src="http://ofbuckleyandbeatles.files.wordpress.com/2011/01/testpattern.gif" /></div>
	    <div><img class="picture-gallery-img" src="http://ofbuckleyandbeatles.files.wordpress.com/2011/01/testpattern.gif" /></div>
	    <div><img class="picture-gallery-img" src="http://ofbuckleyandbeatles.files.wordpress.com/2011/01/testpattern.gif" /></div>
	    <div><img class="picture-gallery-img" src="http://ofbuckleyandbeatles.files.wordpress.com/2011/01/testpattern.gif" /></div>
	    <div><img class="picture-gallery-img" src="http://ofbuckleyandbeatles.files.wordpress.com/2011/01/testpattern.gif" /></div>
	  </div>
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
      infinite: true,
      lazyLoad: 'ondemand',
      autoplay: true,
      autoplaySpeed: 2000
      });
      });
    </script>
    <style>
      .picture-gallery-image
      {
      display: block;
      margin-left: auto;
      margin-right: auto;
      }
    </style>
  </body>

</html>
