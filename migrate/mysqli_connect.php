<?php
  // Create a connettion to the logindb database.
   // Set the encoding and the access deatils as constants:

  Define("DB_HOST", 'localhost');
  Define("DB_USER", 'trevithick');
  Define("DB_PASSWORD", 'l0c0m0t1v3');
  Define("DB_NAME", 'migrate');

// For hosted database
// localhost
// admintable
// webmaster
// B6DU>Z+R^8_GrK/T
  $dbcon = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  mysqli_set_charset($dbcon, 'utf8');

?>
