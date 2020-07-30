
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Error Message!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS File  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  </head>
  <body>
    <div class="container" style="margin-top: 30px">

      <!-- Header section -->
      <header class="jumbotron text-center row" style="margin-bottom:2px; background: linear-gradient(#e66465, #9198e5); padding:20px;">
        <?php include('../includes/thankyou-header.php'); ?>
      </header>

      <!-- Body section -->
      <div class="row" style="padding-left: 0px;">
        <!-- Left-side Column Menu Section -->
        <nav class="col-sm-2">
          <ul class="nav nav-pills flex-column">
            <?php include("../includes/nav.php"); ?>
          </ul>
        </nav>

        <!-- Center Column Content Section  -->
        <div class="col-sm-8">
          <h4 class="text-center"> One or more of the essentiona items in the form has not been filled in.</h4>
          <h4 class="text-center">Essential items have an asterisk like this <span>*</span> </h4>
          <h4 class="text-center"> Return to the form by clicking the back button on your browser <br> and then fill in the missing items. </h4>
        </div>

        <!-- Right Side Column Content Section -->
        <aside class="col-sm-2">
          <?php include('../includes/info-col.php'); ?>
        </aside>
      </div>

      <!-- <div class="row col-sm-12" style="padding-left: 0px; padding-bottom: 20px;">
        <div class="col-sm-5"></div>
        <nav class="col-sm-4 text-center">
          <ul class="nav- nav-pills">
            <li class="nav-item"> <a class="nav-link acitve" href="../index.php">Return to Home Page</a> </li>
          </ul>
        </nav>
      </div> -->

      <!-- Footer Content Section! -->
      <footer class="jumbotron text-center row" style="padding-bottom:1px; padding-top:8px;">
        <?php include('../includes/footer.php'); ?>
      </footer>
    </div>
  </body>
</html>
