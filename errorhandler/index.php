<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Error handler tutorial!</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  </head>
  <body>
    <h1>Sign Up!</h1>
      <form class="signup" action="signup.php" method="post">
        <?php
          if (isset($_GET['first'])) {
            $first = $_GET['first'];
            echo '<input type="text" name="first" placeholder="First name" value = "'.$first.'">';
          }
          else{
              echo '<input type="text" name="first" placeholder="First name">';
          }

          if (isset($_GET['last'])) {
            $last = $_GET['last'];
            echo '<input type="text" name="last" placeholder="Last name" value = "'.$last.'">';
          }
          else{
              echo '<input type="text" name="last" placeholder="Last name">';
          }
         ?>
        <input type="text" name="email" placeholder="Email">
        <?php
        if (isset($_GET['uid'])) {
          $uid = $_GET['uid'];
          echo '<input type="text" name="uid" placeholder="User name" value = "'.$uid.'">';
        }
        else{
            echo '<input type="text" name="uid" placeholder="User name">';
        }
         ?>
        <input type="password" name="pwd" placeholder="Password">

        <button type="submit" name="submit">Sign up!</button>

      </form>
      <?php
        // $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        //
        // if (strpos($fullUrl, "signup=empty") == true) {
        //   echo "<p class ='error'>You did not fill in all fieldS</p>";
        //   exit();
        //
        // }
        // elseif (strpos($fullUrl, "signup=invalidChar") == true) {
        //   echo "<p class ='error'>You used invalid characters!</p>";
        //   exit();
        //
        // }elseif (strpos($fullUrl, "signup=invalidEmail") == true) {
        //   echo "<p class ='error'>You used invalid email!</p>";
        //   exit();
        //
        // }elseif (strpos($fullUrl, "signup=success") == true) {
        //   echo "<p class ='success'>You have been signed up!</p>";
        //   exit();
        // }

        if (!isset($_GET['signup'])) {
          exit();
        }
        else{
          $signupCheck = $_GET['signup'];
          if ( $signupCheck == 'empty') {
            echo "<p class ='error'>You did not fill all fields</p>";
            exit();
          }
          elseif ( $signupCheck == 'invalidChar') {
            echo "<p class ='error'>You used invalid characters!</p>";
            exit();
          }
          elseif ( $signupCheck == 'invalidEmail') {
            echo "<p class ='error'>You used invalid email!</p>";
            exit();
          }
          elseif ( $signupCheck == 'success') {
            echo "<p class ='error'>You have been signed up!</p>";
            exit();
          }
        }
       ?>
  </body>
</html>
