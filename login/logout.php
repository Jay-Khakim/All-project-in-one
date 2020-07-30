<?php
  session_start();   //access the current session.
  //if no session variable exists then redirect the user

  if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
    // cancel the session and redirect the user
  } else { //cancel the session
    $_SESSION = array(); //Destroy the variables
    $params = session_get_cookie_params();
    // Destroy cookies
    Setcookie(session_name(),'', time()-42000, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    if (session_status() == PHP_SESSION_ACTIVE) {
      session_destroy();
    }
    header('Location: index.php');
  }


?>
