<?php
  // Create a connettion to the logindb database.
   // Set the encoding and the access deatils as constants:

  Define("DB_HOST", 'localhost');
  Define("DB_USER", 'turing');
  Define("DB_PASSWORD", 'En1gm3');
  Define("DB_NAME", 'customdb');
  $dbcon = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  mysqli_set_charset($dbcon, 'utf8');

?>
