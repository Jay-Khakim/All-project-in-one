<?php
    session_start();
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <ul>
      <li><a href="index.php">HOME</a></li>
      <li><a href="contact.php">CONTACT</a></li>
    </ul>

    <?php
      $_SESSION['username'] = 'jaykhakim';
      echo $_SESSION['username'];
      ?>
  </body>
</html>
