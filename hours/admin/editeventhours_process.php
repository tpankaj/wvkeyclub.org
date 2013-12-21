<?php
   $m = new MongoClient("mongodb://localhost");
   $db = $m->wvkeyclub;

   $eventid = new MongoId($_POST["event-id"]);

   $db->members->update(array(), array('$pull' => array("hours" => array("event_id" => $_POST["event-id"]))), array("multiple" => true));
   for ($i = 1; $i <= $_POST["attendee-count"]; $i++)
   {
        if ($_POST["member-fname-" . $i] == "" || $_POST["member-hours-" . $i] == "" || $_POST["member-hours-" . $i] == "" || $_POST["member-hours-" . $i] == "0")
	   continue;
	$db->members->update(array("fname" => $_POST["member-fname-" . $i], "lname" => $_POST["member-lname-" . $i]), array('$push' => array("hours" => array("event_id" => $_POST["event-id"], "hours" => $_POST["member-hours-" . $i]))));
   }

   header("Location: http://" . $_SERVER["SERVER_NAME"] . "/hours/admin/index.php?message=addeventhours_success");
  ?>
