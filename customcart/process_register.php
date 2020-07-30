<?php
// Has the form been submitted?
try {
require ('mysqli_connect.php'); // Connect to the database
$errors = array(); // Initialize an error array.
// --------------------check the entries-------------
//Is the title present? If it is, trim it
    $title = filter_var( $_POST['title'], FILTER_SANITIZE_STRING);
	if ((!empty($title)) && (preg_match('/[a-z\.\s]/i',$title)) &&
		(strlen($title) <= 12)) {
	//Sanitize the trimmed title
	$titletrim = $title;
	}else{
	$titletrim = NULL; // Title is optional
	}
// Trim the first name
   $first_name = filter_var( $_POST['first_name'], FILTER_SANITIZE_STRING);
if ((!empty($first_name)) && (preg_match('/[a-z\s]/i',$first_name)) &&
		(strlen($first_name) <= 30)) {
	//Sanitize the trimmed first name
    $first_nametrim = $first_name;
	}else{
	$errors[] = 'First name missing or not alphabetic and space characters. Max 30';
	}
	//Is the last name present? If it is, trim it and sanitize it
	$last_name = filter_var( $_POST['last_name'], FILTER_SANITIZE_STRING);
if ((!empty($last_name)) && (preg_match('/[a-z\-\s\']/i',$last_name)) &&
		(strlen($last_name) <= 40)) {
	//Sanitize the trimmed last name
    $last_nametrim = $last_name;
	}else{
	$errors[] = 'Last name missing or not alphabetic, dash, quote or space. Max 30.';
	}
// Set the email alias as false and check for an email address:
//$e = FALSE;	                                                                #1
// Check that an email address has been entered
  $emailtrim = filter_var( $_POST['email'], FILTER_SANITIZE_EMAIL);
	if  ((empty($emailtrim)) || (!filter_var($emailtrim, FILTER_VALIDATE_EMAIL))
			|| (strlen($emailtrim > 60))) {
		$errors[] = 'You forgot to enter your email address';
		$errors[] = ' or the e-mail format is incorrect.';
	}
// Check for a password and match against the confirmed password:
$password1trim = filter_var( $_POST['password1'], FILTER_SANITIZE_STRING);
if ((empty($password1trim)) || ($password1trim < 4)){   //                                             #7
$errors[] ='Please enter a valid password';
}
else {
if(!preg_match( '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$@!%&*?])[A-Za-z\d#$@!%&*?]$/',
$password1trim)) {  //                        #8
$errors[] = 'Invalid password,8 to 12 chars, one upper, one lower, one number, one special.';
} else
{
$password2trim = filter_var( $_POST['password2'], FILTER_SANITIZE_STRING);
if($password1trim === $password2trim) { //                                 #9
$password = $password1trim;
}else{
$errors[] = 'Your two password do not match.';
$errors[] = 'Please try again';
}
}
}
//Is the 1st address present? If it is, trim it and sanitize it
$address1 = filter_var( $_POST['address1'], FILTER_SANITIZE_STRING);
if ((!empty($address1)) && (preg_match('/[a-z\.\s\,\-]/i', $address1)) &&
  (strlen($address1) <= 30)) {
	//Sanitize the trimmed 1st address
    $address1trim = $address1;
	}else{
	$errors[] = 'Missing address. Only alphabetic, period, comma, dash and space. Max 30.';
	}
//If the 2nd address is present? If it is, trim it and sanitize it          #10
$address2 = filter_var( $_POST['address2'], FILTER_SANITIZE_STRING);
if ((!empty($address2)) && (preg_match('/[a-z\.\s\,\-]/i', $address2)) &&
  (strlen($address2) <= 30)) {
	//Sanitize the trimmed 2nd address
	$address2trim = $address2;
	}else{
	$address2trim = NULL;
	}
//Is the city present? If it is, trim it and sanitize it
$city = filter_var( $_POST['city'], FILTER_SANITIZE_STRING);
if ((!empty($city)) && (preg_match('/[a-z\.\s]/i', $city)) &&
  (strlen($city) <= 30)) {
	//Sanitize the trimmed city
	$citytrim = $city;
	}else{
	$errors[] = 'Missing city. Only alphabetic, period and space. Max 30.';
	}
//Is the state or country present? If it is, trim it and sanitize it
$state_country = filter_var( $_POST['state_country'], FILTER_SANITIZE_STRING);
if ((!empty($state_country)) && (preg_match('/[a-z\.\s]/i', $state_country)) &&
    (strlen($state_country) <= 30))	 {
	//Sanitize the trimmed state or country
    $state_citytrim = $state_country;
	}else{
	$errors[] = 'Missing state/country. Only alphabetic, period and space. Max 30.';
	}
//Is the zip code or post code present? If it is, trim it and sanitize it
$zcode_pcode = filter_var( $_POST['zcode_pcode'], FILTER_SANITIZE_STRING);
if ((!empty($zcode_pcode)) && (preg_match('/[a-z0-9\s]/i', $zcode_pcode)) &&
    (strlen($zcode_pcode) <= 30) && (strlen($zcode_pcode >= 5))) {
	//Sanitize the trimmed zcode_pcode
    $zcode_pcodetrim = $zcode_pcode;
	}else{
	$errors[] = 'Missing zip code or post code. Alphabetic, numeric, space only max 30 characters';
	}
//Is the secret present? If it is, trim it and sanitize it
$secret = filter_var( $_POST['secret'], FILTER_SANITIZE_STRING);
if ((!empty($secret)) && (preg_match('/[a-z\.\s\,\-]/i', $secret)) &&
  (strlen($secret) <= 30)) {
	//Sanitize the trimmed city
	$secrettrim = $secret;
	}else{
	$errors[] = 'Missing city. Only alphabetic, period, comma, dash and space. Max 30.';
	}
//Is the phone number present? If it is, trim it and sanitize it
$phone = filter_var( $_POST['phone'], FILTER_SANITIZE_STRING);
if ((!empty($phone)) && (strlen($phone) <= 30)) {
	//Sanitize the trimmed phone number
	$phonetrim = (filter_var($phone, FILTER_SANITIZE_NUMBER_INT));
    $phonetrim = preg_replace('/[^0-9]/', '', $phonetrim);
	}else{
	$phonetrim = NULL;
	}
if (empty($errors)) { // If everything's OK.
// If no problems encountered, register user in the database
//Determine whether the email address has already been registered
$query = "SELECT user_id FROM users WHERE email = ? ";
$q = mysqli_stmt_init($dbcon);
mysqli_stmt_prepare($q, $query);
mysqli_stmt_bind_param($q,'s', $e);
mysqli_stmt_execute($q);
$result = mysqli_stmt_get_result($q);

if (mysqli_num_rows($result) == 0){//The email address has not been registered
//already therefore register the user in the users table
	//-------------Valid Entries - Save to database -----
	//Start of the SUCCESSFUL SECTION. i.e all the required fields were filled out
	$hashed_password = password_hash($password, PASSWORD_DEFAULT);
	// Register the user in the database...
	$query = "INSERT INTO users (user_id, title, first_name, last_name, email, password,";
    $query .= "address1, address2, city, state_country, zcode_pcode, phone, secret, registration_date) ";
    $query .= "VALUES ";
	$query .= "(' ',?,?,?,?,?,?,?,?,?,?,?,?,NOW())";
$q = mysqli_stmt_init($dbcon);
mysqli_stmt_prepare($q, $query);
// use prepared statement to insure that only text is inserted
// bind fields to SQL Statement
mysqli_stmt_bind_param($q, 'ssssssssssss',
	$titletrim, $first_nametrim, $last_nametrim, $emailtrim, $hashed_password, $address1trim, $address2trim,
	$citytrim, $state_countrytrim, $zcode_pcodetrim, $phonetrim, $secrettrim);
// execute query
mysqli_stmt_execute($q);
if (mysqli_stmt_affected_rows($q) == 1) {
	header ("location: register_thanks.php");
	} else {
	echo 'Invalid query:' . $dbcon->error;
// change to generic message in production
	}
	}else{//The email address is already registered
echo '<p class="error">The email address is already registered</p>';
}
	} else {//End of SUCCESSFUL SECTION
// ---------------Process User Errors---------------
// Display the users entry errors
echo '<h2>Error!</h2>
<p class="error">The following error(s) occurred:<br>';
foreach ($errors as $msg) { // Print each error.
echo " - $msg<br>\n";
    }
echo '</p><h3>Please try again.</h3><p><br></p>';
    }// End of if (empty($errors)) IF.
mysqli_close($dbcon);
}
catch(Exception $e)
{
	print "The system is busy, please try later";
	$error_string = date('mdYhis') . " | Registration | " . $e-getMessage() . "\n";
	error_log($error_string,3,"/logs/exception_log.log");
	//error_log("Exception in Register Program. Check log for details", 1, "noone@nowhere.com",
	//	"Subject: Register Exception" . "\r\n");
	// You can turn off display of errors in php.ini display_errors = Off
    //print "An Exception occurred. Message: " . $e->getMessage();
}catch(Error $e)
{
	print "The system is busy, please come back later";
	$error_string = date('mdYhis') . " | Registration | " . $e-getMessage() . "\n";
	error_log($error_string,3,"/logs/error_log.log");
	//error_log("Error in Register Program. Check log for details", 1, "noone@nowhere.com",
	//	"Subject: Register Error" . "\r\n");
	// You can turn off display of errors in php.ini display_errors = Off
    //print "An Error occurred. Message: " . $e->getMessage();
}
?>
