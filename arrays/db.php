<?php

  $dbServer = 'localhost';
  $dbUserName = 'root';
  $dbPassword = '';
  $dbName = 'arrays';

  $conn = mysqli_connect($dbServer, $dbUserName, $dbPassword, $dbName);

  if (!$conn){
    die("Connection failed: ".mysqli_connect_error());
  }
