<?php
  session_start();
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="This is an example of a meta description. This will often show up in search results.">
    <meta name=viewport  content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <header>
      <nav class="group">
        <!-- <a href="#"><img id='logo' alt="logo"></a> -->
        <ul class="group">
          <li> <a href="index.php">Home</a> </li>
          <li> <a href="#">Portfolio</a> </li>
          <li> <a href="#">About us</a> </li>
          <li> <a href="#">Contact</a> </li>
        </ul>
        <div class="button group">
          <?php
            if (isset($_SESSION['userId'])) {
              echo '<form class="" action="includes/logout.inc.php" method="post">
                <button type="submit" name="logout-submit">Log out</button>
              </form>';
            }
            else {
              echo '<form action="includes/login.inc.php" method="post">
                <input type="text" name="mailuid" placeholder="Username or Email ...">
                <input type="password" name="pwd" placeholder="Password...">
                <button type="submit" name="login-submit">Login</button>
                <a id="signup" href="signup.php">Sigh Up!</a>
              </form>
              ';
            }
          ?>


        </div>
      </nav>

    </header>
