

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form action="includes/signup.php" method="post">
      <input type="text" name="first" placeholder="First Name">
      <br>
      <input type="text" name="last" placeholder="Last Name">
      <br>

      <input type="text" name="email" placeholder="E-mail">
      <br>

      <input type="text" name="uid" placeholder="Username">
      <br>

      <input type="password" name="pwd" placeholder="Password">
      <br>
      <button type="submit" name="submit">Sign Up!</button>
    </form>

    <!-- <?php
      // $sql = "SELECT * FROM users;";
      // $sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd) VALUES ("Ruhsora", "Khakimjonova", "ruhsora@gmail.com", "Sora03", 'ruxsora1111');";
      //
      // mysqli_query($conn, $sql);
      // $result = mysqli_query($conn, $sql);

      // $resultCheck = mysqli_num_rows($result);
      //
      // if ($resultCheck > 0){
      //   while ($row = mysqli_fetch_assoc($result)) {
      //     echo $row['user_uid']."<br>";
      //   }
      // }
     ?> -->
  </body>
</html>
