<?php
  require "header.php";
 ?>
    <main class="main">
      <div class="wrapper-main">
          <section class="section-default">
              <h1>Sign Up</h1>
              <?php
              if (isset($_GET['error'])) {
                if ($_GET['error'] == 'emptyfields') {
                  echo "<p style='color: red;'>Fill in all fields!</p>";
                }
                else if ($_GET['error'] == 'invalidmailuid') {
                  echo "<p style='color: red;'>Invalid username and e-mail!</p>";
                }
                else if ($_GET['error'] == 'invalidmail') {
                  echo "<p style='color: red;'>Invalid E-mail!</p>";
                }
                else if ($_GET['error'] == 'invaliduid') {
                  echo "<p style='color: red;'>Invalid Username</p>";
                }
                else if ($_GET['error'] == 'passwordcheck') {
                  echo "<p style='color: red;'>Your password do not match!</p>";
                }
                else if ($_GET['error'] == 'usertaken') {
                  echo "<p style='color: red;'>Username is already taken!</p>";
                }
              }
              else if ($_GET['result '] == 'success') {
                echo "<p style='color: green;'>Signup successful!</p>";
              }
              ?>
              <form class="form-signup" action="includes/signup.inc.php" method="post">
                  <input type="text" name="uid" placeholder="Username">
                  <input type="text" name="mail" placeholder="E-mail">
                  <input type="password" name="pwd" placeholder="Password">
                  <input type="password" name="pwd-repeat" placeholder="Repeat password">
                  <button type="submit" name="signup-submit">Sign Up!</button>

              </form>
          </section>
      </div>
    </main>

<?php
  require "footer.php";
 ?>
