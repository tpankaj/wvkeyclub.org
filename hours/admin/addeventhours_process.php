<?php
   $m = new MongoClient("mongodb://localhost");
   $db = $m->wvkeyclub;

   for ($int i = 1; $i <= $_POST["attendee-count"]; $i++)
   {
	db->members->update({ fname : $_POST["member-fname-" . $i], lname : $_POST["member-lname-" . $i] }, { $push : { hours : { event_id : $_POST["event-id"], hours : $_POST["member-hours-" . $i] } } });
   }

   header("Location: http://" . $_SERVER["SERVER_NAME"] . "/hours/admin/index.php?message=addeventhours_success");
   ?>