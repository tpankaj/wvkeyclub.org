<!DOCTYPE html>

<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
  <head>
    <title>Certificate Maker -  Westview Key Club</title>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/header.php"); ?>
  </head>

  <body>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/navbar.php"); ?>

    <header class="hide-for-small">
      <div class="row">
	<div class="small-12 columns">
	  <h1>Hours Admin Panel</h1>
	  <h2>Certificate Maker</h2>
	</div>
      </div>
    </header>

    <div id="mainContent">
      <div class="row">
	<div class="small-12 columns">
	  <?php
             require_once($_SERVER["DOCUMENT_ROOT"] . "/lib/hours.php");
             $m = new MongoClient("mongodb://localhost");
             $db = $m->wvkeyclub_2013_2014;
               
	     if (!empty($_GET["id"))
	     {
	        $member_id = new MongoId($_GET["id"]);
	        $member = $db->members->findOne(array("_id" => $member_id));
             }
           ?>

          Name: <?php echo $member["fname"]; ?>  <?php echo $member["lname"]; ?><br />
	  Total Hours: <?php echo sum_hours($members["hours"]); ?><br />
	  <?php
	     foreach ($member["hours"] as $event_hours)
             {
	        $event_id = new MongoId($event_hours["event_id"]);
	        $event = $db->events->findOne(array("_id" => $event_id));
           	$time = new DateTime();
                $starttime->setTimestamp(intval($event["time"]["start"]));
	        echo $event["name"] . " " . $starttime->format(DateTime::W3C) . " " . $event_hours["hours"] . "<br />";
	     }
	     ?>
	</div>
      </div>
    </div>

    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/footer.php"); ?>
  </body>

</html>
