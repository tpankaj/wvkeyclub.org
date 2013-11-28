<?php
   $m = new MongoClient("mongodb://localhost");
   $db = $m->wvkeyclub;

   $member = array(
      "fname" => $_POST["fname"],
      "lname" => $_POST["lname"],
      "email" => $_POST["email"],
      "category" => $_POST["category"]      
   );

   $db->members>insert($member);

   header("Location: http://" . $_SERVER["SERVER_NAME"] . "/hours/admin/index.php?message=addmember_success");
   ?>
