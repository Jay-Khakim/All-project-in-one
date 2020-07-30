<?php

  if (isset($_POST['submit'])) {
    include_once 'dbh.php';
    $first = $_POST['first'];
    $last = $_POST['last'];
    $email = $_POST['email'];
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];
    // Check if input are empty

    if (empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd)){
      header("Location: index.php?signup=empty");
      exit();
    }else{
      // check if input characters are valid
      if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)){
        header("Location: index.php?signup=invalidChar");
        exit();
      } else{
        // Check if email is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
          header("Location: index.php?signup=invalidEmail&first=$first&last=$last&uid=$uid");
          exit();
        }else{
          header("Location: index.php?signup=success");
          exit();
        }
      }
    }
  }else {
    header("Location: index.php");
    exit();
  }
