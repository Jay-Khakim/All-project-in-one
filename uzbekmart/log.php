<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Log</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="verify.js"></script>
  </head>
  <body>
    <div class="container">
      <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {                               //#1
          require('process-login.php');
        } // End of the main Submit conditional.
      ?>
      <div class="col-sm-8">
        <h2 class="h2">Login</h2>
        <form  action="log.php"  name="loginform" id="loginform " method="post">

          <div class="form-group row">
            <!-- <label for="login" class="col-sm-4 col-form-label">Login</label> -->
            <div class="col-sm-8">
              <input type="text" name="username" id="username" placeholder="Username" pattern="[A-Za-z0-9]{5,}" title="Letters, numbers and more than 5 characters" value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>"><br>
              <span>Letters, numbers and more than 5 characters</span>
            </div>
          </div>

          <div class="form-group row">
            <!-- <label for="password" class="col-sm-4 col-form-label">Password</label> -->
            <div class="col-sm-8">
              <input type="password" name="password" id="password" placeholder="Password" pattern="[A-Za-z0-9]{6,}" title="Letters, numbers and more than 6 characters"  value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>"><br>
              <span>Letters, numbers and more than 6 characters</span>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-12">
              <input type="submit" class="btn btn-primary" id="submit" name="submit" value="Login">
            </div>
          </div>
        </form>
      </div>

    </div>
  </body>
</html>
