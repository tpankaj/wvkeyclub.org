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
	<div class="3 columns">
	  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sed ultricies elit. Fusce blandit dapibus sem sed varius. Duis enim nisi, varius at laoreet vitae, commodo in tellus. Aenean semper varius elit, a dapibus augue aliquet ac. Donec vulputate tempor elit. Vivamus ac sapien a sem tempus bibendum. Sed non rhoncus sem. Duis sed justo mollis, aliquet elit quis, pharetra arcu. Suspendisse eu auctor neque. Aenean mattis porta tempor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc volutpat mollis orci at commodo. Donec ac porta ante. Nulla eget risus mi. Suspendisse potenti. Integer dignissim tellus quis ligula sodales, vitae pharetra orci aliquam.

Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tempor dignissim odio, ac rutrum urna tempus sed. Curabitur quis purus pharetra, rutrum est sed, facilisis est. Vivamus id erat vel augue ullamcorper bibendum at quis orci. Sed egestas sem sit amet ante mollis scelerisque. Integer mauris nibh, tristique eget facilisis non, placerat ut risus. Quisque at quam nunc. Sed vestibulum malesuada leo.

Ut lacinia, risus eget consectetur pulvinar, massa turpis cursus metus, a ornare justo nunc ut odio. In venenatis eleifend tellus, nec posuere urna scelerisque et. Vivamus auctor libero non tincidunt porta. Donec aliquet congue pretium. Cras diam libero, mollis et vulputate eget, pharetra sed justo. In semper rutrum erat, id interdum arcu aliquet sed. Vestibulum ac augue venenatis justo semper laoreet vitae ultricies erat. In vel tincidunt arcu, non imperdiet sapien. Cras viverra feugiat leo eleifend aliquet. Mauris auctor sagittis augue. Nulla adipiscing tellus eu ante ultricies consequat. Ut condimentum nibh eget enim laoreet, non dictum purus fermentum. Morbi eget tellus ac orci aliquet ornare at sed nunc. Phasellus scelerisque nec mauris eget fermentum.

Curabitur lobortis lorem eget mattis mattis. Nunc euismod ullamcorper diam sed molestie. Nunc et tellus ut libero pulvinar tristique quis dapibus leo. In hac habitasse platea dictumst. Aliquam erat volutpat. Donec id gravida nisl, ut bibendum felis. Nulla egestas auctor dapibus. Maecenas quis libero leo. Fusce et cursus justo. Vivamus id volutpat arcu, et cursus lorem. Pellentesque vel fermentum justo, consequat lacinia libero. Donec at vestibulum purus. Aliquam erat volutpat. Nulla pellentesque dolor sapien, ultricies auctor turpis fermentum nec.

Curabitur molestie ipsum erat. Suspendisse vel lectus non sapien sollicitudin vehicula vel quis risus. Vivamus vel nunc sagittis, lacinia nibh ac, scelerisque massa. Sed tortor enim, porta ac magna eu, venenatis tincidunt magna. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Etiam nisi odio, sodales at leo eget, malesuada molestie risus. Cras tempus risus in nisl venenatis, et pharetra justo vulputate. Nulla porttitor vel urna et sagittis. Nam viverra sed diam vel elementum. Duis at neque eu quam tincidunt condimentum. Curabitur luctus ligula a fringilla eleifend. Morbi metus magna, posuere eu lacus quis, vulputate posuere justo. Mauris luctus lectus at metus gravida, quis lacinia ipsum facilisis. Cras suscipit, nibh eu volutpat venenatis, odio lectus hendrerit augue, pulvinar facilisis purus leo nec justo. Pellentesque aliquam lorem leo, a gravida arcu fringilla quis. Ut purus ante, semper a ipsum vel, tincidunt sagittis purus.
	</div>
	<div class="6 columns">
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sed ultricies elit. Fusce blandit dapibus sem sed varius. Duis enim nisi, varius at laoreet vitae, commodo in tellus. Aenean semper varius elit, a dapibus augue aliquet ac. Donec vulputate tempor elit. Vivamus ac sapien a sem tempus bibendum. Sed non rhoncus sem. Duis sed justo mollis, aliquet elit quis, pharetra arcu. Suspendisse eu auctor neque. Aenean mattis porta tempor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc volutpat mollis orci at commodo. Donec ac porta ante. Nulla eget risus mi. Suspendisse potenti. Integer dignissim tellus quis ligula sodales, vitae pharetra orci aliquam.

Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tempor dignissim odio, ac rutrum urna tempus sed. Curabitur quis purus pharetra, rutrum est sed, facilisis est. Vivamus id erat vel augue ullamcorper bibendum at quis orci. Sed egestas sem sit amet ante mollis scelerisque. Integer mauris nibh, tristique eget facilisis non, placerat ut risus. Quisque at quam nunc. Sed vestibulum malesuada leo.

Ut lacinia, risus eget consectetur pulvinar, massa turpis cursus metus, a ornare justo nunc ut odio. In venenatis eleifend tellus, nec posuere urna scelerisque et. Vivamus auctor libero non tincidunt porta. Donec aliquet congue pretium. Cras diam libero, mollis et vulputate eget, pharetra sed justo. In semper rutrum erat, id interdum arcu aliquet sed. Vestibulum ac augue venenatis justo semper laoreet vitae ultricies erat. In vel tincidunt arcu, non imperdiet sapien. Cras viverra feugiat leo eleifend aliquet. Mauris auctor sagittis augue. Nulla adipiscing tellus eu ante ultricies consequat. Ut condimentum nibh eget enim laoreet, non dictum purus fermentum. Morbi eget tellus ac orci aliquet ornare at sed nunc. Phasellus scelerisque nec mauris eget fermentum.

