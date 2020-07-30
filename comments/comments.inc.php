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
    $id = $row['uid'];
    $sql2 = "SELECT * FROM users WHERE id='$id'";
    $result2 = $conn->query($sql2);

    if ($row2 = mysqli_fetch_assoc($result2)) {
      echo "<div class='comment-box' style='width: 815px;
      padding: 20px;
      margin-bottom: 4px;
      background-color: #fff;
      border-radius: 4px;
      position: relative;'>
      <p style='font-family: arial; font-size: 14px; line-height: 16px; color: #282828; font-weight: 100;'>";
        echo $row2['uid']."<br>";
        echo $row['date']."<br><br>";
        echo nl2br($row['message'])."<br><br>";
      echo "</p>";
      if (isset($_SESSION['id'])) {
        if ($_SESSION['id'] == $row2['id']) {
          echo "<form method='POST' action='".deleteComments($conn)."' style='position: absolute; top: 2px; right: 46px;'>
                <input type='hidden' name='cid' value='".$row['cid']."'>
                <button style='width: 40px; height: 20px;  color: #282828; background-color: #fff;' type='submit' name='commentDelete'>Delete</button>
              </form>

              <form method='POST' action='editcomment.php' style='position: absolute; top: 2px; right: 2px;'>
                <input type='hidden' name='cid' value='".$row['cid']."'>
                <input type='hidden' name='uid' value='".$row['uid']."'>
                <input type='hidden' name='date' value='".$row['date']."'>
                <input type='hidden' name='message' value='".$row['message']."'>
                <button style='width: 40px; height: 20px;  color: #282828; background-color: #fff;'>Edit</button>
              </form>";
        } else {
          echo "<form method='POST' action='replycomment.php' style='position: absolute; top: 2px; right: 2px;'>
                <input type='hidden' name='cid' value='".$row2['uid']."'>
                <button style='width: 40px; height: 20px;  color: #282828; background-color: #fff;' type='submit' name='commentReply'>Reply</button>
              </form>";
        }
      }else {
        echo "<p style=' position: absolute; float: right; top: 1px; color: grey; right: 10px; '>You need to be logged in to reply!</p>";
      }

          echo "</div>";
    }
  }
}
function replyComments($conn){
  if (isset($_POST['commentReply'])){
    $uid = $_POST['uid'];
    $cid = $_POST['cid'];
    $date = $_POST['date'];
    $message = $_POST['message'];

    $sql = "INSERT INTO comments(uid, date, message) VALUES('$uid', '$date', '$message' )";

    $result = $conn->query($sql);
    header("Location: index.php");
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

function getLogin($conn){
  if (isset($_POST['loginSubmit'])){
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];

    $sql = "SELECT * FROM users WHERE uid='$uid' AND pwd='$pwd' ";
    $result = $conn->query($sql);

    if (mysqli_num_rows($result)>0) {
      if ($row = mysqli_fetch_assoc($result)){
        $_SESSION['id'] = $row['id'];
        header("Location: index.php?login=success");
        exit();
      }
    }else {
      header("Location: index.php?login=failed");
      exit();
    }
  }
}
function userLogout(){
  if (isset($_POST['logoutSubmit'])){
    session_start();
    session_destroy();
    header("Location: index.php");
    exit();
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
