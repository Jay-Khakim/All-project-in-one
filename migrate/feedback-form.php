<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  // require("cap.php");
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Feedback Form!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS File  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <link rel="stylesheet" href="feedback-form.css">
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
            <?php include("includes/nav.php"); ?>
          </ul>
        </nav>

        <!-- Validate Input -->
        <div class="col-sm-8">
          <h3 class="text-center">Contact Us!</h3>
          <h5 class="text-center"> <strong>Address:</strong> 18-28 Sergeli-7, Tashkent, <strong>Tel:</strong> +99890 337 88 56 </h5>
          <h5 class="text-center"> <strong>To email us:</strong> Please use this form and click the Send button at the bottom. </h5>
          <h4 class="text-center"> Essential items are marked with an asterisk</h4>

          <form class="" action="feedback-handler.php" method="post" name="feedbackform" id="feedbackform">
            <!-- Start of text fields -->
            <div class="form-group row">
              <label for="first_name" class="col-sm-4 col-form-label text-right">First Name*:</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="first_name" id="first_name" pattern="[a-zA-Z][a-zA-Z\s]*" title="Alphabetic and space only max of 30 characters" placeholder="First Name" maxlength="30" required value="<?php if (isset($row['first_name'])) echo htmlspecialchars($row['first_name'], ENT_QUOTES); ?>">
              </div>
            </div>

            <div class="form-group row">
              <label for="last_name" class="col-sm-4 col-form-label text-right">Last Name*:</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="last_name" id="last_name" pattern="[a-zA-Z][a-zA-Z\s\-\']*" title="Alphabetic, dash, quote and space only max of 40 characters" placeholder="Last Name" maxlength="40" required value="<?php if (isset($row['last_name'])) echo htmlspecialchars($row['last_name'], ENT_QUOTES); ?>">
              </div>
            </div>

            <div class="form-group row">
              <label for="email" class="col-sm-4 col-form-label text-right">E-mail*:</label>
              <div class="col-sm-8">
                <input type="email" class="form-control" name="email" id="email" placeholder="E-mail" maxlength="60" required value="<?php if (isset($row['email'])) echo htmlspecialchars($row['email'], ENT_QUOTES); ?>">
              </div>
            </div>

            <div class="form-group row">
              <label for="phone" class="col-sm-4 col-form-label text-right">Telephone:</label>
              <div class="col-sm-8">
                <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone NUmber" maxlength="30" value="<?php if (isset($row['phone'])) echo htmlspecialchars($row['phone'], ENT_QUOTES); ?>">
              </div>
            </div>

            <div class="form-group row">
              <label for="" class="col-sm-4 col-form-label - text-right"></label>
              <h5 class="col-sm-8 text-center" > Would you like us to send a Brochure?(check box): </h5>
            </div>
              <div class="form-group row">
                <label for="" class="col-sm-4 col-form-label text-right"></label>
                <div class="checkbox col-sm-8 text-center" >Yes
                  <input type="checkbox" name="brochure" id="brochure" value="yes">
                </div>
              </div>

              <div class="form-group row">
                <label for="" class="col-sm-4 col-form-label text-right"></label>
                <h6 class="col-sm-8 text-center"> Please enter address if you checked the brochure box above</h6>
              </div>

              <div class="form-group row">
                <label for="address1" class="col-sm-4 col-form-label text-right">Address*:</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="address1" id="address1" pattern="[a-zA-Z0-9][a-zA-Z0-9\s\.\,\-]*" title="Alphabetic, numbers, period, comma, dash and space only max of 30 characters" placeholder="Address" maxlength="40" required value="<?php if (isset($row['address1'])) echo htmlspecialchars($row['address1'], ENT_QUOTES); ?>">
                </div>
              </div>

              <div class="form-group row">
                <label for="address2" class="col-sm-4 col-form-label text-right">Address:</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="address2" id="address2" pattern="[a-zA-Z0-9][a-zA-Z0-9\s\.\,\-]*" title="Alphabetic, numbers, period, comma, dash and space only max of 30 characters" placeholder="Address" maxlength="40"  value="<?php if (isset($row['address2'])) echo htmlspecialchars($row['address2'], ENT_QUOTES); ?>">
                </div>
              </div>

              <div class="form-group row">
                <label for="city" class="col-sm-4 col-form-label text-right">City*:</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="city" id="city" pattern="[a-zA-Z][a-zA-Z\s\.]*" title="Alphabetic, period and space only max of 30 characters" placeholder="City" maxlength="40" required value="<?php if (isset($row['city'])) echo htmlspecialchars($row['city'], ENT_QUOTES); ?>">
                </div>
              </div>

              <div class="form-group row">
                <label for="state_country" class="col-sm-4 col-form-label text-right">Country/State*:</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="state_country" id="state_country" pattern="[a-zA-Z][a-zA-Z\s\.]*" title="Alphabetic, period and space only max of 30 characters" placeholder="Country Or State" maxlength="40" required value="<?php if (isset($row['state_country'])) echo htmlspecialchars($row['state_country'], ENT_QUOTES); ?>">
                </div>
              </div>

              <div class="form-group row">
                <label for="zcode_pcode" class="col-sm-4 col-form-label text-right">Country/State*:</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="zcode_pcode" id="zcode_pcode" pattern="[a-zA-Z0-9][a-zA-Z0-9\s]*" title="Alphabetic, period and space only max of 30 characters" placeholder="Zip/Postal code" minlength='5' maxlength="30" required value="<?php if (isset($row['zcode_pcode'])) echo htmlspecialchars($row['zcode_pcode'], ENT_QUOTES); ?>">
                </div>
              </div>

              <div class="form-group row" >
                <label for=" " class="col-sm-4 col-form-label text-right"></label>
                <h5 class="col-sm-8 text-center">Would you like to receive emailed newsletter?</h5>
              </div>
              <fieldset class="form-group row">
                <label for="" class="col-sm-4 col-form-label text-right"></label>
                <div class="col-sm-8 text-center">
                  <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" name="letter" id="letter" value="yes" checked>
                    <label for="letter" class="form-check-label">Yes</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input type="radio"  class="form-check-input" name="noletter" id="noletter" value="no">
                    <label for="noletter" class="form-check-label">No</label>
                  </div>
                </div>
              </fieldset>

              <div class="form-goup row">
                <label class="col-sm-4 col-form-label text-right" ></label>
                <div class="col-sm-8 text-center">
                  <label for="comment">Please enter your message below</label>
                  <textarea name="comment" class="form-control" id="comment" rows="6" cols="20" value="<?php if (isset($_POST['comment'])) echo htmlspecialchars($_POST['comment'], ENT_QUOTES); ?>"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label"></label>
                <div class="col-sm-8">
                  <div class="g-recaptcha" style="margin-left: 80px;" data-sitekey="placeyoursitekeyhere" ></div>
                </div>
              </div>

              <div class="form-group row">
                <label for="" class="col-sm-4 col-form-label"></label>
                <div class="col-sm-8 text-center">
                  <input type="submit" class="btn btn-primary"  name="submit" value="Send">
                </div>
              </div>

          </form>
        </div>

        <!-- Right Side Column Content Section -->
        <aside class="col-sm-2">
          <?php include('includes/info-col.php'); ?>
        </aside>
      </div>

      <!-- Footer Content Section! -->
      <footer class="jumbotron text-center row" style="padding-bottom:1px; padding-top:8px;">
        <?php include('includes/footer.php'); ?>
      </footer>
    </div>
  </body>
</html>
