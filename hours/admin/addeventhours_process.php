<?php
   $m = new MongoClient("mongodb://localhost");
   $db = $m->wvkeyclub;

   for ($i = 1; $i <= $_POST["attendee-count"]; $i++)
   {
	$db->members->update(array("fname" => $_POST["member-fname-" . $i], "lname" => $_POST["member-lname-" . $i]), array('$push' => array("hours" => array("event_id" => $_POST["event-id"], "hours" => $_POST["member-hours-" . $i]))));
   }

   header("Location: http://" . $_SERVER["SERVER_NAME"] . "/hours/admin/index.php?message=addeventhours_success");
   ?>
