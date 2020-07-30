<?php
// This script is a query that INSERTs a record in the users table.
// Check that form has been submitted:
// Has the form been submitted
try {
	require('mysqli_connect.php'); //Connect to the database
	$errors = array(); // Initialize an error array.
	// ---------------check the entries -------------
	$title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
	if ((!empty($title)) && (preg_match('/[a-z\.\s]/i',$title)) && (strlen($title)<=12)) {
		// Sanitize the trimmed title
		$titletrim = $title;
	}else {
		$titletrim = NULL; //TITLE is optional
	}

	// Check for a first name:
	// Tirm the first name
  $first_name = filter_var( $_POST['first_name'], FILTER_SANITIZE_STRING);
	if ((!empty($first_name)) && (preg_match('/[a-z\s]/i',$first_name)) && strlen($first_name)<=30) {
		// sanitize trimmrd first name
		$first_nametrim = $first_name;
	}else {
		$errors[] = 'First name missing or not alphabetic and space characters. Max 30';

	}
	// Check for a last name:
	    $last_name = filter_var( $_POST['last_name'], FILTER_SANITIZE_STRING);
	if ((!empty($last_name)) && (preg_match('/[a-z\-\s\']/i',$last_name)) && (strlen($last_name) <=40)) {
		// Sanitize the trimmed last name
		$last_nametrim  = $last_name;
	}else {
		$errors[] = 'Last name missing or not alphabetic, dash, quote or space. Max 30.';
	}
	// Check for an email address:
	$emailtrim = filter_var( $_POST['email'], FILTER_SANITIZE_EMAIL);
	if  ((empty($emailtrim)) || (!filter_var($emailtrim, FILTER_VALIDATE_EMAIL)) || (strlen($emailtrim > 60))) {
		$errors[] = 'You forgot to enter your email address';
		$errors[] = ' or the e-mail format is incorrect.';
	}
	// Check for a password and match against the confirmed password:
			$password1trim = filter_var( $_POST['password1'], FILTER_SANITIZE_STRING);
			$string_length = strlen($password1trim);
	if (empty($password1trim)) {
		$errors[] = "Please enter a valid password";
	} else {
		if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$@!%&*?])[A-Za-z\d#$@!%&*?]{8,12}$/', $password1trim)) {
			$errors[] ='Invalid password, 8 to 12 chars, 1 upper, 1 lower, 1 number, 1 special.';
		} else {
			$password2trim = filter_var($_POST['password2'], FILTER_SANITIZE_STRING);
			if ($password1trim === $password2trim) {
				$password = $password1trim;
			}else {
				$errors[]= "Your two passwords do not match.";
				$errors[]= "Please try it again";
			}
		}
	}
	// Is the 1st address preswnt? if it is, sanitize it
	$address1 = filter_var($_POST['address1'], FILTER_SANITIZE_STRING);
	if ((!empty($address1)) && (preg_match('/[a-z0-9\.\s\,\-]/i', $address1)) && strlen($address1) <=30) {
		// Sanitize the trimmed 1st address
		$address1trim = $address1;
	}else {
		$errors[] = "Missing address. Numeric, alphabetic, period, comma, dash and space.Max 30.";
	}
	// If the 2nd address is present? if it is sanitize it
	$address2 = filter_var($_POST['address2'], FILTER_SANITIZE_STRING);
	if ((!empty($address2)) && (preg_match('/[a-z0-9\.\s\,\-]/i', $address2)) && (strlen($address2)<=30)) {
		// Sanitize the trimmed address2
		$address2trim = $address2;
	}else {
		$address2trim = NULL;
	}
	// Is the city present? if it is sanitize it
	$city = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
	if ((!empty($city)) && (preg_match('/[a-z\.\s]/i', $city)) && (strlen($city)<=30)) {
		// Sanotoze the trimmed city
		$citytrim = $city;
	}else {
		$errors[]= "Missing city. Only alphabetic, period and space. Max 30.";
	}
	// Is the country or state present? if it is, sanitize it
	$state_country = filter_var($_POST['state_country'], FILTER_SANITIZE_STRING);
	if ((!empty($state_country)) && (preg_match('/[a-z\.\s]/i', $state_country)) && (strlen($state_country) <=30)) {
		// Sanitize the trimmed state or country
		$state_countrytrim = $state_country;
	}else {
		$errors[] = 'Missing state/country. Only alphabetic, period and space. Max 30.';
	}
	// is the zip code or post code present? if it is, sanitize it
	$zcode_pcode = filter_var($_POST['zcode_pcode'], FILTER_SANITIZE_STRING);
	$string_length = strlen($zcode_pcode);
	if ((!empty($zcode_pcode)) && (preg_match('/[a-z0-9\s]/i', $zcode_pcode)) && ($string_length <=30)&& ($string_length >=5)) {
		// Sanitize the trimmed zcode_pcode
		$zcode_pcodetrim = $zcode_pcode;
	}else {
		$errors[] = 'Missing zip code or post code. Alpha, numeric, space only max 30 characters';
	}
	// Is the secret present? if it is sanitize it
	$secret = filter_var($_POST['secret'], FILTER_SANITIZE_STRING);
	if ((!empty($secret)) && (preg_match('/[a-z\.\s\,\-]/i', $secret)) && (strlen($secret) <=30)) {
		// Sanitize the trimmed secret
		$secrettrim = $secret;
	}else {
		$errors[] = 'Missing city. Only alphabetic, period, comma, dash and space. Max 30.';
	}

	// is the phone number present? if it is sanitize it
	$phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
	if ((!empty($phone))&&(strlen($phone) <=30)) {
		// Sanitize the trimmed phone number
		$phonetrim = (filter_var($phone, FILTER_SANITIZE_NUMBER_INT));
		$phonetrim = preg_replace('/[^0-9]/', '', $phonetrim);
	} else {
		$phonetrim = NULL;
	}
	// Check for an membership class
	if(isset($_POST['level'])) {
	$class = filter_var( $_POST['level'], FILTER_SANITIZE_STRING); }
	if ((!empty($class)) && (strlen($class) <=3)) {
		// Sanitize the trimmed class
		$classtrim = (filter_var($class, FILTER_SANITIZE_NUMBER_INT));
	}else {
		$errors[] = 'Missing Level Selection ';

	}
