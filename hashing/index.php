<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php

      // Hashing
      // $pwd = 'test123';
      // echo $pwd;
      // echo "<br>";
      // echo password_hash($pwd, PASSWORD_DEFAULT);

      // Dehashing
      $input = "test123";
      $hashedPwdInDb = password_hash($input, PASSWORD_DEFAULT);

      echo password_verify($input, $hashedPwdInDb);
    ?>
  </body>
</html>