Curabitur lobortis lorem eget mattis mattis. Nunc euismod ullamcorper diam sed molestie. Nunc et tellus ut libero pulvinar tristique quis dapibus leo. In hac habitasse platea dictumst. Aliquam erat volutpat. Donec id gravida nisl, ut bibendum felis. Nulla egestas auctor dapibus. Maecenas quis libero leo. Fusce et cursus justo. Vivamus id volutpat arcu, et cursus lorem. Pellentesque vel fermentum justo, consequat lacinia libero. Donec at vestibulum purus. Aliquam erat volutpat. Nulla pellentesque dolor sapien, ultricies auctor turpis fermentum nec.

Curabitur molestie ipsum erat. Suspendisse vel lectus non sapien sollicitudin vehicula vel quis risus. Vivamus vel nunc sagittis, lacinia nibh ac, scelerisque massa. Sed tortor enim, porta ac magna eu, venenatis tincidunt magna. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Etiam nisi odio, sodales at leo eget, malesuada molestie risus. Cras tempus risus in nisl venenatis, et pharetra justo vulputate. Nulla porttitor vel urna et sagittis. Nam viverra sed diam vel elementum. Duis at neque eu quam tincidunt condimentum. Curabitur luctus ligula a fringilla eleifend. Morbi metus magna, posuere eu lacus quis, vulputate posuere justo. Mauris luctus lectus at metus gravida, quis lacinia ipsum facilisis. Cras suscipit, nibh eu volutpat venenatis, odio lectus hendrerit augue, pulvinar facilisis purus leo nec justo. Pellentesque aliquam lorem leo, a gravida arcu fringilla quis. Ut purus ante, semper a ipsum vel, tincidunt sagittis purus.
	</div>
	<div class="3 columns">
	  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sed ultricies elit. Fusce blandit dapibus sem sed varius. Duis enim nisi, varius at laoreet vitae, commodo in tellus. Aenean semper varius elit, a dapibus augue aliquet ac. Donec vulputate tempor elit. Vivamus ac sapien a sem tempus bibendum. Sed non rhoncus sem. Duis sed justo mollis, aliquet elit quis, pharetra arcu. Suspendisse eu auctor neque. Aenean mattis porta tempor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc volutpat mollis orci at commodo. Donec ac porta ante. Nulla eget risus mi. Suspendisse potenti. Integer dignissim tellus quis ligula sodales, vitae pharetra orci aliquam.

Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tempor dignissim odio, ac rutrum urna tempus sed. Curabitur quis purus pharetra, rutrum est sed, facilisis est. Vivamus id erat vel augue ullamcorper bibendum at quis orci. Sed egestas sem sit amet ante mollis scelerisque. Integer mauris nibh, tristique eget facilisis non, placerat ut risus. Quisque at quam nunc. Sed vestibulum malesuada leo.

Ut lacinia, risus eget consectetur pulvinar, massa turpis cursus metus, a ornare justo nunc ut odio. In venenatis eleifend tellus, nec posuere urna scelerisque et. Vivamus auctor libero non tincidunt porta. Donec aliquet congue pretium. Cras diam libero, mollis et vulputate eget, pharetra sed justo. In semper rutrum erat, id interdum arcu aliquet sed. Vestibulum ac augue venenatis justo semper laoreet vitae ultricies erat. In vel tincidunt arcu, non imperdiet sapien. Cras viverra feugiat leo eleifend aliquet. Mauris auctor sagittis augue. Nulla adipiscing tellus eu ante ultricies consequat. Ut condimentum nibh eget enim laoreet, non dictum purus fermentum. Morbi eget tellus ac orci aliquet ornare at sed nunc. Phasellus scelerisque nec mauris eget fermentum.

Curabitur lobortis lorem eget mattis mattis. Nunc euismod ullamcorper diam sed molestie. Nunc et tellus ut libero pulvinar tristique quis dapibus leo. In hac habitasse platea dictumst. Aliquam erat volutpat. Donec id gravida nisl, ut bibendum felis. Nulla egestas auctor dapibus. Maecenas quis libero leo. Fusce et cursus justo. Vivamus id volutpat arcu, et cursus lorem. Pellentesque vel fermentum justo, consequat lacinia libero. Donec at vestibulum purus. Aliquam erat volutpat. Nulla pellentesque dolor sapien, ultricies auctor turpis fermentum nec.

Curabitur molestie ipsum erat. Suspendisse vel lectus non sapien sollicitudin vehicula vel quis risus. Vivamus vel nunc sagittis, lacinia nibh ac, scelerisque massa. Sed tortor enim, porta ac magna eu, venenatis tincidunt magna. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Etiam nisi odio, sodales at leo eget, malesuada molestie risus. Cras tempus risus in nisl venenatis, et pharetra justo vulputate. Nulla porttitor vel urna et sagittis. Nam viverra sed diam vel elementum. Duis at neque eu quam tincidunt condimentum. Curabitur luctus ligula a fringilla eleifend. Morbi metus magna, posuere eu lacus quis, vulputate posuere justo. Mauris luctus lectus at metus gravida, quis lacinia ipsum facilisis. Cras suscipit, nibh eu volutpat venenatis, odio lectus hendrerit augue, pulvinar facilisis purus leo nec justo. Pellentesque aliquam lorem leo, a gravida arcu fringilla quis. Ut purus ante, semper a ipsum vel, tincidunt sagittis purus.
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
