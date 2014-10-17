<!DOCTYPE html>

<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
  <head>
    <title>Members List -  Westview Key Club</title>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/header.php"); ?>
    <link rel="stylesheet" href="/css/tablesorter.css">
  </head>

  <body>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/navbar.php"); ?>

    <header class="hide-for-small">
      <div class="row">
	<div class="small-12 columns">
	  <h1>Hours Admin Panel</h1>
	  <h2>Members List</h2>
	</div>
      </div>
    </header>

    <div id="mainContent">

      <?php
	 if (isset($_GET["message"]))
	 {
	    if ($_GET["message"] == "editmember_success")
	    {
	 ?>
      <div class="row">
	<div class="small-12 columns">
	  <div data-alert class="alert-box success radius">
	    Member successfully edited!
	    <a href="#" class="close">&times;</a>
	  </div>
	</div>
      </div>
      <?php
	    }
	 }
	 ?>

      <div class="row">
	<div class="small-12 columns">
	  <table id="memberslist" class="tablesorter" style="margin-left:auto; margin-right:auto;">
	    <thead>
	      <tr>
		<th class="header">First Name</th>
		<th class="header">Last Name</th>
		<th class="header">Email Address</th>
		<th class="header">Graduation Year</th>
		<th class="header">Position</th>
		<th class="header">Registered?</th>
		<th class="header">Actions</th>
	    </thead>
	    <tbody>
	      <?php
		 $m = new MongoClient("mongodb://localhost");
		 $db = $m->wvkeyclub;

	         $results = $db->members->find();

                 foreach ($results as $member)
                 {
		 ?>
	      <tr>
		<td><?php echo $member["fname"]; ?></td>
		<td><?php echo $member["lname"]; ?></td>
		<td><a href="mailto:<?php echo $member["email"]; ?>"><?php echo $member["email"]; ?></a></td>
		<td><?php echo $member["graduation_year"]; ?></td>
		<td>
		  <?php
		     if ($member["position"] == "member")
		        echo "Member";
		     else if ($member["position"] == "executive-board")
		        echo "Executive Board";
		     else if ($member["position"] == "appointed-board")
		        echo "Appointed Board";
		     else
		        echo $member["position"];
		     ?>
		</td>
		<td>
		  <?php
		     if ($member["registered"])
		        echo "Yes";
		     else
		        echo "No";
		     ?>
		</td>
		<td><a href="/hours/admin/editmember.php?id=<?php echo $member["_id"]; ?>">Edit</a> <a href="#" data-reveal-id="delete-modal" data-reveal-ajax="http://<?php echo $_SERVER["SERVER_NAME"]; ?>/hours/admin/deletemember_confirm.php?id=<?php echo $member["_id"]; ?>&fname=<?php echo urlencode($member["fname"]); ?>&lname=<?php echo urlencode($member["lname"]); ?>">Delete</a></td>
	      </tr>
	      <?php
		 }
		 ?>
	    </tbody>
	  </table>
	</div>
      </div>
      
    </div>

    <div id="delete-modal" class="reveal-modal" data-reveal>
      <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/hours/admin/deletemember_confirm.php"); ?>
    </div>

    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/footer.php"); ?>
    <script src="/js/jquery.tablesorter.min.js"></script>
    <script>
      $(document).ready(function()
         {
            $("#memberslist").tablesorter({sortList: [[3,0],[1,0]]});
         }
      );
    </script>
  </body>

</html>
