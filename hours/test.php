<?php
   $m = new MongoClient("mongodb://wvkeyclub:d37sredbulls@localhost");
   $db = $m->wvkeyclub;
   $members_collection = $db->members;
   $events_collection = $db->events;
   var_dump($members_collection->findOne());
   var_dump($events_collection->findOne());
   ?>
