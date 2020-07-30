<?php
  // Create a connettion to the logindb database.
   // Set the encoding and the access deatils as constants:
  Define("DB_HOST", 'localhost');
  Define("DB_USER", 'william');
  Define("DB_PASSWORD", 'Cat0nlap');
  Define("DB_NAME", 'logindb');

  $dbcon = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  mysqli_set_charset($dbcon, 'utf8');

?>
