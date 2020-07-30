<?php
session_start();
if (!isset($_SESSION['user_level']) or ($_SESSION['user_level'] !=1)) {
  header("Locaion: login.php");
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
    <script src="verify.js"></script>
  </head>
  <body>
    <div class="container" style="margin-top: 30px">

      <!-- Header section -->
      <header class="jumbotron text-center row" style="margin-bottom:2px; background: linear-gradient(#e66465, #9198e5); padding:20px;">
        <?php include('includes/login-header.php'); ?>
      </header>

      <!-- Body section -->
      <div class="row" style="padding-left: 0px;">
        <!-- Left-side Column Menu Section -->
        <nav class="col-sm-2">
          <ul class="nav nav-pills flex-column">
            <?php include("includes/nav.php"); ?>
          </ul>
        </nav>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          require("process_view_found_address.php");
        } //End of the main Submit conditional.
        ?>

        <div class="col-sm-8">
          <div class="h2 text-center">
            <h5>Search for Address or Phone Number</h5>
            <h5 style="color: red; ">Both Names are required items</h5>
          </div>

          <form class="" action="view_found_address.php" method="post" name="searchform" id="searchform">
            <div class="form-group row">
              <label for="first_name" class="col-sm-4 col-form-label" >First Name:</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" maxlength="30" required value="<?php if (isset($_POST['first_name'])) echo htmlspecialchars($_POST['first_name'], ENT_QUOTES); ?>">
              </div>
            </div>

            <div class="form-group row">
              <label for="last_name" class="col-sm-4 col-form-label" >Last Name:</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" maxlength="40" required value="<?php if (isset($_POST['last_name'])) echo htmlspecialchars($_POST['last_name'], ENT_QUOTES); ?>">
              </div>
            </div>

            <div class="form-group row">
              <label for="" class="col-sm-4 col-form-label" ></label>
              <div class="col-sm-8">
                <input type="submit" class="btn btn-primary" id="sumit" name="submit" value="Search">
              </div>
            </div>

          </form>
        </div>

        <!-- Right Side Column Content Section -->
        <?php
          if (!isset($errorstring)) {
            echo '<aside class="col-sm-2">';
            include('includes/info-col.php');
            echo '</aside>';
            echo '</div>';
            echo '<footer class="jumbotron text-center row col-sm-14" style="padding-bottom:1px; padding-top:8px;">';
          }
          else {
            echo '<footer class="jumbotron text-center col-sm-12" style="padding-bottom:1px; padding-top:8px;">';
          }
          include('includes/footer.php');
        ?>
        <!-- <aside class="col-sm-2">
          <?php include('info-col.php'); ?>
        </aside>
      </div> -->

      <!-- Footer Content Section! -->

      </footer>
    </div>
  </body>
</html>
