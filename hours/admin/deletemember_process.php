<?php
   $m = new MongoClient("mongodb://localhost");
   $db = $m->wvkeyclub;

   $member_id = new MongoId($_GET["id"]);

   $db->members->remove(array("_id" => $member_id));

   header("Location: http://" . $_SERVER["SERVER_NAME"] . "/hours/admin/memberslist.php?message=deletemember_success");
   ?>
