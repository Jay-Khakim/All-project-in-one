
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-light border-bottom shadow-sm">
  <?php
  switch ($header) {
    case 1:
      ?>
      <h5 class="my-0 mr-md-auto font-weight-normal">Admin of Uzbekmart </h5>
      <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="view.php">View Companies</a>
        <a class="p-2 text-dark" href="add-page.php">Add</a>
        <!-- <a class="p-2 text-dark" href="#">Pricing</a> -->
      </nav>
      <a class="btn btn-outline-primary" href="logout.php">Log out</a>
      <?php
      break;
      case 3:
        ?>
        <h5 class="my-0 mr-md-auto font-weight-normal">Admin of Uzbekmart </h5>
        <nav class="my-2 my-md-0 mr-md-3">
          <a class="p-2 text-dark" href="view.php">View Companies</a>
          <a class="p-2 text-dark" href="adminpanel.php">Admin Page</a>
          <!-- <a class="p-2 text-dark" href="#">Pricing</a> -->
        </nav>
        <a class="btn btn-outline-primary" href="logout.php">Log out</a>
        <?php
        break;
  }
  ?>
  <!-- <h5 class="my-0 mr-md-auto font-weight-normal">Admin of Uzbekmart </h5>
  <nav class="my-2 my-md-0 mr-md-3">
    <a class="p-2 text-dark" href="#">Features</a>
    <a class="p-2 text-dark" href="#">Enterprise</a>
    <a class="p-2 text-dark" href="#">Support</a>
    <a class="p-2 text-dark" href="#">Pricing</a>
  </nav>
  <a class="btn btn-outline-primary" href="#">Sign up</a>
</div> -->
