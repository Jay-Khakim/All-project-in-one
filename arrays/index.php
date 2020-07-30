<?php
  include_once"db.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php

      $sql = "SELECT * FROM data";
      $result = mysqli_query($conn, $sql);
      $datas = array('');
      if (mysqli_num_rows($result)>0) {
        while ($row = mysqli_fetch_assoc($result)) {
          $datas[] = $row;
        }
      }

      // print_r($datas);
      foreach ($datas as $data) {
        print_r( $data);
      }
      foreach ($datas as $data) {
        print( $data['text']." ");
      }
     ?>
  </body>
</html>
