<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form method="get">
      <input type="hidden" name="name" value="value">
      <button type="submit" name="button">Press Me!</button>

    </form>
    <?php
      $x = 4000000000;
      $sum = $x/1000*1;
      echo $x." will be ".$sum."$";
     ?>
  </body>
</html>
