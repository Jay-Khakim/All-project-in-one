<?php

require ("helper.php");

// Error variable
$error  = array();
// Securing SQL injection!
$firstName = validate_input_text($_POST['firstName']);
if (empty($firstName)) {
  $error[] ="You forgot to enter your First Name!" ;
}

$lastName = validate_input_text($_POST['secondName']);
if (empty($lastName)) {
  $error[] ="You forgot to enter your Last Name!" ;
}

$email = validate_input_text($_POST['email']);
if (empty($email)) {
  $error[] ="You forgot to enter your Email!" ;
}

$password = validate_input_text($_POST['password']);
if (empty($password)) {
  $error[] ="You forgot to enter your Password!" ;
}

$confirm_password = validate_input_text($_POST['cofirm_pwd']);
if (empty($confirm_password)) {
  $error[] ="You forgot to enter your Confirm Password!" ;
}

$profileImage = 'image';

if(empty($error)){
  // Register new user!
  $hashed_pass = password_hash($password, PASSWORD_DEFAULT);
  include 'mysqli_connect.php';

  // make a query
  // $query = "INSERT INTO Users (id, firstName, lastName, email, pwd, profileImage, registerDate )";
  // $query .= "VALUES(' ', ?, ?, ?, ?, ?, NOW())";

  // $query = "INSERT INTO Users (id, firstName, secondName, email, pwd, profileImage, registerDate) VALUES ('', '$firstName', '$lastName', '$email', '$hashed_pass', '$profileImage', NOW())";

  // $query = "INSERT INTO Users (id, firstName, secondName, email, pwd, profileImage, registerDate) VALUES('', ?,?,?,?,?, NOW())";
  // initialize a statement
  // mysqli_query($con, $query);
  //
  // header('Location: index.php?signup=success');

  $query = "INSERT INTO users (userId, firstName, lastName, email, password, profileImage, registerDate) VALUES('', ?,?,?,?,?, NOW())";
  // $stmt = mysqli_stmt_init($con);
  // if (!mysqli_stmt_prepare($stmt, $query)){
  //   echo "Sql ERROR!";
  // }else {
  //   mysqli_stmt_bind_param($stmt, 'sssss', $firstName, $lastName, $email, $hashed_pass, $profileImage );
  //   mysqli_stmt_execute($stmt);
  //   echo "Success!";
  // }


  //from below code is not working!!!

  $q = mysqli_stmt_init($con);

  // prepare sql statement
  mysqli_stmt_prepare($q, $query);

  // bind VALUES
  mysqli_stmt_bind_param($q, 'sssss', $firstName, $lastName, $email, $hashed_pass, $profileImage );

  // execute statement
  mysqli_stmt_execute($q);

  // TIll HERE


  print "rows".mysqli_stmt_affected_rows($q);

  if(mysqli_stmt_affected_rows($q) >0 ){
    print"Record successfully inserted...!";

  }else {
    print"Error while registration...!";
  }

}else {
  echo "Not validate";
}
