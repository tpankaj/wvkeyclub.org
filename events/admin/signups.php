<?php
   $m = new MongoClient("mongodb://localhost");
   $db = $m->wvkeyclub;

   $event_id = new MongoId($_GET["id"]);
   $event = $db->events->findOne(array("_id" => $event_id));
   ?>

<!DOCTYPE html>

<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
  <head>
    <title>Signups - Westview Key Club</title>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/header.php"); ?>
  </head>

  <body>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/navbar.php"); ?>

    <header class="hide-for-small">
      <div class="row">
	<div class="small-12 columns">
	  <h1>Events Admin Panel</h1>
	  <h2>Signups for <?php echo $event["name"]; ?></h2>
	</div>
      </div>
    </header>

    <div id="mainContent">

      <div class="row">
	<div class="twelve columns">
	  <?php
	     $email_list = "";
	     if (isset($event["email_list"]))
	     {
	         for ($i = 0; $i < count($event["email_list"]); $i++)
		 {
		     $email_list .= $event["email_list"][$i];
		     if ($i != count($event["email_list"]) - 1)
		         $email_list .= ",";
		 }
	     }
	     ?>
	     <input type="text" value="<?php echo $email_list; ?>" readonly>
	</div>
      </div>
      
    </div>

    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/footer.php"); ?>
  </body>

</html>
