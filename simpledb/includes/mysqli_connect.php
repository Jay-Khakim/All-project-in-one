<?php
  // This file provides the information for accessing the database.and connecting to MySQL.
  // First, we define the constants:
  DEFINE("DB_USER", "horatio");
  Define("DB_PASSWORD", "ab2414950");
  Define("DB_HOST", "localhost");
  Define("DB_NAME", "simpledb");


  // Next we assign the database connection to a variable that we will call $dbcon:
  try {
    $dbcon = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    // mysqli_connect('localhost', 'my_user', 'my_password', 'my_db');
    mysqli_set_charset($dbcon, 'utf8');
  } catch (Exception $e) // We finally handle any problems here
  {
    // print "An Exception occurred. Message: " . $e->getMessage();
     print "The system is busy please try later";
  } catch (Error $e)
  {
    //print "An Error occurred. Message: " . $e->getMessage();
      print "The system is busy please try again later.";
  }
