<?php
   $m = new MongoClient("mongodb://localhost");
   $db = $m->wvkeyclub;

   $event_id = new MongoId($_GET["id"]);

   $members = $db->members->find();
   foreach($members as $member)
   {
      $db->members->update(array("_id" => $member["_id"]), array('$pull' => array("hours" => array("event_id" => $_GET["id"]))));
   }

   $db->events->remove(array("_id" => $event_id));

   header("Location: http://" . $_SERVER["SERVER_NAME"] . "/events/admin/eventslist.php?message=deleteevent_success");
   ?>
