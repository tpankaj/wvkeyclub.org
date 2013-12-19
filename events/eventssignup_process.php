<?php
   $m = new MongoClient("mongodb://localhost");
   $db = $m->wvkeyclub;

   $event_id = new MongoId($_GET["id"]);

   $db->events->update(array("_id" => $event_id), array('$push' => array("email_list" => $_GET["email"])));

   header("Location: http://" . $_SERVER["SERVER_NAME"] . "/events/eventssignup.php?message=eventsignup_success&email=" . urlencode($_GET["email"]));
   ?>
