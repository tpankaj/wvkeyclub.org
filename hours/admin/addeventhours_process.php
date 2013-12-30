<?php
   $m = new MongoClient("mongodb://localhost");
   $db = $m->wvkeyclub;

   $eventid = new MongoId($_POST["event-id"]);
   $db->events->update(array("_id" => $eventid), array('$set' => array("hours_entered" => true)));

   $nonexistent_members = array();

   for ($i = 1; $i <= $_POST["attendee-count"]; $i++)
   {
	$db->members->update(array("fname" => $_POST["member-fname-" . $i], "lname" => $_POST["member-lname-" . $i]), array('$push' => array("hours" => array("event_id" => $_POST["event-id"], "hours" => $_POST["member-hours-" . $i]))));
        $lastError = $db->lastError();
        if ($lastError["n"] == 0)
           $nonexistent_members[] = array($_POST["member-fname-" . $i], $_POST["member-lname-" . $i], $_POST["member-hours-" . $i]);
   }
   $nonexistent_count = count($nonexistent_members);
   if ($nonexistent_count != 0)
   {
      $get_args = "";
      for ($i = 0; $i < $nonexistent_count; $i++)
      {
         $get_args .= "f" . $i . "=" . $nonexistent_members[$i][0];
         $get_args .= "&l" . $i . "=" . $nonexistent_members[$i][1];
         $get_args .= "&h" . $i . "=" . $nonexistent_members[$i][2] . "&";
      }
      $get_args .= "c=" . $nonexistent_count . "&id=" . $_POST["event-id"];
      header("Location: http://" . $_SERVER["SERVER_NAME"] . "/hours/admin/addeventhours_nonexistent_members.php?" . $get_args);
   }
   else
      echo "No error";
   //header("Location: http://" . $_SERVER["SERVER_NAME"] . "/hours/admin/index.php?message=addeventhours_success");
  ?>
