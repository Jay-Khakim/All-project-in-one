<?php
include "header.php";
 ?>
  <form class="" action="search.php" method="post">
    <input type="text" name="search" placeholder="Search" value="" style="    padding: 0px; width: 300px; height: 40px; font-size: 22px;">
    <button type="submit" name="submit-search" style="    width: 100px;
        height: 44px;
        font-size: 22px;">Search</button>
  </form>

  <h1>Front page</h1>
  <h2>All articles:</h2>

  <div class="article-container" style="  width: 90%; align-content: center; background-color: #fff;
    padding: 30px;">
    <?php
      $sql = "SELECT * FROM article;";
      $result = mysqli_query($conn, $sql);
      $queryResults = mysqli_num_rows($result);

      if ($queryResults >0) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<div class='article-box'>
          <h3>".$row['a_title']."</h3>
          <p>".$row['a_text']."</p>
          <p>".$row['a_author']."</p>
          <p>".$row['a_date']."</p>
          </div>";
        }
      }
    ?>
    <div class="">
      <h3></h3>
    </div>
  </div>
  </body>
</html>
