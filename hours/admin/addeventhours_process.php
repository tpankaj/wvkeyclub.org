<?php
   error_log(var_dump($_POST), 3, "/tmp/errors/wvkeyclub_hours.log");

   $m = new MongoClient("mongodb://localhost");
   $db = $m->wvkeyclub;

   $eventid = new MongoId($_POST["event-id"]);
   $db->events->update(array("_id" => $eventid), array('$set' => array("hours_entered" => true)));

   for ($i = 1; $i <= $_POST["attendee-count"]; $i++)
   {
	$db->members->update(array("fname" => $_POST["member-fname-" . $i], "lname" => $_POST["member-lname-" . $i]), array('$push' => array("hours" => array("event_id" => $_POST["event-id"], "hours" => $_POST["member-hours-" . $i]))));
   }

   header("Location: http://" . $_SERVER["SERVER_NAME"] . "/hours/admin/index.php?message=addeventhours_success");
  ?>
