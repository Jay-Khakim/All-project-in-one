<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <!-- <p>This is a paragraph</p>
    <?php
      echo "This is a paragraph";
     ?>
    <p>This is a paragraph</p> -->
    <!-- Without escaping -->
    <?php
    if (1==1){
      echo "Yah this is works";
    }
     ?>
     <!-- With escaping -->

     <?php if (1==1) {?>
    <p>Yah this is works</p>
    <?php } ?>
    <?php
      $num1 = 12;
      $num2 = 14;
      echo $num1+$num2;
     ?>
     <?php
        $a = "My name ";
        $b = "is Jay";
        $c = $a . $b;
        echo strlen($c);
        echo strrev($c)
     ?>
     <?php
        echo strpos("Hi there", "i");
      ?>
      <?php
        $x = 5;
        $y = 10;
        if ($x !=$y){
          echo "True";
        }else {
          echo "False";
        }
       ?>
       <!-- <?php
          $x = 1;
          while ($x <100) {
            echo "Hi there<br>";
            $x++;
          }
        ?> -->
        <!-- <?php
          for ($x = 0; $x <=11; $x++){
            echo "string<br>";
          }
         ?>
        -->
        <?php
          $arrayName = array('Daniel', 'Ibrokhim', 'Mehmed' ,'Akmal' );
          foreach ($arrayName as $b) {
            // code...
            echo "My name is ".$b."<br>";
          }
        ?>
  </body>
</html>