if (empty($errors)) { // If everything's OK.

//Determine whether the email address has already been registered
$query = "SELECT user_id FROM users WHERE email = ? ";
$q = mysqli_stmt_init($dbcon);
mysqli_stmt_prepare($q, $query);
mysqli_stmt_bind_param($q, 's', $email);
mysqli_stmt_execute($q);
$result = mysqli_stmt_get_result($q);

	if (mysqli_num_rows($result) == 0){//The email address has not been registered
		//already therefore register the user in the users table
		// ---------------------Valid Entries - Save to database -----------
		// Start of the SUCCESSFUL SECTION
		// Hash password current 60 characters but can increase
	  $hashed_passcode = password_hash($password, PASSWORD_DEFAULT);
		// register the user in the database
		$query = "INSERT INTO users ( title, secret, first_name, last_name, email, password, ";
		$query .= "class, address1, address2, city, state_country, zcode_pcode, phone, ";
		$query .= "registration_date ) ";
		$query .="VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,NOW())";
        $q = mysqli_stmt_init($dbcon);
        mysqli_stmt_prepare($q, $query);
        // use prepared statement to insure that only text is inserted
        // bind fields to SQL Statement
        mysqli_stmt_bind_param($q, 'sssssssssssss',
			$titletrim, $secrettrim, $first_nametrim, $last_nametrim, $emailtrim, $hashed_passcode,
			$classtrim, $address1trim, $address2trim, $citytrim, $state_countrytrim, $zcode_pcodetrim, $phonetrim);
     // execute query
        mysqli_stmt_execute($q);
        if (mysqli_stmt_affected_rows($q) == 1) {	// One record inserted
		header ("location: register-thanks.php?class=" . $classtrim);
		exit();
		} else { // If it did not run OK.
		// Public message:
			// echo "invalid query: ".$dbcon->error;
		    $errorstring = "<p class='text-center col-sm-8' style='color:red'>";
			$errorstring .= "System Error<br />You could not be registered due ";
			$errorstring .= "to a system error. We apologize for any inconvenience.</p>";
			echo "<p class=' text-center col-sm-2' style='color:red'>$errorstring</p>";
			// Debugging message below do not use in production
			echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $query . '</p>';
		    mysqli_close($dbcon); // Close the database connection.
		// include footer then close program to stop execution
			echo '<footer class="jumbotron text-center col-sm-12"
	        style="padding-bottom:1px; padding-top:8px;">
            include("includes/footer.php");
            </footer>';
		exit();
		}
	}else{//The email address is already registered                                                                                              #4
		$errorstring = 'The email address is already registered.';
			echo "<p class=' text-center col-sm-2' style='color:red'>$errorstring</p>";
	}
	} else { // Report the errors.
		$errorstring = "Error! <br /> The following error(s) occurred:<br>";
		foreach ($errors as $msg) { // Print each error.
			$errorstring .= " - $msg<br>\n";
		}
		$errorstring .= "Please try again.<br>";
		echo "<p class=' text-center col-sm-2' style='color:red'>$errorstring</p>";
		}// End of if (empty($errors)) IF.
		}
   catch(Exception $e) // We finally handle any problems here
   {
     // print "An Exception occurred. Message: " . $e->getMessage();
     print "The system is busy please try later";
   }
   catch(Error $e)
   {
      //print "An Error occurred. Message: " . $e->getMessage();
      print "The system is busy please try again later.";
   }
?>
