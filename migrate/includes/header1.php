<div class="col-sm-2">
  <img src="img-fluid float-left" src="img/logo.jpg" alt="logo">
</div>
<div class="col-sm-8">
  <h1 class="blue-text mb-4 font-bold"> Header goes here</h1>
</div>
<nav class="col-sm-2">
  <div class="btn-group-vertical btn-group-sm" role="group" ara-label="Button Group">
    <div class="btn-group-vertical btn-group-sm" role="group" ara-label="Button Group">
    <!-- Case statement to determine which buttons to display   -->
    <?php switch ($menu) {
      case 1: //header.php
        ?>
        <button type="button" class="btn btn-secondary" onclick="location.href = 'login.php'" name="button">Login</button>
        <button type="button" class="btn btn-secondary" onclick="location.href = 'safer-register.php'" name="button">Register</button>
        <?php
        break;
        case 2: //header_members_account.php
        ?>
        <button type="button" class="btn btn-secondary" onclick="location.href = 'logout.php'" name="button">Logout</button>
        <button type="button" class="btn btn-secondary" onclick="location.href = 'edit_your_account.php'" name="button">Your Account</button>
        <button type="button" class="btn btn-secondary" onclick="location.href = 'safer-register-password.php'" name="button">New Password</button>
        <?php
        break;
        case 3: //header-thanks.php
        ?>
        <button type="button" class="btn btn-secondary" onclick="location.href = 'index.php'" name="button">Home</button>
        <?php
        break;
        case 4: //login-getallheaders.php
        ?>
        <button type="button" class="btn btn-secondary" onclick="location.href = 'login.php'" name="button">Erase Entries</button>
        <button type="button" class="btn btn-secondary" onclick="location.href = 'safer-register-page.php'" name="button">Register</button>
        <button type="button" class="btn btn-secondary" onclick="location.href = 'index.php'" name="button">Cancel</button>
        <?php
          break;

        case 5: //members-header.php
        ?>
        <button type="button" class="btn btn-secondary" onclick="location.href = 'logout.php'" name="button">logout</button>
        <button type="button" class="btn btn-secondary" onclick="location.href = 'change-password.php'" name="button">New Password</button>
        <?php
          break;

        case 6: //password-header.php
        ?>
        <button type="button" class="btn btn-secondary" onclick="location.href = 'register-password.php'" name="button">Erase Entries</button>
        <button type="button" class="btn btn-secondary" onclick="location.href = 'index.php'" name="button">Cancel</button>
        <?php
          break;
        case 7: //password-header.php
        ?>
        <button type="button" class="btn btn-secondary" onclick="location.href = 'index.php'" name="button">Home Page</button>
        <?php
          break;

        case 8: //thankyou-header.php
        ?>
        <button type="button" class="btn btn-secondary" onclick="location.href = 'index.php'" name="button">Home Page</button>
        <?php
          break;

        case 9: //register-header.php
        ?>
        <button type="button" class="btn btn-secondary" onclick="location.href = 'register-page.php'" name="button">Erase Your Entries</button>
        <button type="button" class="btn btn-secondary" onclick="location.href = 'index.php'" name="button">Cancel</button>
        <?php
          break;
        }
        ?>

  </div>
</nav>
