
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
        <?php include('header.php'); ?>
      </header>

      <!-- Body section -->
      <div class="row" style="padding-left: 0px;">
        <!-- Left-side Column Menu Section -->
        <nav class="col-sm-2">
          <ul class="nav nav-pills flex-column">
            <?php include("nav.php"); ?>
          </ul>
        </nav>

        <!-- Center Column Content Section  -->
        <div class="col-sm-8">
          <h2 class="text-center">These are the registered users!</h2>
          <p>
            <?php
              try {
                // Thus script retrieves all the records from the users table.
                require('includes/mysqli_connect.php');   //Connect to the database.

                // Make the query.
                // Nothing passed from user safe query.
                $query = "SELECT CONCAT(last_name, ', ', first_name) AS name, DATE_FORMAT(registration_date, '%M %d, %Y') AS regdat FROM users ORDER BY registration_date ASC";
                $result = mysqli_query($dbcon, $query);   //Run the query.

                if ($result) { //IF IT RAN ok, DISPLAY THE RECORDS.
                  // Table header.
                  echo "<table class='table table-stripped'> <tr><th scope='col'>Name</th><th scope='col'>Date Registered</td></tr>";

                  //Fetch and print all records.
                  while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    echo '<tr><td>' . $row['name'] . '</td><td>' . $row['regdat'] . '</td></tr>';
                  }
                  echo '</table>'; // Close the table so that it is ready for displaying.
                  mysqli_free_result ($result); // Free up the resources.
                }
                else { //if it did not run OK.
                  //Error message.
                  echo '<p class="error">The current users could not be retrieved. We apologize';
                  echo "for any inconvenience.</p>";
                  //Debug message:
                  // echo '<p>'.mysqli_error($dbcon).'<br><br>Query: '.$q.'<p>';
                  exit;
                }
                mysqli_close($dbcon);  //Close the database

              } catch (\Exception $e) {  //We finally handle any problem here.
                // print "An Exception occurred. Message: " . $e->getMessage();
                print "The system is busy please try later";
              }
              catch(Error $e){
                //print "An Error occurred. Message: " . $e->getMessage();
                print "The system is busy please try again later.";
              }

            ?>
          </p>
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
