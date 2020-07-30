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
        <?php include('header-admin.php'); ?>
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
          <h2 class="text-center">Search for a record</h2>
          <h6 class="text-center"> Both names are required items</h6>
          <form class="" action="view_found_record.php" method="post">
            <div class="form-group row">
              <label for="first_name" class="col-sm-4 col-form-label" >First Name:</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" maxlength="30" required value="<?php if (isset($_POST['first_name'])) echo htmlspecialchars($_POST['first_name'], ENT_QUOTES); ?>">
              </div>
            </div>

            <div class="form-group row">
              <label for="last_name" class="col-sm-4 col-form-label" >Last Name:</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="First Name" maxlength="40" required value="<?php if (isset($_POST['last_name'])) echo htmlspecialchars($_POST['last_name'], ENT_QUOTES); ?>">
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
            include('info-col.php');
            echo '</aside>';
            echo '</div>';
            echo '<footer class="jumbotron text-center row col-sm-14" style="padding-bottom:1px; padding-top:8px;">';
          }
          else {
            echo '<footer class="jumbotron text-center col-sm-12" style="padding-bottom:1px; padding-top:8px;">';
          }
          include('footer.php');
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
