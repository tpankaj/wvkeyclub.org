<?php
   $m = new MongoClient("mongodb://localhost");
   $db = $m->wvkeyclub;

   $starttime = new DateTime($_POST["start-time"]);
   $endtime = new DateTime($_POST["end-time"]);

   $event = array(
      "name" => $_POST["name"],
      "time" => array("start" => $starttime, "end" => $endtime),
      "location" => $_POST["location"],
      "description" => $_POST["description"]
   );

   $db->events->insert($event);

   header("Location: http://" . $_SERVER["SERVER_NAME"] . "/hours/admin/index.php?message=addevent_success");
   ?>
