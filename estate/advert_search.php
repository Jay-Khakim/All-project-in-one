<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['user_level']) || ($_SESSION['user_level'] !=1)) {
  header("Location: login.php");
  exit();
}
?>
<html lang="en">
<head>
  <title>Admin Search Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS File -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="transparent.css">
  <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
<div class="container" style="margin-top:30px">
<!-- Header Section -->
<header>
<?php include('includes/header_4btn.php'); ?>
</header>
<!-- Body Section -->
<div class="content mx-auto" id="contents">
  <div class="row " style="padding: 0px;">
    <div class="col-sm-10">
      <form class="" action="found_houses.php" name="find" id="find" method="post">
        <!-- Start of the text field -->
        <div class="form-group row">
          <label for="" class="col-sm-4 col-form-label text-right"></label>
          <div class="col-sm-8 text-center">
            <h3>Search for a record</h3>
            <h5>Enter the Reference Number</h5>
            <h5>
              <?php
                if (!empty($errorstring)) {
                  echo $errorstring;
                }
              ?>
            </h5>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-sm-2"></div>
          <label for="ref_number" class="col-sm-4 col-form-label text-right">Reference Number: </label>
          <div class="col-sm-4">
            <input type="num" class="form-control" id="ref_number" name="ref_number" placeholder="Reference Number" maxlength="30"  title="Numbers only max of 30 characters" value="<?php if (isset($_POST['ref_number'])) echo htmlspecialchars($_POST['ref_number'], ENT_QUOTES); ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-4 col-form-label"></label>
          <div class="col-sm-8 text-center">
            <input type="submit" id="submit" class="btn btn-primary" name="submit" value="Search">
          </div>
        </div>

      </form>
    </div>
  </div>
</div>
<div class="row mx-auto" style="padding-left: 0px; height: auto;">
<div class="col-sm-12 text-center" style="padding:0px; margin-top: 5px;">
<footer>
<?php include ('includes/footer.php'); ?>
</footer>
</div>
</div>

</body>
</html>
