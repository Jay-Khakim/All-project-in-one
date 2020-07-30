<?php
// Start the session.
session_start() ;
// Redirect if not logged in.
if ( !isset( $_SESSION[ 'member_id' ] ) )
{ header("Location: login.php");
exit(); }
$menu = 7;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>View Postings Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS File -->
  <link rel="stylesheet"
  href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
  integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4"
  crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="birds.css">
</head>
<body>
<div class="container" style="margin-top:30px;border: 2px black solid;">
<!-- Header Section -->
<header class="jumbotron text-center row" id="includeheader"
style="margin-bottom:2px; background:linear-gradient(#0073e6, white); padding:10px;">
  <?php include('includes/header.php'); ?>
</header>
<div id='content'><!--Start of the quotes found page content-->
<?php
// Connect to the database
require ( 'mysqli_connect.php' ) ;
	$user_name = filter_var( $_SESSION['user_name'], FILTER_SANITIZE_STRING);
	// Make the full text query
	$query = "SELECT user_name,post_date,subject,message FROM forum WHERE user_name = ? ";
	$query .= "ORDER BY post_date ASC";
    $q = mysqli_stmt_init($dbcon);
    mysqli_stmt_prepare($q, $query);
    // bind $id to SQL Statement
	mysqli_stmt_bind_param($q, "s", $user_name);
    // execute query
    mysqli_stmt_execute($q);
    $result = mysqli_stmt_get_result($q);
	if (mysqli_num_rows($result) > 0) {
		echo '<h4 class="text-center">Your Postings</h4>';
		?>
		<table class="table table-responsive table-striped col-sm-12"
			style="background: white;color:black; padding-left: 40px;">
			<tr>
				<th scope="col">Posted By</th>
				<th scope="col">Forum</th>
				<th scope="col">Quotation</th>
			</tr>
		<?php
		while ( $row = mysqli_fetch_array( $result, MYSQLI_ASSOC ))
		{
			$user_name = htmlspecialchars($row['user_name'], ENT_QUOTES);
			$post_date = htmlspecialchars($row['post_date'], ENT_QUOTES);
			$subject = htmlspecialchars($row['subject'], ENT_QUOTES);
			$message = htmlspecialchars($row['message'], ENT_QUOTES);
			echo '<tr>
				<td scope="row">' . $user_name . " " . $post_date . '</td>
				<td scope="row">' . $subject . '</td>
				<td scope="row">' . $message . '</td>
				</tr>';
		}
		echo '</table>' ;
	}
else { echo '<p class="text-center">There are currently no messages.</p>' ; }
mysqli_close( $dbcon ) ;
?>
</div><!--End of the quotes found page content.-->
<footer class="jumbotron row mx-auto" id="includefooter"
style="padding-bottom:1px; margin: 0px; padding-top:8px; background-color:white;">
<div class="col-sm-12 text-center">
  <?php include('includes/footer.php'); ?>
  </div>
</footer>
</div>
</body>
</html>
