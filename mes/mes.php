<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css.css">
    <title></title>
  </head>
  <body>
    <div class="image">


      <?php
        $dayofweek = date("w");
        // echo $dayofweek;
        switch ($dayofweek) {
          case 1:
            echo "<p>It is Monday</p>!";
            break;
          case 2:
            echo "<p>It is Tuesday!</p>";
            break;
          case 3:
            echo "<p>It is Wednesday!</p>";
            break;
          case 4:
            echo "<p>It is Thursday!</p>";
            // code...
            break;
          case 5:
            echo "<p>It is Friday</p>";
            // code...
            break;
          case 6:
            echo  "<p>It is Saturnday!</p>";
            // code...
            break;
          case 0:
            echo "<p>It is Sanday!</p>";
            // code...
            break;
        }
       ?>
     </div>
  </body>
</html>
