<?php
include 'header.php';
 ?>

<h1>Search page</h1>
<div class="article-container" style="  width: 100%; background-color: #fff; padding: 30px;">
<?php
  if (isset($_POST['submit-search'])) {
    $search = mysqli_real_escape_string($conn, $_POST['search']);

    $sql = "SELECT * FROM article WHERE a_title LIKE '%$search%' OR a_text LIKE '%$search%' OR a_author LIKE '%$search%' OR a_date LIKE '%$search%'";

    $result = mysqli_query($conn, $sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);;
    $queryResults = mysqli_num_rows($result);

    echo "There are ".$queryResults." results!";

    if ($queryResults > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<a href = 'article.php?title=".$row['a_title']."&date=".$row['a_date']."'><div class='article-box'>
        <h3>".$row['a_title']."</h3>
        <p>".$row['a_text']."</p>
        <p>".$row['a_author']."</p>
        <p>".$row['a_date']."</p>
        </div></a>";
      }
    }else {
      echo "There are no results matching your search!";
    }
  }
?>
</div>
