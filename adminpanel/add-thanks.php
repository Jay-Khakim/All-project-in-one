<?php
session_start();
if ($_SESSION['user_level'] !==1 ) {
  header("Location: index.php" );
  exit();
}

$header = 1;
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin Panel!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS File  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="container" style="margin-top: 30px">

      <!-- Header section -->
      <header >
        <?php include('includes/header.php'); ?>
      </header>

      <!-- Body section -->
      <div class="row" style="padding-left: 0px;">
        <!-- Left-side Column Menu Section -->
        <!-- <nav class="col-sm-2">
          <ul class="nav nav-pills flex-column">
            <?php include("includes/nav.php"); ?>
          </ul>
        </nav> -->

        <!-- Center Column Content Section  -->
        <div class="col-sm-12">
          <h2 class="text-center">A New Company Sucessfully Added!</h2>
        </div>

        <!-- Right Side Column Content Section -->
        <!-- <aside class="col-sm-2">
          <?php include('includes/info-col.php'); ?>
        </aside> -->
      </div>

      <!-- Footer Content Section! -->
      <footer>
        <?php include('includes/footer.php'); ?>
      </footer>
    </div>
  </body>
</html>
