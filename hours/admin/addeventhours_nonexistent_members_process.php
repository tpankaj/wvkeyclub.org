<?php
   $m = new MongoClient("mongodb://localhost");
   $db = $m->wvkeyclub;

   $eventid = new MongoId($_POST["event-id"]);

   for ($i = 0; $i <= $_POST["count"]; $i++)
   {
        if ($_POST["member-fname-" . $i] == "" || $_POST["member-hours-" . $i] == "" || $_POST["member-hours-" . $i] == "" || $_POST["member-hours-" . $i] == "0")
	   continue;
        if (!filter_var($_POST["member-create-" . $i], FILTER_VALIDATE_BOOLEAN))
           continue;
        $member = array(
           "fname" => $_POST["member-fname-" . $i],
           "lname" => $_POST["member-lname-" . $i],
           "email" => "",
           "graduation_year" => "",
           "position" => "member",
           "registered" => false
        );
        $db->members->insert($member);
	$db->members->update(array("fname" => $_POST["member-fname-" . $i], "lname" => $_POST["member-lname-" . $i]), array('$push' => array("hours" => array("event_id" => $_POST["event-id"], "hours" => $_POST["member-hours-" . $i]))));
   }
  header("Location: http://" . $_SERVER["SERVER_NAME"] . "/hours/admin/index.php?message=addeventhours_success");
  ?>
