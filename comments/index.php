<?php
  date_default_timezone_set('Asia/Tashkent');
  include "dbh.inc.php";
  include "comments.inc.php";
  session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style.css">
  </head>
  <body style="background-color: #ddd;">

    <?php
      echo "<form method='post' action='".getLogin($conn)."'>
        <input type='text' name='uid' >
        <input type='password' name='pwd' >
        <button type='submit' name='loginSubmit'>Login</button>
      </form>";
      echo "<form method='post' action='".userLogout()."'>
        <button type='submit' name='logoutSubmit'>Logout</button>
      </form>";
      if (isset($_SESSION['id'])) {
        echo "You are logged in!";
      } else {
        echo "You are logged out!";
      }
    ?>
    <br><br>

    <iframe width="560" height="315" src="https://www.youtube.com/embed/kWOuUkLtQZw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <br><br>
    <?php
    if (isset($_SESSION['id'])) {
      echo '<form class="" action="'.setComments($conn).'" method="post">
        <input type="hidden" name="uid" value="'.$_SESSION['id'].'">
        <input type="hidden" name="date" value="'.date("Y-m-d H:i:s").'">
        <textarea name="message" rows="2" cols="65"></textarea><br>
        <button style="margin-bottom: 40px;" type="submit" name="commentSubmit">Comment</button>
      </form>';
    } else {
      echo "You need to be logged in to comment!<br><br>";
    }

      getComments($conn);
     ?>
  </body>
</html>
