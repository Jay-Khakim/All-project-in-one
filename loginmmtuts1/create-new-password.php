<?php
  require "header.php";
 ?>
<main class="main">
    <div class="wrapper-main">
        <section class="section-default">


          <?php
            $selector = $_GET['selector'];
            $validator = $_GET['validator'];

            if (empty($selector) || empty($validator)) {
              echo "Could not validate your request!";
            } else {
              if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
                ?>

                <h1>Create a new password!</h1>
                <?php
                  if (isset($_GET['newpwd'])) {
                    if ($_GET['newpwd']== 'empty') {
                      echo "<p style='color: red;'>Please fill in all fields</p>";
                    }
                  }
                ?>
                <form action="includes/reset-password.inc.php" method="post">
                  <input type="hidden" name="selector" value= "<?php echo $selector; ?>">
                  <input type="hidden" name="validator" value= "<?php echo $validator; ?>">
                  <input class="input" type="password" name="pwd" placeholder="Enter a new password...">
                  <input class="input" type="password" name="pwd-repeat" placeholder="Repeat  new password">
                  <button type="submit" name="reset-password-submit">Reset</button>
                </form>
                <?php
              }
            }
          ?>
        </section>
    </div>
</main>

<?php
  require "footer.php";
 ?>
