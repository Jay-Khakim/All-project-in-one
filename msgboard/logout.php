<?php
session_start(); //Access the current session
// if no session variable exist then redirect the user
if(!isset($_SESSION['member_id'])){
  header("location: index.php");
  exit();
  // Cancel the session and redirect the user
}else {
  // Cancel the session
  $_SESSION = array(); //Destroy the variables
  $params = session_get_cookie_params();
  // Destroy the cookie
  setcookie(session_name(), '', time()-42000, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
  if (session_status() == PHP_SESSION_ACTIVE) {
    session_destroy();
  }//Destroy the session itself
  header('location: index.php');
}
?>
