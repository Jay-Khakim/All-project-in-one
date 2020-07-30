<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);
try{
  // SMTP Server config
  $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
  $mail->isSMTP(); //Unable this line when using it in  host
  $mail->Host = "smtp.gmail.com";
  $mail->SMTPAuth   = true;
  $mail->Username = 'mgmediajay@gmail.com';
  $mail->Password = 'fa002198424';
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
  $mail->Port = 587;







  //  Recipients
  $mail->setFrom("bdgroup.in.2020@gmail.com", "Big Dream Int. Company");
  $mail->addAddress("javohirjon.xakimov.1999@gmail.com");
  $mail->addReplyTo("javohirjon.xakimov.1999@gmail.com");

  //  Content
  $mail->isHTML(true);
  $mail->Subject = "My first Gmail SMTP email";
  $mail->Body = "<h1>Hi!</h1><h2>This is Big Dream Int. Company and Jay!</h2><br><strong>Don't worry Jakhongir Bro!</strong> This is testing message from Jay PHP tutorials <br>
   <b>  Thank you!</b>";

  $mail->send();
  echo "<p style= 'color: green;'>Messege has been sent!</p>";

}catch(Excemption $e){
  echo "Messege could not be sent. Error: ", $mail->ErrorInfo;
}
?>
