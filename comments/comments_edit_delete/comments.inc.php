<?php

function setComments($conn){
   if (isset($_POST['commentSubmit'])) {
     $uid = $_POST['uid'];
     $date = $_POST['date'];
     $message = $_POST['message'];

     $sql = "INSERT INTO comments (uid, date, message) VALUES ('$uid', '$date', '$message' );";

     $result = $conn->query($sql);
   }
}

function getComments($conn){
  $sql = "SELECT * FROM comments ";
  $result = $conn->query($sql);
  while ($row = mysqli_fetch_assoc($result)){
    echo "<div class='comment-box' style='width: 815px;
    padding: 20px;
    margin-bottom: 4px;
    background-color: #fff;
    border-radius: 4px;
    position: relative;'>
    <p style='font-family: arial; font-size: 14px; line-height: 16px; color: #282828; font-weight: 100;'>";
      echo $row['uid']."<br>";
      echo $row['date']."<br><br>";
      echo nl2br($row['message'])."<br><br>";
    echo "</p>
        <form method='POST' action='".deleteComments($conn)."' style='position: absolute; top: 2px; right: 46px;'>
          <input type='hidden' name='cid' value='".$row['cid']."'>
          <button style='width: 40px; height: 20px;  color: #282828; background-color: #fff;' type='submit' name='commentDelete'>Delete</button>
        </form>

        <form method='POST' action='editcomment.php' style='position: absolute; top: 2px; right: 2px;'>
          <input type='hidden' name='cid' value='".$row['cid']."'>
          <input type='hidden' name='uid' value='".$row['uid']."'>
          <input type='hidden' name='date' value='".$row['date']."'>
          <input type='hidden' name='message' value='".$row['message']."'>
          <button style='width: 40px; height: 20px;  color: #282828; background-color: #fff;'>Edit</button>
        </form>

    </div>";

  }
}

function editComments($conn){
  if (isset($_POST['edit'])){
    $uid = $_POST['uid'];
    $cid = $_POST['cid'];
    $date = $_POST['date'];
    $message = $_POST['message'];

    $sql = "UPDATE comments SET message='$message' WHERE cid='$cid'";

    $result = $conn->query($sql);
    header("Location: index.php");
  }
}


function deleteComments($conn){
  try {
    if (isset($_POST['commentDelete'])) {
      $cid = $_POST['cid'];

      $sql = "DELETE FROM comments WHERE cid='$cid'";
      $result = $conn->query($sql);
      header("Location: index.php");
    }
  }
  catch (\Exception $e)
  {
    print "The system is busy. Please try again.";
    print "An Exception occurred. Message: " . $e->getMessage();
  }
  catch(Error $e)
  {
    print "The system is currently busy. Please try again soon.";
    print "An Error occurred. Message: " . $e->getMessage();
  }
}

//
// <form method='post' action='editcomment.php' style='position: absolute; top: 2px; right: 2px;'>
//   <input type='hidden' name='cid' value= '".$row['cid']."'>
//   <input type='hidden' name='uid' value= '".$row['uid']."'>
//   <input type='hidden' name='date' value= '".$row['date']."'>
//   <input type='hidden' name='message' value= '".$row['message']."'>
//   <button style='width: 40px; height: 20px;  color: #282828; background-color: #fff;'  name='edit'>Edit</button>
// </form>
//
// <form method='post' action='".deleteComments($conn)."' style='position: absolute; top: 2px; right: 56px;'>
//   <input type='hidden' name='cid' value= '".$row['cid']."'>
//   <button style='width: 40px; height: 20px;  color: #282828; background-color: #fff;' type='submit'  name='commentDeletes'>Delete</button>
// </form>
