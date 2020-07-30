<?php
  // Create a connettion to the logindb database.
   // Set the encoding and the access deatils as constants:
   // User: webmaster
   // Password: C0ffeep0t
   // Host: localhost
  Define("DB_HOST", 'localhost');
  Define("DB_USER", 'webmaster');
  Define("DB_PASSWORD", 'C0ffeep0t');
  Define("DB_NAME", 'admintable');

// For hosted database
// localhost
// admintable
// webmaster
// B6DU>Z+R^8_GrK/T
  $dbcon = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  mysqli_set_charset($dbcon, 'utf8');

?>
