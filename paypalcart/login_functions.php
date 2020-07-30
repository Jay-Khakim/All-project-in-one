<?php 
// Create a function to check user name and password 
function validate( $dbcon, $email = '', $passcode = '')
{
  // Initiate the array to hold the error messages 
  $errors = array() ; 
  // Has the user name been entered?
  if ( !empty( $email ) ) 
  {  $user_name = trim( $email); 
  }
  if ( empty( $email ) ) 
  { $errors[] = 'You forgot to enter your email' ; 
  } 
   
  // Has the password been entered
  if ( !empty( $passcode ) ) 
  {  
  $passcode = trim( $passcode ); 
  }
  if ( empty( $passcode ) ) 
  { $errors[] = 'You forgot to enter your password.' ; 
  } 
  
  // If everything is OK select the member_id and the user name from the members' table
  if ( empty( $errors ) ) 
  {
	  
	  try {
 $query = "SELECT user_id, password, user_level FROM users WHERE email=?" ;  
 
      $q = mysqli_stmt_init($dbcon);
      mysqli_stmt_prepare($q, $query);

        // bind $id to SQL Statement
	  mysqli_stmt_bind_param($q, "s", $email); 

       // execute query
	   
       mysqli_stmt_execute($q);

$result = mysqli_stmt_get_result($q);

$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

if ((mysqli_num_rows($result) == 1) && 
(password_verify($passcode, $row['password']))) {

      return array( true, $row ) ; 
    }
    // If the user name and password do not match the database record, create an error message
    else { $errors[] = 'The user name and password do not match our records.' ; 
    }
	  }
catch(Exception $e)
{
	print "The system is busy, please try later";
	$error_string = date('mdYhis') . " | Login | " . $e-getMessage() . "\n";
	error_log($error_string,3,"/logs/exception_log.log"); 
	//error_log("Exception in Login Program. Check log for details", 1, "noone@nowhere.com", 
	//	"Subject: Login Exception" . "\r\n");
	// You can turn off display of errors in php.ini display_errors = Off
    //print "An Exception occurred. Message: " . $e->getMessage();
}catch(Error $e)
{
	print "The system is busy, please come back later";
	$error_string = date('mdYhis') . " | Login | " . $e-getMessage() . "\n";
	error_log($error_string,3,"/logs/error_log.log"); 
	//error_log("Error in Login Program. Check log for details", 1, "noone@nowhere.com", 
	//	"Subject: Login Error" . "\r\n");
	// You can turn off display of errors in php.ini display_errors = Off
    //print "An Error occurred. Message: " . $e->getMessage();
} 
  }
  // Retrieve the error messages
  return array( false, $errors ) ; 
}