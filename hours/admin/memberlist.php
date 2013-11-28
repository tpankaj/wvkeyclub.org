<!DOCTYPE html>

<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
  <head>
    <title>Member List -  Westview Key Club</title>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/header.php"); ?>
    <link rel="stylesheet" href="/css/tablesorter.css">
  </head>

  <body>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/navbar.php"); ?>

    <header class="hide-for-small">
      <div class="row">
	<div class="twelve columns">
	  <h1>Hours Admin Panel</h1>
	  <h2>Member List</h2>
	</div>
      </div>
    </header>

    <div id="mainContent">

      <div class="row">
	<div class="large-12 columns">
	  <table id="memberlist" class="tablesorter">
	    <thead>
	      <tr>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Email Address</th>
		<th>Graduation Year</th>
		<th>Position</th>
		<th>Registered?</th>
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
	      </tr>
	      <?php
		 }
		 ?>
	    </tbody>
	  </table>
	</div>
      </div>
      
    </div>

    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/common/footer.php"); ?>
    <script src="/js/jquery.tablesorter.min.js"></script>
    <script>
      $(document).ready(function()
         {
            $("#memberlist").tablesorter();
         }
      );
    </script>
  </body>

</html>
