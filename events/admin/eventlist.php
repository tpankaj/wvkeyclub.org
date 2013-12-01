<!DOCTYPE html>

<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
  <head>
    <title>Event List -  Westview Key Club</title>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/header.php"); ?>
    <link rel="stylesheet" href="/css/tablesorter.css">
  </head>

  <body>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/navbar.php"); ?>

    <header class="hide-for-small">
      <div class="row">
	<div class="small-12 columns">
	  <h1>Events Admin Panel</h1>
	  <h2>Event List</h2>
	</div>
      </div>
    </header>

    <div id="mainContent">

      <?php
	 if (isset($_GET["message"]))
	 {
	    if ($_GET["message"] == "editevent_success")
	    {
	 ?>
      <div class="row">
	<div class="small-12 columns">
	  <div data-alert class="alert-box success radius">
	    Event successfully edited!
	    <a href="#" class="close">&times;</a>
	  </div>
	</div>
      </div>
      <?php
	    }
	 }
	 ?>

      <div class="row">
	<div class="small-12 columns">
	  <table id="memberlist" class="tablesorter" style="margin-left:auto; margin-right:auto;">
	    <thead>
	      <tr>
		<th class="header">Name</th>
		<th class="header">Start Time</th>
		<th class="header">End Time</th>
		<th class="header">Chair</th>
		<th class="header">Actions</th>
	    </thead>
	    <tbody>
	      <?php
		 $m = new MongoClient("mongodb://localhost");
		 $db = $m->wvkeyclub;

	         $results = $db->events->find();

                 foreach ($results as $event)
                 {
		 ?>
	      <tr>
		<td><?php echo $event["name"]; ?></td>
		<td>
		  <?php
		     $starttime = new DateTime();
		     $starttime->setTimestamp(intval($event["time"]["start"]));
		     echo $starttime->format(DateTime::RFC1123);
		     ?>
		</td>
		<td>
		  <?php
		     $endtime = new DateTime();
		     $endtime->setTimestamp(intval($event["time"]["end"]));
		     echo $endtime->format(DateTime::RFC1123);
		     ?>
		</td>
		<td>
		  <?php
		     if (isset($event["chair_id"]))
		     {
		         $chair_id = new MongoId($event["chair_id"]);
		         $chair = $db->members->findOne(array("_id" => $chair_id));
		  ?>
		  <a href="mailto:<?php echo $chair["email"]; ?>"><?php echo $chair["fname"] . " " . $chair["lname"]; ?></a>
		  <?php
		     }
		     else
		     {
		        echo "None";
		     }
		     ?>
		</td>
		<td><a href="/events/admin/editevent.php?id=<?php echo $event["_id"]; ?>">Edit</a> <a href="#" data-reveal-ajax="http://<?php echo $_SERVER["SERVER_NAME"]; ?>/events/admin/deleteevent_confirm.php?id=<?php echo $event["_id"]; ?>">Delete</a></td>
	      </tr>
	      <?php
		 }
		 ?>
	    </tbody>
	  </table>
	</div>
      </div>
      
    </div>

    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/footer.php"); ?>
    <script src="/js/jquery.tablesorter.min.js"></script>
    <script>
      $(document).ready(function()
         {
            $("#memberlist").tablesorter({sortList: [[1,1]]});
         }
      );
    </script>
  </body>

</html>
