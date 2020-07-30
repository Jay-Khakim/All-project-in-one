<?php
// Easy method to connect
// db = Data Base

// $dbServername = "localhost";
// $dbUsername = "root";
// $dbPassword = "";
// $dbName = 'loginsystem';
//
// $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

// another method
define('DB_SEEVERNAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'ragister');

try{

  // Connection variable
  $con = new mysqli(DB_SEEVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

  // encoded language
  mysqli_set_charset($con, 'utf8');
}catch(Exception $ex){
  print"An Exception occured. Message: ".$ex->getMessage();

}catch(Error $e){
  print"The system is busy now. Please try later!";
}
