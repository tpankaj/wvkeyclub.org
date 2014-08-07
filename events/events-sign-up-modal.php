<div id="events-sign-up-modal" class="reveal-modal" data-reveal>
  <h2>Events Sign-Up</h2>
  <form method="post" action="/events/eventssignup.php" data-abide>
    <p>
      <label>Email address <small>required</small></label>
      <input type="email" name="email" required />
      <input type="hidden" name="back_uri" value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
    </p>
    <p>
      <input type="submit" value="Submit" />
    </p>
  </form>
  <a class="close-reveal-modal">&#215;</a>
</div>
