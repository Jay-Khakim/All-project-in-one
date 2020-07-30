<?php
try {
  // Check for a valid user ID Through GET and PosT
  if ((isset($_GET['id'])) && (is_numeric($_GET['id']))) {
    // From view_user.php
    $id = htmlspecialchars($_GET['id'], ENT_QUOTES);
  } elseif ((isset($_POST['id'])) && (is_numeric($_POST['id']))) {
    // From view_user.php
    $id = htmlspecialchars($_POST['id'], ENT_QUOTES);
  }else {
    // No valid Id kill the script
    // return to login page
    header("Location: login.php");
    exit();
  }

  require('./mysqli_connect.php');
  // check if the form has been submitted:
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sure = htmlspecialchars($_POST['sure'], ENT_QUOTES);
    if ($sure == 'Yes'){
      // Delete the record
      // make a query
      $q = mysqli_stmt_init($dbcon);
      mysqli_stmt_prepare($q, 'DELETE FROM users WHERE user_id=? LIMIT 1;');

      // Bind $id to SQL Statement
      mysqli_stmt_bind_param($q, 's', $id);

      // execute query
      mysqli_stmt_execute($q);

      if (mysqli_stmt_affected_rows($q) == 1) { // it ran OK
        //Print a message
        echo '<h3 class="text-center">The record has been deleted.</h3>';
      } else {
        // If the query did not run OK display public message
        echo '<p class="text-center">The record could not be deleted.';
        echo '<br>Either it does not exist or due to a system error.</p>';
        // echo '<p>' . mysqli_error($dbcon ) . '<br />Query: ' . $q . '</p>';
        // Debugging message. When live comment out because this displays SQL
      }
    } else {
      // User did not confirm deletion.
      echo '<h3 class="text-center">The user has NOT been deleted as ';
      echo 'you requested</h3>';
    }
  } else {
    // Show the form
     $q = mysqli_stmt_init($dbcon);
     $query = "SELECT CONCAT(first_name, ' ', last_name) FROM ";
     $query .= "users WHERE user_id=?";
     mysqli_stmt_prepare($q, $query);

     // bind $id to SQL Statement
     mysqli_stmt_bind_param($q, "s", $id);

     // execute query
     mysqli_stmt_execute($q);
     $result = mysqli_stmt_get_result($q);

     $row = mysqli_fetch_array($result, MYSQLI_NUM); // get user info

     if (mysqli_num_rows($result) == 1) {
       // Valid user ID, display the form.
       // Display the record being deleted:                                             #4
      $user = htmlspecialchars($row[0], ENT_QUOTES);
?>
<h2 class="h2 text-center"> Are you sure you want to permanently delete <?php echo $user; ?>?</h2>

<form action="delete_user.php" method="post" name="deleteform" id="deleteform">
  <div class="form-group row">
    <label for="" class="col-sm-4 col-form-label"></label>
    <div class="col-sm-8" style="padding-left: 70px;">
      <input type="hidden" name="id" value="<?php echo $id ?>">
      <input type="submit" id="submit-yes" class="btn btn-primary" name="sure" value="Yes">
      <input type="submit" id="submit-no" class="btn btn-primary" name="sure" value="No">
    </div>
  </div>
</form>

<?php
} else {
  // Not a valid user ID
  echo '<p class="text-center">This page has been accessed in error.</p>';
}
}// End of the main submission conditional.
mysqli_stmt_close($q);
mysqli_close($dbcon );
}
catch(Exception $e){
  print "The system is busy. Please try again.";
  //print "An Exception occurred. Message: " . $e->getMessage();
}
catch(Error $e)
    {
        print "The system is currently busy. Please try again soon.";
        //print "An Error occurred. Message: " . $e->getMessage();
    }
?>
