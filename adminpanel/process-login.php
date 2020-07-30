<?php
// This section prosessess submission from the login form
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  // connect to the database
  try {
    require("mysqli_connect.php");

    // Validate the username
    // Check for an user name
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    if ((empty($username))) {
      $errors[] ='You forgot to enter the Username!';
    }

    // Validate the password
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    if (empty($password)) {
      $errors[] = "You forgot to enter the password!";
    }

    if (empty($errors)) {
      // IF everything is ok
      // Retrieve the user_id, password , username
      $query = "SELECT user_id, username, password, email, user_level FROM admin WHERE username=?";
      $q = mysqli_stmt_init($dbcon);
      mysqli_stmt_prepare($q, $query);

      // Bind username to SQL Statement
      mysqli_stmt_bind_param($q, 's', $username);

      //exexute query.
      mysqli_stmt_execute($q);
      $result = mysqli_stmt_get_result($q);
      $row = mysqli_fetch_array($result, MYSQLI_NUM);

      if (mysqli_num_rows($result) == 1) {
        // if one database row record matches the input:
        // Start the session, fetch the record and inset the values in an array.
        if ($password === $row[2]) {
          session_start();
          $_SESSION['user_id'] =$row[0];
          $_SESSION['username'] =$row[1];
          $_SESSION['email'] =$row[3];
          $_SESSION['user_level'] =$row[4];
          $url = ($_SESSION['user_level'] === 1) ? 'adminpanel.php':'index.php';
          header("Location: ".$url);

        }else {
          // NO password match was made
          $errors[] = "Username/Password entered does not match our record";
        }
      }else {
        // No username match was  made
        $errors[] = "Username/Password entered does not match our record";
      }
    }

    if (!empty($errors)) {
      $errorstring = "Eroors! <br/> The following error(s) occured: <br>";
      foreach ($errors as $mgs) {
        // Print each error.
        $errorstring.= "$mgs<br>\n";
      }
      $errorstring.="Please try again. <br>";
      echo "<p class=' text-center col-sm-2' style='color:red'>$errorstring</p>";
    }
    mysqli_stmt_free_result($q);
    mysqli_stmt_close($q);

  } catch (\Exception $e) {
    //We finally handle any problems here
    // print "An Exception occurred. Message: " . $e->getMessage();
    print "The system is busy please try later";
  }
  catch(Error $e){
    //print "An Error occurred. Message: " . $e->getMessage();
     print "The system is busy please try again later.";
   }
}
