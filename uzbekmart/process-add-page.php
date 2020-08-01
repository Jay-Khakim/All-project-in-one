<?php
// This script is a query that INSERTs a record in the users table.
// Check that form has been submitted:
// Has the form been submitted
  try {
    require('mysqli_connect.php'); //Connect to the database
    $errors = array(); // Initialize an error array.
  	// ---------------check the entries -------------

    // Check for category selection
    if(isset($_POST['category'])){
      $category = filter_var($_POST['category'], FILTER_SANITIZE_STRING);
      if ((!empty($category))) {
        $categorytrim = filter_var($category, FILTER_SANITIZE_STRING);
      }
    }else{
      $errors[]="Missing category Selection";
    }

    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    if (!empty($name)) {
      $nametrim = filter_var($name, FILTER_SANITIZE_STRING);
    }else {
      $errors[]='Missing name!';
    }

    $name_uz = filter_var($_POST['name_uz']);
    if (!empty($name_uz)) {
      $name_uztrim = filter_var($name_uz, FILTER_SANITIZE_STRING);
    }else {
      $errors[]='Missing the name in Uzbek!';
    }

    $name_ru = filter_var($_POST['name_ru'], FILTER_SANITIZE_STRING);
    if (!empty($name_ru)) {
      $name_rutrim = filter_var($name_ru, FILTER_SANITIZE_STRING);
    }else {
      $errors[]='Missing the name in russian!';
    }

    // Checking for addresses
    $address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
    if (!empty($address)) {
      $addresstrim = filter_var($address, FILTER_SANITIZE_STRING);
    }else {
      $errors[]='Missing the address in english!';
    }

    $address_uz = filter_var($_POST['address_uz']);
    if (!empty($address_uz)) {
      $address_uztrim = filter_var($address_uz, FILTER_SANITIZE_STRING);
    }else {
      $errors[]='Missing the address in uzbek!';
    }

    $address_ru = filter_var($_POST['address_ru'], FILTER_SANITIZE_STRING);
    if (!empty($address_ru)) {
      $address_rutrim = filter_var($address_ru, FILTER_SANITIZE_STRING);
    }else {
      $errors[]='Missing the address in russian!';
    }

    // Checking for descriptions
    $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
    if (!empty($description)) {
      $descriptiontrim = filter_var($description, FILTER_SANITIZE_STRING);
    }else {
      $errors[]='Missing the description in english!';
    }

    $description_uz = filter_var($_POST['description_uz'],FILTER_SANITIZE_STRING);
    if (!empty($description_uz)) {
      $description_uztrim = filter_var($description_uz, FILTER_SANITIZE_STRING);
    }else {
      $errors[]='Missing the description in uzbek!';
    }

    $description_ru = filter_var($_POST['description_ru'], FILTER_SANITIZE_STRING);
    if (!empty($description_ru)) {
      $description_rutrim = filter_var($description_ru, FILTER_SANITIZE_STRING);
    }else {
      $errors[]='Missing the description in russian!';
    }

    // Checking for the meta description
    $meta_des = filter_var($_POST['meta_des'], FILTER_SANITIZE_STRING);
    if (!empty($meta_des)) {
      $meta_destrim = filter_var($meta_des, FILTER_SANITIZE_STRING);
    }else {
      $errors[]='Missing the meta description in english!';
    }

    $meta_des_uz = filter_var($_POST['meta_des_uz'], FILTER_SANITIZE_STRING);
    if (!empty($meta_des_uz)) {
      $meta_des_uztrim = filter_var($meta_des_uz, FILTER_SANITIZE_STRING);
    }else {
      $errors[]='Missing the meta description in uzbek!';
    }

    $meta_des_ru = filter_var($_POST['meta_des_ru'], FILTER_SANITIZE_STRING);
    if (!empty($meta_des_ru)) {
      $meta_des_rutrim = filter_var($meta_des_ru, FILTER_SANITIZE_STRING);
    }else {
      $errors[]='Missing the meta description in russian!';
    }

    // Checking for the tags
    $tags = filter_var($_POST['tags'], FILTER_SANITIZE_STRING);
    if (!empty($tags)) {
      $tagstrim = filter_var($tags, FILTER_SANITIZE_STRING);
    }else {
      $errors[]='Missing the tags in english!';
    }

    $tags_uz = filter_var($_POST['tags_uz'], FILTER_SANITIZE_STRING);
    if (!empty($tags_uz)) {
      $tags_uztrim = filter_var($tags_uz, FILTER_SANITIZE_STRING);
    }else {
      $errors[]='Missing the tags in uzbek!';
    }

    $tags_ru = filter_var($_POST['tags_ru'], FILTER_SANITIZE_STRING);
    if (!empty($tags_ru)) {
      $tags_rutrim = filter_var($tags_ru, FILTER_SANITIZE_STRING);
    }else {
      $errors[]='Missing the tags in russian!';
    }

    // Checking for status
    if (isset($_POST['status'])) {
      $status = filter_var($_POST['status'], FILTER_SANITIZE_STRING);
      if (!empty($status)) {
        $statustrim = filter_var($status, FILTER_SANITIZE_STRING);
      }else {
        $errors[]='Missing the status!';
      }
    }

    // cheking for the company type
    if (isset($_POST['company_type'])) {
      $company_type = filter_var($_POST['company_type'], FILTER_SANITIZE_STRING);
      if (!empty($company_type)) {
        $company_typetrim = $company_type;
      }else {
        $errors[]='Missing the company_type!';
      }
    }

    //cheking for sort of the company
    if (isset($_POST['sort'])) {
      $sort = filter_var($_POST['sort'], FILTER_SANITIZE_STRING);
      if (!empty($sort)) {
        $sorttrim = $sort;
      }else {
        $errors[]='Missing the sort of company!';
      }
    }
    // Cheking for the company code
    $company_code = filter_var($_POST['company_code'], FILTER_SANITIZE_STRING);
    if (!empty($company_code)) {
      $company_codetrim = filter_var($company_code, FILTER_SANITIZE_STRING);
    }else {
      $errors[]='Missing the company code!';
    }

    // Cheking for the company email
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    if (!empty($email)) {
      $emailtrim = filter_var($email, FILTER_SANITIZE_EMAIL);
    }else {
      $errors[]='Missing the company email!';
    }

    // Cheking for the company website
    $website = filter_var($_POST['website'], FILTER_SANITIZE_EMAIL);
    if (!empty($website)) {
      $websitetrim = filter_var($website, FILTER_SANITIZE_EMAIL);
    }else {
      $errors[]='Missing the company website!';
    }

    // is the phone number present? if it is sanitize it
  	$phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
  	if ((!empty($phone))&&(strlen($phone) <=30)) {
  		// Sanitize the trimmed phone number
  		$phonetrim = (filter_var($phone, FILTER_SANITIZE_NUMBER_INT));
  		$phonetrim = preg_replace('/[^0-9]/', '', $phonetrim);
  	} else {
      $errors[]='Missing the company phone number!';
  	}

    // Checkeng and moving the image to the right place
    if (isset($_POST['submit'])) {
      $file= $_FILES['file'];
      print_r($file);
      $fileName = $file['name'];
      $fileTmpName = $file['tmp_name'];
      $fileSize = $file['size'];
      $fileError = $file['error'];
      $fileType = $file['type'];

      $fileExt = explode('.',  $fileName);
      $fileActualExt = strtolower(end($fileExt));

      $allowed = array('jpg', 'jpeg', 'png');

      if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
          if ($fileSize < 1000000) {
            $fileNameNew = "company".$nametrim.".".$fileActualExt;
            // $sql = "UPDATE profile_img SET status=0 WHERE userid='$id'";
            // $result= mysqli_query($dbcon, $sql);
            $fileDestination = "uploads/".$fileNameNew;
            if (move_uploaded_file($fileTmpName, $fileDestination)) {
              $imagetrim = $fileDestination;
              // header('Location: index.php?uploadsuccess');

            }else {
              // header('Location: index.php?uploadfail');
              $errors[]= "Image could not moved!";

            }
            // move_uploaded_file($fileName, "$fileDestination");
            // header('Location: index.php?uploadsuccess');
          }else {
            $errors[]= "Your image file is too big!";
          }
        }else {
          $errors[]= "There was an error while uploading your file";
          $errors[]=  $fileError;
        }
      }else {
        $errors[]= "You cannot upload files of this type";
      }
    }


    if (empty($errors)) {
      // If everything is ok,
      //Determine whether the email address has already been registered
      $query = "SELECT id FROM company WHERE email = ? ";
      $q = mysqli_stmt_init($dbcon);
      mysqli_stmt_prepare($q, $query);
      mysqli_stmt_bind_param($q, 's', $emailtrim);
      mysqli_stmt_execute($q);
      $result = mysqli_stmt_get_result($q);
      if (mysqli_num_rows($result) == 0) {
        //The email address has not been registered
      		//already therefore register the company in the company table
      		// ---------------------Valid Entries - Save to database -----------
      		// Start of the SUCCESSFUL SECTION
        $query = "INSERT INTO company (category, name, name_uz, name_ru, company_type, address, address_uz, address_ru, phone,";
        $query.=" company_code, descripiton, description_uz, description_ru, meta_des, meta_des_uz, meta_des_ru, tags, ";
        $query.=" tags_uz, tags_ru, status, sort, email, website, image) ";
        $query .="VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $q = mysqli_stmt_init($dbcon);
        mysqli_stmt_prepare($q, $query);
        // use prepared statement to insure that only text is inserted
        // bind fields to SQL Statement
        mysqli_stmt_bind_param($q, "ssssssssssssssssssssssss", $categorytrim, $nametrim, $name_uztrim, $name_rutrim, $company_typetrim, $addresstrim, $address_uztrim, $address_rutrim, $phonetrim, $company_codetrim, $descriptiontrim, $description_uztrim, $description_rutrim, $meta_destrim, $meta_des_uztrim, $meta_des_rutrim, $tagstrim, $tags_uztrim, $tags_rutrim, $statustrim, $sorttrim,$emailtrim, $websitetrim, $imagetrim);
        // execute query
        mysqli_stmt_execute($q);
        if (mysqli_stmt_affected_rows($q) == 1) {
          // One record inserted
          header ("location: add-thanks.php");
          exit();
        }else {
          // If it did not run OK.
      		// Public message:
      		// echo "invalid query: ".$dbcon->error;
          $errorstring = "<p class='text-center col-sm-8' style='color:red'>";
  			  $errorstring .= "System Error<br />The company could not be added due ";
  			  $errorstring .= "to a system error. We apologize for any inconvenience.</p>";
          echo "<p class=' text-center col-sm-2' style='color:red'>$errorstring</p>";
          // Debugging message below do not use in production
    			echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $query . '</p>';
          mysqli_close($dbcon); // Close the database connection.
  		    // include footer then close program to stop execution
  			  echo '<footer>
              include("includes/footer.php");
              </footer>';
  		   exit();
        }
      }else {
        //The email address is already registered
        $errorstring = 'The email address is already registered.';
    		echo "<p class=' text-center col-sm-2' style='color:red'>$errorstring</p>";
      }
    }else {
      $errorstring = "Error! <br /> The following error(s) occurred:<br>";
  		foreach ($errors as $msg) { // Print each error.
  			$errorstring .= " - $msg<br>\n";
  		}
      $errorstring .= "Please try again.<br>";
  		echo "<p class=' text-center col-sm-2' style='color:red'>$errorstring</p>";
    }

  } catch (\Exception $e) {
    // We finally handle any problems here
    print "An Exception occurred. Message: " . $e->getMessage();
    print "The system is busy please try later";
    //  $date = date(‘m.d.y h:i:s’);
    //  $errormessage = $e->getMessage();
    //  $eMessage = $date . “ | Exception Error | “ , $errormessage . |\n”;
    //   error_log($eMessage,3,ERROR_LOG);
    // e-mail support person to alert there is a problem
    //  error_log(“Date/Time: $date – Exception Error, Check error log for
    //details”, 1, noone@helpme.com, “Subject: Exception Error \nFrom: Error Log <errorlog@helpme.com>” . “\r\n”);

  }
  catch(Error $e)
  {
    print "An Error occurred. Message: " . $e->getMessage();
    print "The system is busy please try later";
   // $date = date(‘m.d.y h:i:s’);
   // $errormessage = $e->getMessage();
   // $eMessage = $date . “ | Error | “ , $errormessage . |\n”;
   // error_log($eMessage,3,ERROR_LOG);
   // // e-mail support person to alert there is a problem
  //  error_log(“Date/Time: $date – Error, Check error log for
//details”, 1, noone@helpme.com, “Subject: Error \nFrom: Error Log <errorlog@helpme.com>” . “\r\n”);

  }
