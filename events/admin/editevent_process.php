<?php
   $m = new MongoClient("mongodb://localhost");
   $db = $m->wvkeyclub;

   $event_id = new MongoId($_POST["event-id"]);
   $starttime = new DateTime($_POST["start-time"]);
   $endtime = new DateTime($_POST["end-time"]);

   $event = array(
      "name" => $_POST["name"],
      "time" => array("start" => $starttime->getTimestamp(), "end" => $endtime->getTimestamp()),
      "location" => $_POST["location"],
      "description" => $_POST["description"]
   );

   $db->events->update(array("_id" => $event_id), array('$set' => $event));

   header("Location: http://" . $_SERVER["SERVER_NAME"] . "/events/admin/eventslist.php?message=editevent_success");
   ?>
