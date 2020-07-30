<?php

try {
  // Import PHPMailer classes into the global namespace
	// These must be at the top of your script, not inside a function
  require 'vendor/autoload.php';
  require ("PHPMailer/src/SMTP.php");
  require ("PHPMailer/src/Exception.php");
  require ("PHPMailer/src/PHPMailer.php");

  if (isset($_POST['name']) && (isset($_POST['email']))) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $body= $_POST['message'];
    // use PHPMailer\PHPMailer\PHPMailer;
		// use PHPMailer\PHPMailer\SMTP;
		// use PHPMailer\PHPMailer\Exception;
		$mail = new PHPMailer\PHPMailer\PHPMailer();

    // smtp settings;
    // $mail->PHPMailer\PHPMailer\SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();    // You have to disable this line when you upload your codes to server
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = 'mgmediajay@gmail.com';
    $mail->Password = '';
    $mail->Port = 465;
    $mail->SMTPSecure = 'ssl';

    // email settings
    $mail->isHTML(true);
    $mail->setFrom($email, $name);
    $mail->addAddress("mgmediajay@gmail.com");
    $mail->Subject = ("$email ($subject)");
    $mail->Body = $body;

    if ($mail->send()) {
      $status = 'success';
      header('Location: ../index.php?status='.$status);
      exit();
    }else {
      $status = 'failed';
      header('Location: ../index.php?status='.$status);
      exit();

    }
  }
} catch (\Exception $e) {
  echo "Messege could not be sent. Error: ", $mail->ErrorInfo;

}








// mb_internal_encoding("UTF-8");
//
// $to = 'mahmudjon2127@gmail.com';
// $subject = 'Message from Cryptex';
//
// $name = "";
// $email = "";
// $phone = "";
// $message = "";
//
// if( isset($_POST['name']) ){
//     $name = $_POST['name'];
//
//     $body .= "Name: ";
//     $body .= $name;
//     $body .= "\n\n";
// }
// if( isset($_POST['subject']) ){
//     $subject = $_POST['subject'];
// }
// if( isset($_POST['email']) ){
//     $email = $_POST['email'];
//
//     $body .= "";
//     $body .= "Email: ";
//     $body .= $email;
//     $body .= "\n\n";
// }
// if( isset($_POST['phone']) ){
//     $phone = $_POST['phone'];
//
//     $body .= "";
//     $body .= "Phone: ";
//     $body .= $phone;
//     $body .= "\n\n";
// }
// if( isset($_POST['message']) ){
//     $message = $_POST['message'];
//
//     $body .= "";
//     $body .= "Message: ";
//     $body .= $message;
//     $body .= "\n\n";
// }
//
// $headers = 'From: ' .$email . "\r\n";
//
// if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
// mb_send_mail($to, $subject, $body, $headers);
//     echo '<div class="status-icon valid"><i class="fa fa-check"></i></div>';
// }
// else{
//     echo '<div class="status-icon invalid"><i class="fa fa-times"></i></div>';
// }
