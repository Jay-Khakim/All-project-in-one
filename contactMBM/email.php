<?php
try {
	// Import PHPMailer classes into the global namespace
	// These must be at the top of your script, not inside a function


	require 'vendor/autoload.php';

	if (isset($_POST['name']) && isset($_POST['email'])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$subject = $_POST['subject'];
		$body = $_POST['your_message'];
		// use PHPMailer\PHPMailer\PHPMailer;
		// use PHPMailer\PHPMailer\SMTP;
		// use PHPMailer\PHPMailer\Exception;


		require "PHPMailer/src/PHPMailer.php";
		require "PHPMailer/src/SMTP.php";
		require "PHPMailer/src/Exception.php";

		$mail = new PHPMailer\PHPMailer\PHPMailer();
		// smtp settings;
		// $mail->PHPMailer\PHPMailer\SMTPDebug = SMTP::DEBUG_SERVER;
		$mail->isSMTP();    //If you are using this mailing system You have to disable this line
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
		$mail->Body = '<div style="background: grey; ">
			<h1 align="center" style="color: red;">From Uzbekmart</h1>
						<h2 style="color: red;">Dear admin!</h2><br>
							<h2 style="color: red;">We are glad to announce that your company has successfully accepted to our platform</h2>
							<a href="http://Uzbekmart.com/"></a>
						</div>';

		if ($mail->send()) {
			$status = "success";
			$response = "Message has been sent!";
			header('location: contact.php?status='.$status);
			exit();
		} else {
				$status = "failed";
				$response = "Something is wrong <br> Message could not be sent!".$mail->ErrorInfo;
				header('location: contact.php?status='.$status);
				exit();
		}
		// exit(json_encode(array("status" => $status, "response" => $response)));
	}

	// // Load Composer's autoloader
	// require 'vendor/autoload.php';
	//
	// $mail = new PHPMailer(true);
	//     // SMTP Server config
	//     $mail->Host = "smtp.gmail.com";
	//     $mail->isSMTP();    //If you are using this mailing system You have to disable this line
	//     $mail->Port = 587;
	//     $mail->SMTPAuth = true;
	//     $mail->SMTPSecure = 'tls';
	//
	//     $mail->Username = 'mgmediajay@gmail.com';
	//     $mail->Password = '';
	//
	//     $mail->setFrom("mgmediajay@gmail.coms", "Big Dream Int. Company");
	//     $mail->addAddress("mahmudjon2127@gmail.com");
	//     $mail->addReplyTo("mahmudjon2127@gmail.com");
	//
	//     $mail->isHTML(true);
	//     $mail->Subject = "My first Gmail SMTP email";
	//     $mail->Body = "<h1>Hi!</h1><h2>This is Big Dream Int. Company and Jay!</h2><br><strong>Don't worry Jakhongir Bro!</strong> This is testing message from Jay PHP tutorials <br>
	//    <b>  Thank you!</b>";
	//
	//     if (!$mail->send()) {
	//         echo "Message could nor be sent!";
	//     } else {
	//         echo "Message has been sent!";
	//     }
} catch (\Exception $e) {
	echo "Messege could not be sent. Error: ", $mail->ErrorInfo;
}
//
// $ccr_subject = $_REQUEST['subject'];
// $to = $_REQUEST['mgmediajay@gmail.com'];
//
// $headers  = 'MIME-Version: 1.0' . "\r\n";
// $headers .= "From: " . $_REQUEST['email'] . "\r\n";
// $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
//
// $message .= 'Name: ' . $_REQUEST['name'] . "<br>";
// $message .= $_REQUEST['your_message'];
//
// mail($mailto, $subject, $messageproper, "From: \"$usernametrim\" <$useremailtrim>" );
// if (mail($to, $ccr_subject, $message, $headers))
// {
//
// 	echo 'sent';
// }
// else
// {
//
// 	echo 'failed';
// }
// ?>
