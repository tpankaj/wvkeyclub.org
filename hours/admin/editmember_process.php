<?php
   $m = new MongoClient("mongodb://localhost");
   $db = $m->wvkeyclub;

   $member_id = new MongoId($_POST["member-id"]);

   $member = array(
      "fname" => $_POST["fname"],
      "lname" => $_POST["lname"],
      "email" => $_POST["email"],
      "graduation_year" => $_POST["graduation_year"],
      "position" => $_POST["position"],
      "registered" => filter_var($_POST["registered"], FILTER_VALIDATE_BOOLEAN)
   );

   $db->members->update(array("_id" => $member_id), array('$set' =>$member));

   header("Location: http://" . $_SERVER["SERVER_NAME"] . "/hours/admin/memberslist.php?message=editmember_success");
   ?>
