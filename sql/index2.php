<?php
  include'includes/dbh.php';
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php

    // Here is simple function to get data from db


      // $sql = "SELECT * FROM users WHERE id = 1; ";
      // $result = mysqli_query($conn, $sql);
      // $resultCheck = mysqli_num_rows($result);
      //
      // if ($resultCheck >0) {
      //   while ($row = mysqli_fetch_assoc($result)){
      //     echo $row['user_uid']."<br>";
      //   }
      // }


      // Here is the funtion with prepared statements
      // Created a template
        $data = 'Admin';
        $sql = "SELECT * FROM users WHERE user_uid =?; ";

        // Create a prepared statements
        $stmt = mysqli_stmt_init($conn);
        // Prepare the preapared statements
        if (!mysqli_stmt_prepare($stmt, $sql)){
          echo "SQL statement failed!";
        }else{
          // Bind paramentr to the palceholders
          // The letter s means thet the prepared parametr will be a string data type
          // s = string, i=integer, b=BLOB, d=double
          mysqli_stmt_bind_param($stmt, "s", $data, );
          // Run parametrs inside database
          mysqli_stmt_execute($stmt);
          $result = mysqli_stmt_get_result($stmt);

          while ($row = mysqli_fetch_assoc($result)){
            echo $row['user_uid']."<br>";
          }
        }


     ?>

  </body>
</html>
