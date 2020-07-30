<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Template for an interactive web page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="verify.js"></script>
  </head>
  <body>
    <div class="container" style="margin-top: 30px">

      <!-- Header section -->
      <header class="jumbotron text-center row" style="margin-bottom:2px; background: linear-gradient(#e66465, #9198e5); padding:20px;">
        <?php include('header.php'); ?>
      </header>

      <!-- Body section -->
      <div class="row" style="padding-left: 0px;">
        <!-- Left-side Column Menu Section -->
        <nav class="col-sm-2">
          <ul class="nav nav-pills flex-column">
            <?php include("nav.php"); ?>
          </ul>
        </nav>

        <!-- Validate Input -->
        <?php
          if ($_SERVER['REQUEST_METHOD']== 'POST') {
            require('process-register-page.php');
          }//End of the main Submit conditional
         ?>
         <div class="col-sm-8">
           <h2 class="h2 text-center">Register</h2>
           <form class="register" action="register-page.php" method="post" onsubmit="return checked();">
             <div class="form-group row">
               <label for="first_name" class="col-sm-4 col-form-label">First Name: </label>
               <div class="col-sm-8">
                 <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" maxlength='30' required value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>">
               </div>
             </div>

             <div class="form-group row">
               <label for="last_name" class="col-sm-4 col-form-label">Last Name: </label>
               <div class="col-sm-8">
                 <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" maxlength='40' required value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>">
               </div>
             </div>

             <div class="form-group row">
               <label for="email" class="col-sm-4 col-form-label"> E-mail: </label>
               <div class="col-sm-8">
                 <input type="text" class="form-control" id="email" name="email" placeholder=" E-mail" maxlength='60' required value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
               </div>
             </div>

             <div class="form-group row">
               <label for="password1" class="col-sm-4 col-form-label"> Password: </label>
               <div class="col-sm-8">
                 <input type="password" class="form-control" id="password1" name="password1" placeholder=" Password" minlength="8" maxlength='12' required value="<?php if (isset($_POST['password1'])) echo $_POST['password1']; ?>">
                 <span id="message">Between 8 and 12 characters.</span>
               </div>
             </div>

             <div class="form-group row">
               <label for="password2" class="col-sm-4 col-form-label">Confirm Password: </label>
               <div class="col-sm-8">
                 <input type="password" class="form-control" id="password2" name="password2" placeholder="Confirm Password" minlength="8" maxlength='12' required value="<?php if (isset($_POST['password2'])) echo $_POST['password2']; ?>">
                 <span id="message">Between 8 and 12 characters.</span>
               </div>
             </div>

             <div class="form-group row">
               <div class="col-sm-12">
                 <input id="submit" class="btn btn-primary" type="submit" name="submit" value="Register">
               </div>
             </div>

           </form>
         </div>

         <!-- Right-side Column Content Section -->
         <?php
         if (!isset($errorstring)) {
           echo "<aside class='col-sm-2'>";
           include('info-col.php');
           echo '</aside>';
           echo "</div>";
           echo "<footer class='jumbotron text-center row col-sm-14' style='padding-bottom:1px; padding-top:8px;'>";
         }
         else {
           echo "<footer class='jumbotron text-center col-sm-12' style='padding-bottom:1px; padding-top:8px;'>";
         }
         include('footer.php');
        ?>
  </body>
</html>
