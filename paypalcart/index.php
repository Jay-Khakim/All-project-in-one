<?php
$menu = 7;
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>PayPalCart Index Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS File -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="transparent.css">
  </head>
  <body>
    <div class="container" style="margin-top: 10px;">
      <!-- Header Section  -->
      <header class="jumbotron text-center row mx-auto" id="includeheader">
        <?php include('includes/header.php'); ?>
      </header>
      <!-- Body Section  -->
      <div class="content mx-auto " id="contents">
        <div class="row mx-auto" style="padding-left: 20px; height: auto;">

          <!--Center Column Content Section -->
          <div class="col-sm-6 text-center " style="padding: 0px; margin-top: 5px;">
              <!-- Start of found paintings content  -->
              <form class="" action="found_paintings.php" method="post">

                <div class="form-group row">
                  <div class="col-sm-10 text-left" style="padding: 20px; padding-left: 30px;">
                    <h3>Welcome to the Dove Gallery</h3>
                    <h6 style="color: black;"><b>All prices include frames, sales tax, delivery and insurance</b></h6>
                    <h2 class="text-center "> Search for a painting</h2>
                  </div>
                  <div class="col-sm-6">

                  </div>
                </div>

                <div class="form-group row">
                  <label for="type" class="col-sm-3 col-form-label text-right">Type: </label>
                  <div class="col-sm-6">
                    <select class="form-control"  name="type" id="type">
                      <option selected value="">-Select-</option>
                      <option value="still-life">Still Life</option>
                      <option value="nature">Nature</option>
                      <option value="abstract">Abstract</option>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                    <label for="price" class="col-sm-3 col-form-label text-right">Maximum Price: </label>
                    <div class="col-sm-6">
                      <select id="price" name="price" class="form-control">
                        <option selected value="">- Select -</option>
                        <option value="40">&dollar;40</option>
                        <option value="80">&dollar;80</option>
                        <option value="800">&dollar;800</option>
                    </div>
                </div>

                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label"></label>
                  <div class="col-sm-6">
                    <input type="submit" id="submit" name="submit" class="btn btn-primary" value="Submit">
                  </div>
                </div>
              </form>
          </div>
          <div class="col-sm-3 text-center" style="padding: 0px; margin-top: 5px; ">
            <img src="images/k-copper-kettle-300.jpg" class="img-fluid float-left" style="margin-top: 20px;" alt="Copper Kettle by James Kessell">
          </div>
          <aside class="col-sm-3" id="includemenu">
            <?php include("includes/menu.php"); ?>
          </aside>
        </div>

        <div class="form-group row">
          <label for="" class="col-sm-8"></label>
          <div class="col-sm-8">
            <footer class="jumbotron row" id="includefooter"> <?php include("includes/footer.php"); ?></footer>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
