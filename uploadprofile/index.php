<?php
session_start();
include_once('mysqli_connect.php');
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Upload files</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>

    <?php
    $sql = "SELECT * FROM users ";
    $result = mysqli_query($dbcon, $sql);
    if (mysqli_num_rows($result)> 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $sqlImg = "SELECT * FROM profile_img WHERE userid='$id'";
        $resultImg = mysqli_query($dbcon, $sqlImg);
        while($rowImg =mysqli_fetch_assoc($resultImg)){
          echo "<div class='user-container'>";
              if ($rowImg['status'] == 0) {
                $filename = "uploads/profile".$id."*";
                $fileinfo = glob($filename);   //glob() use for searching
                $fileext = explode(".", $fileinfo[0]);
                $fileactualext = $fileext[1];
                echo "<img src ='uploads/profile".$id.".".$fileactualext."'>";
              }else {
                echo "<img src ='uploads/profiledefault.png'>";
              }
              echo "<p>".$row['username']."</p>";
          echo "</div>";
        }
      }
    }else {
        echo "There are no users yet!";
    }

    if (isset($_SESSION['id'])) {
      if ($_SESSION['id'] == 1) {
        echo "You are logged in as user #1";
      }
      echo '<form class="" action="upload.php" method="post" enctype="multipart/form-data">
        <!-- "enctype" specifies how the format data should be encoded  -->
        <input type="file" name="file" value=""><br>
        <button type="submit" name="submit">Upload</button>
      </form>';
      echo '<form class="" action="deleteprofile.php" method="post">
        <button type="submit" name="submit">Delete Profile Image</button>
      </form>';
    }else {
      echo "You are not logged in!";
      echo "<form action='signup.php' method='post' >
      <input type='text' name='first' placeholder='First name'>
      <input type='text' name='last' placeholder='Last name'>
      <input type='text' name='uid' placeholder='Username'>
      <input type='password' name='pwd' placeholder='Password'>
      <button type='submit' name='submitSignup' >Sign up!</button>
      </form>";
    }
    ?>


    <p>Login as User! </p>
    <form class="" action="login.php" method="post">
      <button type="submit" name="submitLogin">Login</button>
    </form>

    <p>Log out as User!</p>
    <form class="" action="logout.php" method="post">
      <button type="submit" name="submitLogout">Logout</button>
    </form>

  </body>
</html>
