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
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <meta name="robots" content="noindex, follow" />
      <meta name="description" content="It is the first in Uzbekistan - an online showroom of the Association of Exporters of Uzbekistan.">
      <meta name="author" content="Utkurov_Mahmudjon">
      <meta name="keywords" content="Export , Import , e-commerce , Association , Trade , Tashkent , Online market , showroom , shopping , online store , online business , shopping cart">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS File  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/logo.png">
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/vendor/font-awesome.css">
    <link rel="stylesheet" href="assets/css/vendor/fontawesome-stars.css">
    <link rel="stylesheet" href="assets/css/vendor/ion-fonts.css">
    <link rel="stylesheet" href="assets/css/plugins/slick.css">
    <link rel="stylesheet" href="assets/css/plugins/animate.css">
    <link rel="stylesheet" href="assets/css/plugins/jquery-ui.min.css">
    <link rel="stylesheet" href="assets/css/plugins/lightgallery.min.css">
    <link rel="stylesheet" href="assets/css/plugins/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">
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
          <h2 class="text-center">View Companies!</h2>
          <?php
          require ("process_view.php");
          ?>
          <!-- <div class="single_product">
            <div class="product-img">
                <a href="company/local/l1.html" tabindex="0">
                    <img class="primary-img" src="assets/images/company/local/01.jpg" alt="Hiraola's Product Image">
                </a>
                <span class="sticker">Top</span>
            </div>
            <div class="hiraola-product_content">
                <div class="product-desc_info">
                    <h6 align="center"><a class="product-name" href="company/local/l1.html" tabindex="0">LLC “FARPRIDE UNITY”</a></h6>
                    <div class="additional-add_action">
                        <ul>
                            <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="" tabindex="0" data-original-title="Quick View"><i class="ion-eye"></i></a></li>
                        </ul>
                    </div>
                    <div class="rating-box">
                        <ul>
                            <li><i class="fa fa-star-of-david"></i></li>
                            <li><i class="fa fa-star-of-david"></i></li>
                            <li><i class="fa fa-star-of-david"></i></li>
                            <li><i class="fa fa-star-of-david"></i></li>
                            <li class="silver-color"><i class="fa fa-star-of-david"></i></li>
                        </ul>
                    </div>
                </div>
            </div> -->
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

    <!-- JS
============================================ -->

    <!-- jQuery JS -->
    <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
    <!-- Modernizer JS -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <!-- Popper JS -->
    <script src="assets/js/vendor/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="assets/js/vendor/bootstrap.min.js"></script>

    <!-- Slick Slider JS -->
    <script src="assets/js/plugins/slick.min.js"></script>
    <!-- Countdown JS -->
    <script src="assets/js/plugins/countdown.js"></script>
    <!-- Barrating JS -->
    <script src="assets/js/plugins/jquery.barrating.min.js"></script>
    <!-- Counterup JS -->
    <script src="assets/js/plugins/jquery.counterup.js"></script>
    <!-- Nice Select JS -->
    <script src="assets/js/plugins/jquery.nice-select.js"></script>
    <!-- Sticky Sidebar JS -->
    <script src="assets/js/plugins/jquery.sticky-sidebar.js"></script>
    <!-- Jquery-ui JS -->
    <script src="assets/js/plugins/jquery-ui.min.js"></script>
    <script src="assets/js/plugins/jquery.ui.touch-punch.min.js"></script>
    <!-- Lightgallery JS -->
    <script src="assets/js/plugins/lightgallery.min.js"></script>
    <!-- Scroll Top JS -->
    <script src="assets/js/plugins/scroll-top.js"></script>
    <!-- Theia Sticky Sidebar JS -->
    <script src="assets/js/plugins/theia-sticky-sidebar.min.js"></script>
    <!-- Waypoints JS -->
    <script src="assets/js/plugins/waypoints.min.js"></script>
    <!-- Instafeed JS -->
    <script src="assets/js/plugins/instafeed.min.js"></script>
    <!-- Instafeed JS -->
    <script src="assets/js/plugins/jquery.elevateZoom-3.0.8.min.js"></script>

  </body>
</html>
