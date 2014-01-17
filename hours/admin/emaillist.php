<?php
   $m = new MongoClient("mongodb://localhost");
   $db = $m->wvkeyclub;

   $email_lists = array(array());
  
   $events = $db->events->find();

   $event_count = 0;
   foreach ($events as $event)
   {
      if (isset($event["email_list"]))
      {
          $email_lists[$event_count] = $event["email_list"];
      }
      $event_count++;
   }

   $members = $db->members->find();
   $registered_emails = array();
   foreach ($members as $member)
   {
      if (isset($member["email"] && $member["email"] != "")
         $registered_emails[] = $member["email"];
   }

   $email_list = array();
   for ($i = 0; $i < $event_count; $i++)
      $email_list = array_merge($email_list, $email_lists[$i]);
   $email_list = array_merge($email_list, $registered_emails);
   $email_list = array_unique($email_list);
   ?>

<!DOCTYPE html>

<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
  <head>
    <title>Email List - Westview Key Club</title>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/header.php"); ?>
  </head>

  <body>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/navbar.php"); ?>

    <header class="hide-for-small">
      <div class="row">
	<div class="small-12 columns">
	  <h1>Hours Admin Panel</h1>
	  <h2>Email List</h2>
	</div>
      </div>
    </header>

    <div id="mainContent">

      <div class="row">
	<div class="twelve columns">
	  <?php
	     $email_list_str = "";
	     for ($i = 0; $i < count($email_list); $i++)
		 {
		     $email_list_str .= $email_list[$i];
		     if ($i != count($email_list) - 1)
		         $email_list_str .= ",";
		 }
	     }
	     ?>
	     <input type="text" value="<?php echo $email_list_str; ?>" readonly>
	</div>
      </div>
      
    </div>

    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/footer.php"); ?>
  </body>

</html>
