<?php
session_start();
//access the current session.
// if no session variable exists then redirect the user
if ($_SESSION['user_level'] !==1 ) {
  header("Location: index.php" );
  exit();
}else {
  // Cancel the session and redirect the user
  $_SESSION = array();
  $params = session_get_cookie_params();
  // Destroy the cookies
  setcookie(session_name(), '', time()-42000,
  $params['path'], $params['domain'],
  $params['secure'], $params['httponly']);
  if (session_status() == PHP_SESSION_ACTIVE) {
    session_destroy();
  }
  header("location: index.php");

}
