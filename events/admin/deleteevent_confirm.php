<h2>Delete Event</h2>
<p>Are you sure you want to delete <?php echo $_GET["name"]; ?>?</p>
<p><a href="/events/admin/deleteevent_process.php?id=<?php echo $_GET["id"]; ?>" class="button radius">Yes</a> <a href="$('#delete-modal').foundation('reveal', 'close')" class="button radius">No</a></p>
<a class="close-reveal-modal">&#215;</a>
