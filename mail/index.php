<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);
    // SMTP Server config
    $mail->Host = "smtp.gmail.com";
    $mail->isSMTP();    //If you are using this mailing system You have to disable this line
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';

    $mail->Username = 'mgmediajay@gmail.com';
    $mail->Password = '';

    $mail->setFrom("mgmediajay@gmail.coms", "Big Dream Int. Company");
    $mail->addAddress("mahmudjon2127@gmail.com");
    $mail->addReplyTo("mahmudjon2127@gmail.com");

    $mail->isHTML(true);
    $mail->Subject = "My first Gmail SMTP email";
    $mail->Body = "<h1>Hi!</h1><h2>This is Big Dream Int. Company and Jay!</h2><br><strong>Don't worry Jakhongir Bro!</strong> This is testing message from Jay PHP tutorials <br>
   <b>  Thank you!</b>";

    if (!$mail->send()) {
        echo "Message could nor be sent!";
    } else {
        echo "Message has been sent!";
    }

    ?>
