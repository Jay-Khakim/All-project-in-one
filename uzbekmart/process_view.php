<?php

try {
  // This script retrieves all the records from the company table
  require('mysqli_connect.php');
  //set the number of rows per display page
  $pagerows = 10;
  // Has the total number of pagess already been calculated?
  if ((isset($_GET['p']) && is_numeric($_GET['p']))) { //already been calculated
  	$pages = htmlspecialchars($_GET['p'], ENT_QUOTES);
    // make sure it is not executable XSS
  }else{
    //use the next block of code to calculate the number of pages
    //First, check for the total number of records
    $q = "SELECT COUNT(id) FROM company";
    $result = mysqli_query ($dbcon, $q);
    $row = mysqli_fetch_array ($result, MYSQLI_NUM);
    $records = htmlspecialchars($row[0], ENT_QUOTES);
    // make sure it is not executable XSS
    //Now calculate the number of pages

    if ($records > $pagerows){
      //if the number of records will fill more than one page
      //Calculate the number of pages and round the result up to the nearest integer
      $pages = ceil ($records/$pagerows);
    }else {
      $pages = 1;
    }
  }
  //page check finished
  //Declare which record to start with
  if ((isset($_GET['s'])) &&( is_numeric($_GET['s'])))
  {
  $start = htmlspecialchars($_GET['s'], ENT_QUOTES);
  // make sure it is not executable XSS
  }else{
  $start = 0;
  }
  $query = "SELECT id, name, sort, company_type, website FROM company ORDER BY sort DESC LIMIT ?, ? ";
  $q = mysqli_stmt_init($dbcon);
  mysqli_stmt_prepare($q, $query);

  // bind $id to SQL Statement
  mysqli_stmt_bind_param($q, "ii", $start, $pagerows);

  // execute query

  mysqli_stmt_execute($q);

  $result = mysqli_stmt_get_result($q);
  if ($result){
    // If it ran OK (records were returned), display the records.
  //   echo '<div class="single_product">
  //     <div class="product-img">
  //         <a href="view-company.php?'.$company_id.'" tabindex="0">
  //             <img class="primary-img" src="'.$image.'" alt="'.$name.'">
  //         </a>
  //         <span class="sticker">Top</span>
  //     </div>
  //     <div class="hiraola-product_content">
  //         <div class="product-desc_info">
  //             <h6 align="center"><a class="product-name" href="view-company.php?'.$company_id.'" tabindex="0">'.$name.'</a></h6>
  //             <div class="additional-add_action">
  //                 <ul>
  //                     <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="" tabindex="0" data-original-title="Quick View"><i class="ion-eye"></i></a></li>
  //                 </ul>
  //             </div>
  //             <div class="rating-box">
  //                 <ul>';
  //                 for ($i=0; $i <$sort; $i++) {
  //                   echo '<li><i class="fa fa-star-of-david"></i></li>';
  //                 }
  //                 for ($i=0; $i < 5-$sort; $i++) {
  //                   echo '<li class="silver-color"><i class="fa fa-star-of-david"></i></li>';
  //                 }
  //                     // <li><i class="fa fa-star-of-david"></i></li>
  //                     // <li><i class="fa fa-star-of-david"></i></li>
  //                     // <li><i class="fa fa-star-of-david"></i></li>
  //                     // <li><i class="fa fa-star-of-david"></i></li>
  //                     // <li class="silver-color"><i class="fa fa-star-of-david"></i></li>
  //                 echo "</ul>
  //             </div>
  //         </div>
  //     </div>
  // </div>";
  ?>
  <!-- <div class="hiraola-product_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="hiraola-section_title">
                            <h4>Local Companies</h4>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="hiraola-product_slider slick-initialized slick-slider"><button class="slick-prev slick-arrow" style="display: block;"><i class="ion-ios-arrow-back"></i></button>
                        <div class="slick-list draggable">
                          <div class="slick-track" style="opacity: 1; width: 3840px; transform: translate3d(-960px, 0px, 0px);"> -->


<div class="container" style="width: 100%; height: 350px; border: 2px solid lightgrey; display: flex; flex-wrap: wrap;">
  <?php
    echo '<table class="table table-striped">
        <tr>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
        <th scope="col">Details</th>
        <th scope="col">Company Name</th>
        <th scope="col">Sort</th>
        <th scope="col">Company type</th>
        <th scope="col">Url</th>
        </tr>';
  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
    // Remove special characters that might already be in table to
    // reduce the chance of XSS exploits
    $company_id = htmlspecialchars($row['id'], ENT_QUOTES);
    $name = htmlspecialchars($row['name'], ENT_QUOTES);
    $sort = htmlspecialchars($row['sort'], ENT_QUOTES);
    $company_type = htmlspecialchars($row['company_type'], ENT_QUOTES);
    $website = htmlspecialchars($row['website'], ENT_QUOTES);

    echo '<tr>
          <td><a href="edit_company.php?id=' . $company_id . '">Edit</a></td>
          <td><a href="delete_company.php?id=' . $company_id . '">Delete</a></td>
          <td><a href="details_company.php?id=' . $company_id . '">Details</a></td>
          <td>' . $name . '</td>
          <td>' . $sort . '</td>
          <td>' . $company_type . '</td>
          <td>' . $website . '</td>
          </tr>';
          }
    echo '</table>'; // Close the table.
//     echo '<div class="single_product" style="border: 2px solid lightblue; margin: 5px; padding: 5px;">
//       <div class="img" style="width: 250px; height: 200px; border: 2px solid lightblue;">
//         <a href="view-company.php?'.$company_id.'" tabindex="-1">
//             <img class="primary-img" src="'.$image.'" alt="'.$name.'">
//         </a>
//       </div>
//       <h6 align="center"><a class="product-name" href="view-company.php?'.$company_id.'">'.$name.'</a></h6>
//       <div class="rating-box">
//           <ul>';
//           for ($i=0; $i <$sort; $i++) {
//             echo '<li><i class="fa fa-star-of-david"></i></li>';
//           }
//           for ($i=0; $i < 5-$sort; $i++) {
//             echo '<li class="silver-color"><i class="fa fa-star-of-david"></i></li>';
//           }
//         echo '</ul>
//         </div>
//     </div>';
//     ?>
 </div>


                            <!-- echo '<div class="slide-item slick-slide slick-cloned" tabindex="-1" style="width: 210px;" data-slick-index="-4" aria-hidden="true">
                                <div class="single_product">
                                    <div class="product-img">
                                        <a href="view-company.php?'.$company_id.'" tabindex="-1">
                                            <img class="primary-img" src="'.$image.'.jpg" alt="'.$name.'">
                                        </a>
                                        <span class="sticker-2">New</span>
                                    </div>
                                    <div class="hiraola-product_content">
                                        <div class="product-desc_info">
                                            <h6 align="center"><a class="product-name" href="view-company.php?'.$company_id.'" tabindex="-1">'.$name.'</a></h6>
                                            <div class="additional-add_action">
                                                <ul>
                                                    <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="" tabindex="-1" data-original-title="Quick View"><i class="ion-eye"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="rating-box">
                                                <ul>';
                                                for ($i=0; $i <$sort; $i++) {
                                                  echo '<li><i class="fa fa-star-of-david"></i></li>';
                                                }
                                                for ($i=0; $i < 5-$sort; $i++) {
                                                  echo '<li class="silver-color"><i class="fa fa-star-of-david"></i></li>';
                                                }
                                              echo '</ul>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>';

                              ?>
                              </div></div></div>
                              <button class="slick-next slick-arrow" style="display: block;"><i class="ion-ios-arrow-forward"></i></button></div>
                      </div>
                  </div> <br>
              </div> -->

<?php


      // Closing of the table
    mysqli_free_result($result); //Free up the resources.
  } else {
    // IF it did not run OK.
    // Error message:
    echo '<p class="text-center">The current company could not be retrieved. We apologize';
    echo ' for any inconvenience.</p>';
    // Debug message:
    // echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $q . '</p>';
    exit;
  }
  // End of else ($result)
  // Now display the total number of records/members.
  $q = "SELECT COUNT(id) FROM company";
  $result = mysqli_query ($dbcon, $q);
  $row = mysqli_fetch_array ($result, MYSQLI_NUM);
  $companies = htmlspecialchars($row[0], ENT_QUOTES);
  mysqli_close($dbcon); // Close the database connection.
  $echostring = "<p class='text-center'>Total number of companies are ". $companies ."</p>";
  $echostring .= "<p class='text-center'>";
  echo $echostring;
  if ($pages>1) {
    //What number is the current page?
    $current_page = ($start/$pagerows) + 1;
    //If the page is not the first page then create a Previous link
    if ($current_page != 1) {
        $echostring .= '<a href="view.php?s=' . ($start - $pagerows) . '&p=' . $pages . '">Previous</a> ';
    }
    // Create a Next link
    if ($current_page != $pages) {
        $echostring .= ' <a href="view.php?s=' . ($start + $pagerows) . '&p=' . $pages . '">Next</a> ';
    }
    $echostring .= '</p>';
    echo $echostring;
  }

} catch (\Exception $e) {
  // We finally handle any problems here
  // print "An Exception occurred. Message: " . $e->getMessage();
  print "The system is busy please try later";
  //  $date = date(‘m.d.y h:i:s’);
  //  $errormessage = $e->getMessage();
  //  $eMessage = $date . “ | Exception Error | “ , $errormessage . |\n”;
  //   error_log($eMessage,3,ERROR_LOG);
  // e-mail support person to alert there is a problem
  //  error_log(“Date/Time: $date – Exception Error, Check error log for
  //details”, 1, noone@helpme.com, “Subject: Exception Error \nFrom: Error Log <errorlog@helpme.com>” . “\r\n”);

}catch(Error $e)
{
  // print "An Error occurred. Message: " . $e->getMessage();
  print "The system is busy please try later";
 // $date = date(‘m.d.y h:i:s’);
 // $errormessage = $e->getMessage();
 // $eMessage = $date . “ | Error | “ , $errormessage . |\n”;
 // error_log($eMessage,3,ERROR_LOG);
 // // e-mail support person to alert there is a problem
//  error_log(“Date/Time: $date – Error, Check error log for
//details”, 1, noone@helpme.com, “Subject: Error \nFrom: Error Log <errorlog@helpme.com>” . “\r\n”);

}
