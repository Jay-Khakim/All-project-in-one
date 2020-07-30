<?php
include_once("mysqli_connect.php");
try {
  $first = $_POST['first'];
  $last = $_POST['last'];
  $uid = $_POST['uid'];
  $pwd = $_POST['pwd'];

  $sql = "INSERT INTO users (first, last, username, password) VALUES ('$first', '$last', '$uid', '$pwd')";
  mysqli_query($dbcon, $sql);

  $sql = "SELECT * FROM users WHERE username = '$uid' AND first='$first'";
  $result=mysqli_query($dbcon, $sql);

  if (mysqli_num_rows($result)>0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $userid = $row['id'];
      $sql = "INSERT INTO profile_img (userid, status) VALUES ('$userid', 1)";
      mysqli_query($dbcon, $sql);
      header("Location: index.php");
    }
  }else {
    echo "You have an error";

  }
} catch (\Exception $e) {
  print "An Exception occurred. Message: " . $e->getMessage();
  print "The system is busy please try later";
}


?>
