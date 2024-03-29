
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
        <?php include('thanks-header.php'); ?>
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
        <div class="col-sm-8 text-center">
        <h2>Thank you for your registration!</h2>
       On the Home Page, you will now be able to login to your account!
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
