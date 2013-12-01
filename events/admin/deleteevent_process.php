<?php
   $m = new MongoClient("mongodb://localhost");
   $db = $m->wvkeyclub;

   $event_id = new MongoId($_GET["id"]);

   $db->events->remove(array("_id" => $event_id));

   header("Location: http://" . $_SERVER["SERVER_NAME"] . "/events/admin/eventlist.php?message=deleteevent_success");
   ?>
