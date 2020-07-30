<?php
// Start the session
session_start();
// Redirect if not logged in.
if(!isset($_SESSION['member_id'])){
  header("Location: login.php");
  exit();
}
$menu = 4;
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Thank You Page</title>
     <meta name="viewport" content= "width=device-width, initial-scale=1, shrink-to-fit=no">
     <!-- Bootstrap CSS File -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
     <link rel="stylesheet" type="text/css" href="msgboard.css">
   </head>
   <body>
     <div class="container" style="margin-top: 30px; border: 2px black solid;">

       <!-- Header Section  -->
       <header class="jumbotron text-center row" id="includeheader" style="margin-bottom: 2px; background: linear-gradient(#0073e6, white); padding: 10px;">
         <?php include('includes/header.php'); ?>
       </header>

       <!-- Body Section  -->
       <div class="content mx-auto" id="contents">
         <div class="row mx-auto" style="padding-left: 0px; height: auto;">
           <div class="col-sm-12">
             <h4 class="text-center">Thanks for logging in. Chose a form the menu above.</h4>
         </div>
         <footer class="jumbotron row mx-auto" id=" includefooter" style="padding-bottom: 1px; margin: 0px; padding-top: 8px; background-color: white;">
           <div class="col-sm-12 text-center">
             <?php include("includes/footer.php"); ?>
           </div>
         </footer>
       </div>
     </div>
   </body>
 </html>
