<?php
session_start();
if (!isset($_SESSION['user_level']) || ($_SESSION['user_level'] !=1)) {
  header("Location: login.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Template for interactive web page!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS File  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  </head>
  <body>
    <div class="container" style="margin-top: 30px">

      <!-- Header section -->
      <header class="jumbotron text-center row" style="margin-bottom:2px; background: linear-gradient(#e66465, #9198e5); padding:20px;">
        <?php include('includes/header.php'); ?>
      </header>

      <!-- Body section -->
      <div class="row" style="padding-left: 0px;">
        <!-- Left-side Column Menu Section -->
        <nav class="col-sm-2">
          <ul class="nav nav-pills flex-column">
            <?php include("inludes/nav.php"); ?>
          </ul>
        </nav>

        <!-- Center Column Content Section  -->
        <div class="col-sm-8">
          <h2 class="text-center">These are registered users!</h2>
          <?php
            try { //This script retrieves all the records from the users table.
                require("mysqli_connect.php");
                // Make query
                // Nothing passed from user safe query.
                $query = "SELECT last_name, first_name, email, DATE_FORMAT(registration_date, '%M %d, %Y') AS regdat, user_id FROM users ORDER BY registration_date ASC;";
                // prepared statement not needed since hardcoded
                $result = mysqli_query($dbcon, $query);
                // run the query.

                if ($result) { //If it is OK, Display the record
                  // table header
                  echo '<table class="table table-striped">
                  <tr>
                  <th scope="col">Edit</th>
                  <th scope="col">Delete</th>
                  <th scope="col">Last Name</th>
                  <th scope="col">First Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Date Registered</th>
                  </tr>';

                  // Fetch and print all the records:
                  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    // Remove special charachters that might already be in table to reduce the chance of XSS exploits
                    $user_id = htmlspecialchars($row['user_id'], ENT_QUOTES);
                    $last_name = htmlspecialchars($row['last_name'], ENT_QUOTES);
                    $first_name = htmlspecialchars($row['first_name'], ENT_QUOTES);
                    $email = htmlspecialchars($row['email'], ENT_QUOTES);
                    $registration_date = htmlspecialchars($row['regdat'], ENT_QUOTES);
                    echo '<tr>
	                   <td><a href="edit_user.php?id=' . $user_id . '">Edit</a></td>
	                   <td><a href="delete_user.php?id=' . $user_id . '">Delete</a></td>
	                   <td>' . $last_name . '</td>
	                   <td>' . $first_name . '</td>
	                   <td>' . $email . '</td>
	                   <td>' . $registration_date . '</td>
	                   </tr>';
                    }
                    echo '</table>';
                    mysqli_free_result ($result); // Free up the resources.

                }
                else {
                  // Error message:
                  echo '<p class="text-center">The current users could not be retrieved. ';
                  echo 'We apologize for any inconvenience.</p>';

                  // Debug message:
                  // echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $q . '</p>';
                  exit;
                }//End of the result
                mysqli_close($dbcon);   //Close the database connection.

            } catch (\Exception $e) { //We finally handle any problem here
              // print "An Exception occurred. Message: " . $e->getMessage();
              print "The system is busy please try later";
            } catch(Error $e){
              //print "An Error occurred. Message: " . $e->getMessage();
              print "The system is busy please try again later.";
            }


          ?>
        </div>

        <!-- Right Side Column Content Section -->
        <aside class="col-sm-2">
          <?php include('info-col.php'); ?>
        </aside>
      </div>

      <!-- Footer Content Section! -->
      <footer class="jumbotron text-center row" style="padding-bottom:1px; padding-top:8px;">
        <?php include('footer.php'); ?>
      </footer>
    </div>
  </body>
</html>
