<!DOCTYPE html>
<html lang="en">
<head>
  <title>Change Password</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS File -->
  <link rel="stylesheet"
  href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
  integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4"
  crossorigin="anonymous">
  <script src="verify.js"></script>
</head>
<body>
<div class="container" style="margin-top:30px">
<!-- Header Section -->
<header class="jumbotron text-center row col-sm-14"
style="margin-bottom:2px; background:linear-gradient(white, #0073e6); padding:20px;">
  <?php include('password-header.php'); ?>
</header>
<!-- Body Section -->
  <div class="row" style="padding-left: 0px;">
<!-- Left-side Column Menu Section -->
  <nav class="col-sm-2">
      <ul class="nav nav-pills flex-column">
		<?php include('nav.php'); ?>
      </ul>
  </nav>
  <!-- Validate Input -->
  <?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   require('process-change-password.php');
  } // End of the main Submit conditional.
  ?>
<div class="col-sm-8">
<h2 class="h2 text-center">Change Password</h2>
<form action="change-password.php" method="post" name="regform" id="regform"
onsubmit="return checked();">
<div class="form-group row">
    <label for="email" class="col-sm-4 col-form-label">E-mail:</label>
    <div class="col-sm-8">
      <input type="email" class="form-control" id="email" name="email"
	  placeholder="E-mail" maxlength="60" required
	  value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="password" class="col-sm-4 col-form-label">Current Password:</label>
    <div class="col-sm-8">
      <input type="password" class="form-control" id="password" name="password"
	  placeholder="Password" minlength="8" maxlength="12" required
	  value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>">
    </div>
  </div>
<div class="form-group row">
    <label for="password1" class="col-sm-4 col-form-label">New Password:</label>
    <div class="col-sm-8">
      <input type="password" class="form-control" id="password1" name="password1"
	  placeholder="Password" minlength="8" maxlength="12" required
	  value="<?php if (isset($_POST['password1'])) echo $_POST['password1']; ?>">
	  <span id='message'>Between 8 and 12 characters.</span>
    </div>
  </div>
<div class="form-group row">
    <label for="password2" class="col-sm-4 col-form-label">Confirm Password:</label>
    <div class="col-sm-8">
      <input type="password" class="form-control" id="password2" name="password2"
	  placeholder="Confirm Password" minlength="8" maxlength="12" required
	  value="<?php if (isset($_POST['password2'])) echo $_POST['password2']; ?>">
    </div>
  </div>
<div class="form-group row">
    <div class="col-sm-12">
	<input id="submit" class="btn btn-primary" type="submit" name="submit"
	value="Change Password">
    </div>
	</div>
	</form>
</div>
<!-- Right-side Column Content Section -->
<?php

 if(isset($errorstring)) {
	 echo '<footer class="jumbotron text-center col-sm-12"
	style="padding-bottom:1px; padding-top:8px;">';
 }
 else
 {
	echo '<aside class="col-sm-2">';
	include('info-col.php');
	echo '</aside>';
	echo '</div>';
	echo '<footer class="jumbotron text-center row col-sm-14"
	style="padding-bottom:1px; padding-top:8px;">';
 }
  include('footer.php');
 ?>
</footer>
</div>
</body>
</html>
