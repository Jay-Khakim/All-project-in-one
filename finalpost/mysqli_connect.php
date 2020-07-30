<?php
  // Create a connettion to the logindb database.
   // Set the encoding and the access deatils as constants:

  Define("DB_HOST", 'localhost');
  Define("DB_USER", 'cabbage');
  Define("DB_PASSWORD", 'in4aPin4aL');
  Define("DB_NAME", 'finalpost');

// For hosted database
// localhost
// admintable
// webmaster
// B6DU>Z+R^8_GrK/T
  $dbcon = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  mysqli_set_charset($dbcon, 'utf8');

?>
