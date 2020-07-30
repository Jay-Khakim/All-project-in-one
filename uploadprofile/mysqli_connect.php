<?php
  // Create a connettion to the logindb database.
   // Set the encoding and the access deatils as constants:
   // username: mentor
   // password: tI70RjquDIhydFfP
  Define("DB_HOST", 'localhost');
  Define("DB_USER", 'mentor');
  Define("DB_PASSWORD", 'tI70RjquDIhydFfP');
  Define("DB_NAME", 'imgupload');

  $dbcon = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  // mysqli_set_charset($dbcon, 'utf8');

?>
