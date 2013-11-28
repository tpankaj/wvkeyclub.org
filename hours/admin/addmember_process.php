<?php
   $m = new MongoClient("mongodb://localhost");
   $db = $m->wvkeyclub;

   $member = array(
      "fname" => $_POST["fname"],
      "lname" => $_POST["lname"],
      "email" => $_POST["email"],
      "category" => $_POST["category"],
      "registered" => filter_var($_POST["registered"], FILTER_VALIDATE_BOOLEAN)
   );

   $db->members->insert($member);

   header("Location: http://" . $_SERVER["SERVER_NAME"] . "/hours/admin/index.php?message=addmember_success");
   ?>
