
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Template for interactive web page!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS File  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  </head>
  <body>
    <div class="container" style="margin-top: 30px">

      <!-- Header section -->
      <header class="jumbotron text-center row" style="margin-bottom:2px; background: linear-gradient(#e66465, #9198e5); padding:20px;">
        <?php include('thanks-header.php'); ?>
      </header>

      <!-- Body section -->
      <div class="row" style="padding-left: 0px;">

        <!-- Left-side Column Menu Section -->
        <nav class="col-sm-2">
          <ul class="nav nav-pills flex-column">
            <?php include("nav.php"); ?>
          </ul>
        </nav>

        <!-- Center Column Content Section  -->
        <div class="col-sm-8 text-center">
        <h2>Thank you for your registration!</h2>
       <h6 class="text-center"> To confirm your registration please verify membership class and pay the membership fee now.</h6>
       <h6 class="text-center"> You can use PayPal or a credit/debit card.</h6>
       <p class="text-center">When you have completed your registration you will be able to loginto the member's only page.</p>
       <?php
        try {
          require("mysqli_connect.php");
          $query = "SELECT * FROM prices ";
          $result = mysqli_query($dbcon, $query); //Run the query
          if ($result) {  //If it ran ok, display the records
            $row = mysqli_fetch_array($result, MYSQLI_NUM);
            $yearsarray = array("Standard one year:", "Standard five year:", "Military one year:", "Standard one year:", "Standard five year:", "Military one year:",);
            echo '<h6 class="text-center text-danger">Membership classes:</h6>';
            echo '<h6 class="text-center text-danger small">';
            for ($j=0, $i=0; $j < 5; $j++, $i=$i+2) {
              echo $yearsarray[$j]."&pound; ". htmlspecialchars($row[$i], ENT_QUOTES). " GB, &dollar; ". htmlspecialchars($row[$i+1], ENT_QUOTES). " US";
              if ($j !=4) {
                if ($j%2 == 0) {
                  echo "</h6><h6 class='text-center text-danger small'>";}
                  else {
                    echo " , ";
                  }
              }
            }
            echo "</h6>";
          }
       ?>
       <p></p>

       <form class="" action="https://www.paypal.com/cgi-bin/webscr" method="post">
         <input type="hidden" name="cmd" value="_s-xclick">
         <input type="hidden" name="hosted_button_id" value="XXXXXXXXXXXXX">
         <div class="form-group row">
           <label for="level" class="col-sm-4 col-form-label">*Membership Class</label>
           <div class="col-sm-8">
             <select class="form-control" id="level" name="level" required>
               <option value="0">-Select-</option>
               <?php
                $class = htmlspecialchars($_GET['class'], ENT_QUOTES);
                for ($j=0, $i=0; $j <5 ; $j++, $i=$i+2) {
                  echo '<option value="' . htmlspecialchars($row[$i], ENT_QUOTES) . '"';
                  if ((isset($class)) && ( $class == $row[$i])){
                       echo ' selected ';
                     }
                     echo ">" . $yearsarray[$j] . " " . htmlspecialchars($row[$i], ENT_QUOTES) . " &pound; GB, " . htmlspecialchars($row[$i + 1], ENT_QUOTES) ."&dollar; US</option>";
                }
               ?>
             </select>
           </div>
         </div>
         <div class="form-group row">
           <label for="" class="col-sm-4 col-form-label"></label>
           <div class="col-sm-8">
             <!-- Replace the code below with code provided by PayPal once you obtain a Merchant ID -->
             <input type="hidden" name="currency_code" value="GBP">
             <input style="margin:10px 0 0 40px" type="image" src="https://www.paypalobjects.com/en_US/GB/i/btn/btn_buynowCC_LG.gif" name="submit" alt="PayPal  The safer, easier way to pay online.">
             <img alt="" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
             <!-- Replace code above with PayPal provided code -->
           </div>
         </div>

       </form>
        </div>
        <!-- Right Side Column Content Section -->
        <aside class="col-sm-2">
          <?php include('info-col-cards.php'); ?>
        </aside>
      </div>

      <!-- Footer Content Section! -->
      <footer class="jumbotron text-center row" style="padding-bottom:1px; padding-top:8px;">
        <?php include('footer.php'); ?>
      </footer>
      <?php
        } // end try
        catch(Exception $e) // We finally handle any problems here
        {
             // print "An Exception occurred. Message: " . $e->getMessage();
             print "The system is busy please try later";
        }
        catch(Error $e)
        {
             //print "An Error occurred. Message: " . $e->getMessage();
             print "The system is busy please try again later.";
        }
        ?>
    </div>
    <!-- <script src="https://www.paypal.com/sdk/js?client-id=sb"></script> -->
    <!-- <script>paypal.Buttons().render('body');</script> -->
  </body>
</html>
