<?php
// Feedback form handler
// Set the error and thank you pages
$formulr = "feedback/feedback_form.html";
$errorurl = "feedback/error.html";
$thankyouurl = "feedback/thankyou.html" ;
$emailerrurl = "feedback/emailerr.html" ;
$errorcommenturl =  "feedback/commenterror.html" ;
// set to the email address of the recipient
$mailto = "javohirjon.xakimov.1999@gmail.com";
// Is first name present? If it is, sanitize it
$username = filter_var( $_POST['username'], FILTER_SANITIZE_STRING);
if ((!empty($username)) && (preg_match('/[a-z\s]/i',$username)) && (strlen($username) <= 30)){
  //Save user name
  $usernametrim = $username;
}else {
  $errors = 'yes';
}
// Check that an email address has been entered correctly
$useremailtrim = filter_var( $_POST['useremail'], FILTER_SANITIZE_EMAIL);
if  ((empty($useremailtrim)) || (!filter_var($useremailtrim, FILTER_VALIDATE_EMAIL)) || (strlen($useremailtrim > 60))){
  // if email is bad display error page
  header( "Location: $emailerrurl" );
  exit();
}
// Is the phone number present? if so, sanitize it
$phone = filter_var( $_POST['phone'], FILTER_SANITIZE_STRING);
if ((!empty($phone)) && (strlen($phone) <= 30)){
  //Sanitize and validate phone number
  $phonetrim = (filter_var($phone, FILTER_SANITIZE_NUMBER_INT));
  $phonetrim = preg_replace('/[^0-9]/', “, $phonetrim);
}else {
  $phonetrim = NULL; // if not valid or missing do not save
}

$ref_number = filter_var( $_POST['ref_number'], FILTER_SANITIZE_STRING);
if ((!empty($ref_number)) && (preg_match('/[0-9]/', $ref_number)) && (strlen($ref_number) <= 30)){
  //Save the 1st address
  $ref_numbertrim = $ref_number;
}else {
  $errors = 'yes';
}
$comment = filter_var( $_POST['comment'], FILTER_SANITIZE_STRING);
if ((!empty($comment)) && (strlen($comment) <= 320)){
  // remove ability to create link in email
  $patterns = array("/http/", "/https/", "/\:/","/\/\//","/www./");
  $commenttrim = preg_replace($patterns," ", $comment);
}else {
  // if comment not valid display error page
  header( "Location: $errorcommenturl" );
  exit();
}
if (!empty($errors)) {//If errors diplay error page
  header("Location: $errorurl");
  exit();
}
$subject = "Message from customer ".$usernametrim;
$messageproper =
      "------------------------------------------------------------\n" .
      "Name of sender: $usernametrim\n" .
      "Email of sender: $useremailtrim\n" .
      "Telephone: $phonetrim\n" .
      "Ref Number: $ref_numbertrim\n" .
      "------------------------- MESSAGE -------------------------\n\n" . $commenttrim .
      "\n\n------------------------------------------------------------\n" ;
mail($mailto, $subject, $messageproper, "From: \"$usernametrim\" <$useremailtrim>" );
header( "Location: $thankyouurl" );
exit();
?>
