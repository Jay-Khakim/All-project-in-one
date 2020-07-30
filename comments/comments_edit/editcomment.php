<?php
  date_default_timezone_set('Asia/Tashkent');
  include "dbh.inc.php";
  include "comments.inc.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body style="background-color: #ddd;">

    <?php
      $cid = $_POST['cid'];
      $uid = $_POST['uid'];
      $date = $_POST['date'];
      $message = $_POST['message'];

      echo '<form action="'.editComments($conn).'" method="POST">
        <input type="hidden" name="cid" value="'.$cid.'">
        <input type="hidden" name="uid" value="'.$uid.'">
        <input type="hidden" name="date" value="'.$date.'">
        <textarea name="message" rows="2" cols="65">'.$message.'</textarea><br>
        <button style="margin-bottom: 40px;" type="submit" name="edit">Edit</button>
      </form>';

     ?>
  </body>
</html>
