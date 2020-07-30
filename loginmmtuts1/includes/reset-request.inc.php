<?php

if (isset($_POST['reset-request-submit'])) {

  $selector = bin2hex(random_bytes(8));
  $token = random_bytes(32);

  $url = "https://leader21horizon.000webhostapp.com/create-new-password.php?selector=".$selector."&validator=".bin2hex($token);

  $expires = date("U")+1800;

  require "dbh.inc.php";

  $userEmail = $_POST["email"];

  $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "There was an error!";
    exit();
  }else{
    mysqli_stmt_bind_param($stmt, "s", $userEmail);
    mysqli_stmt_execute($stmt);
  }

  $sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?, ?, ?, ?);";

  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "There was an error!";
    exit();
  }else{
    $hashedToken = password_hash($token, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
    mysqli_stmt_execute($stmt);
  }

  mysqli_stmt_close($stmt);
  mysqli_close($conn);

  $to = $userEmail;

  $subject = "Reset your password for loginmmtuts1";

  $message = "<h1>Reset password!</h1><br><p>We recieved a password reset request. The link to reset your password, if you did not make a request, you can ignore this email</p><br><p>Here is your password reset link: </p><br><a href='.$url.'>'.$url.'</a>";

  $headers = "From: B.D. Int. Company <mgmediajay@gmail.com>\r\n Reply-To: <mgmediajay@gmail.com>\r\n Content-type: text/html\r\n";


  mail($to, $subject, $message, $headers);

  header("Location: ../reset-password.php?reset=success");

} else {
  header("Location: ../index.php");
}
