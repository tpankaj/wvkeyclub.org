<h2>Delete Member</h2>
<p>Are you sure you want to delete <?php echo $_GET["fname"] . " " . $_GET["lname"]; ?>?</p>
<p><a href="/hours/admin/deletemember_process.php?id=<?php echo $_GET["id"]; ?>" class="button radius">Yes</a> <a href="javascript:$('#delete-modal').foundation('reveal', 'close')" class="button radius">No</a></p>
<a class="close-reveal-modal">&#215;</a>
