<?php
session_start();
if ($_SESSION['user_level'] !==1 ) {
  header("Location: index.php" );
  exit();
}
$header = 3;
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin Panel!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS File  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="container" style="margin-top: 30px">

      <!-- Header section -->
      <header>
        <?php include('includes/header.php'); ?>
      </header>

      <!-- Body section -->
      <div class="row" style="padding-left: 0px;">
        <!-- Left-side Column Menu Section -->
        <!-- <nav class="col-sm-2">
          <ul class="nav nav-pills flex-column">
            <?php include("includes/nav.php"); ?>
          </ul>
        </nav> -->
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          require('process-add-page.php');
        } ?>

        <!-- Center Column Content Section  -->
        <div class="col-sm-12">
          <h2 class="text-center">Here you can Add new Company!</h2>
          <br>
          <br>
          <form class="text-center" name="addform" id="addform" action="add-page.php" method="post" enctype="multipart/form-data" >

            <div class="form-group row">
              <label for="category" class="col-sm-4 col-form-label">Category</label>
              <div class="col-sm-8">
                <select class="form-control" required id="category" name="category">
                  <option selected value="">-Select-</option>
                  <option value="To'qimachilik">To'qimachilik</option>
                  <option value="Oziq-o'vqat">Oziq-o'vqat</option>
                  <option value="Xom-ashiyo">Xom-ashiyo</option>
                  <option value="Kimyoviy_Moddalar">Kimyoviy Moddalar</option>
                  <option value="Electronika">Electronika</option>
                  <option value="Mexanika">Mexanika</option>
                  <option value="Qurilish">Qurilish</option>
                  <option value="O'simliklar">O'simliklar</option>
                  <option value="Uy-uchun">Uy uchun</option>
                  <option value="Medisina">Medisina</option>
                  <option value="Qadoq">Qadoq</option>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="name" class="col-sm-4 col-form-label">Name EN:</label>
              <div class="col-sm-8">
                <input type="text" name="name" required id="name" placeholder="Name in english" maxlength="60" value="<?php if (isset($_POST['name'])) echo htmlspecialchars($_POST['name'], ENT_QUOTES); ?>">
              </div>
            </div>

            <div class="form-group row">
              <label for="name_uz" class="col-sm-4 col-form-label">Name UZ:</label>
              <div class="col-sm-8">
                <input type="text" name="name_uz" required id="name_uz" placeholder="Name in uzbek" maxlength="60" value="<?php if (isset($_POST['name_uz'])) echo htmlspecialchars($_POST['name_uz'], ENT_QUOTES); ?>">
              </div>
            </div>

            <div class="form-group row">
              <label for="name_ru" class="col-sm-4 col-form-label">Name RU:</label>
              <div class="col-sm-8">
                <input type="text" name="name_ru" required id="name_ru" placeholder="Name in russia" maxlength="60" value="<?php if (isset($_POST['name_ru'])) echo htmlspecialchars($_POST['name_ru'], ENT_QUOTES); ?>">
              </div>
            </div>

            <div class="form-group row">
              <label for="address" class="col-sm-4 col-form-label">Address EN:</label>
              <div class="col-sm-8">
                <input type="text" name="address" required id="address" placeholder="Address in english" value="<?php if (isset($_POST['address'])) echo htmlspecialchars($_POST['address'], ENT_QUOTES); ?>">
              </div>
            </div>

            <div class="form-group row">
              <label for="address_uz" class="col-sm-4 col-form-label">Address UZ:</label>
              <div class="col-sm-8">
                <input type="text" name="address_uz" required id="address_uz" placeholder="Address in uzbek" value="<?php if (isset($_POST['address_uz'])) echo htmlspecialchars($_POST['address_uz'], ENT_QUOTES); ?>">
              </div>
            </div>

            <div class="form-group row">
              <label for="address_ru" class="col-sm-4 col-form-label">Address RU:</label>
              <div class="col-sm-8">
                <input type="text" name="address_ru" required id="address_ru" placeholder="Address in russia" value="<?php if (isset($_POST['address_ru'])) echo htmlspecialchars($_POST['address_ru'], ENT_QUOTES); ?>">
              </div>
            </div>

            <div class="form-group row">
              <label for="description" class="col-sm-4 col-form-label">Description EN:</label>
              <div class="col-sm-8">
                <textarea name="description" required id="description" placeholder="Write a description in english" value="<?php if (isset($_POST['description'])) echo htmlspecialchars($_POST['description'], ENT_QUOTES); ?>" rows="2" cols="40"></textarea>
              </div>
            </div>

            <div class="form-group row">
              <label for="description_uz" class="col-sm-4 col-form-label">Description UZ:</label>
              <div class="col-sm-8">
                <textarea name="description_uz" required id="description_uz" placeholder="Write a description in uzbek" value="<?php if (isset($_POST['description_uz'])) echo htmlspecialchars($_POST['description_uz'], ENT_QUOTES); ?>" rows="2" cols="40"></textarea>
              </div>
            </div>

            <div class="form-group row">
              <label for="description_ru" class="col-sm-4 col-form-label">Description RU:</label>
              <div class="col-sm-8">
                <textarea name="description_ru" required id="description_ru" placeholder="Write a description in russia" value="<?php if (isset($_POST['description_ru'])) echo htmlspecialchars($_POST['description_ru'], ENT_QUOTES); ?>" rows="2" cols="40"></textarea>
              </div>
            </div>

            <div class="form-group row">
              <label for="meta_des" class="col-sm-4 col-form-label">Meta Description EN:</label>
              <div class="col-sm-8">
                <textarea name="meta_des" required id="meta_des" placeholder="Write a meta description in english" value="<?php if (isset($_POST['meta_des'])) echo htmlspecialchars($_POST['meta_des'], ENT_QUOTES); ?>" rows="2" cols="40"></textarea>
              </div>
            </div>

            <div class="form-group row">
              <label for="meta_des_uz" class="col-sm-4 col-form-label">Meta Description UZ:</label>
              <div class="col-sm-8">
                <textarea name="meta_des_uz" required id="meta_des_uz" placeholder="Write a meta description in uzbek" value="<?php if (isset($_POST['meta_des_uz'])) echo htmlspecialchars($_POST['meta_des_uz'], ENT_QUOTES); ?>" rows="2" cols="40"></textarea>
              </div>
            </div>

            <div class="form-group row">
              <label for="meta_des_ru" class="col-sm-4 col-form-label">Meta Description RU:</label>
              <div class="col-sm-8">
                <textarea name="meta_des_ru" required id="meta_des_ru" placeholder="Write a meta description in russia" value="<?php if (isset($_POST['meta_des_ru'])) echo htmlspecialchars($_POST['meta_des_ru'], ENT_QUOTES); ?>" rows="2" cols="40"></textarea>
              </div>
            </div>

            <div class="form-group row">
              <label for="tags" class="col-sm-4 col-form-label">Tags EN:</label>
              <div class="col-sm-8">
                <input type="text" name="tags" required id="tags" placeholder="Write with comma" value="<?php if (isset($_POST['tags'])) echo htmlspecialchars($_POST['tags'], ENT_QUOTES); ?>">
              </div>
            </div>

            <div class="form-group row">
              <label for="tags_uz" class="col-sm-4 col-form-label">Tags UZ:</label>
              <div class="col-sm-8">
                <input type="text" name="tags_uz" required id="tags_uz" placeholder="Write with comma" value="<?php if (isset($_POST['tags_uz'])) echo htmlspecialchars($_POST['tags_uz'], ENT_QUOTES); ?>">
              </div>
            </div>

            <div class="form-group row">
              <label for="tags_ru" class="col-sm-4 col-form-label">Tags RU:</label>
              <div class="col-sm-8">
                <input type="text" name="tags_ru" required id="tags_ru" placeholder="Write with comma" value="<?php if (isset($_POST['tags_ru'])) echo htmlspecialchars($_POST['tags_ru'], ENT_QUOTES); ?>">
              </div>
            </div>

            <div class="form-group row">
              <label for="status" class="col-sm-4 col-form-label">Status:</label>
              <div class="col-sm-8">
                <select class="" name="status">
                  <option value="1">Active</option>
                  <option value="0">Inactive</option>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="company_type" class="col-sm-4 col-form-label">Company Type:</label>
              <div class="col-sm-8">
                <select class="" name="company_type">
                  <option value="local">Local</option>
                  <option value="foreign">Foreign</option>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="sort" class="col-sm-4 col-form-label">Sort:</label>
              <div class="col-sm-8">
                <select class="" required name="sort">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="company_code" class="col-sm-4 col-form-label">Company Code: </label>
              <div class="col-sm-8">
                <input type="text" name="company_code" required id="company_code" placeholder="Company Code" value="<?php if (isset($_POST['company_code'])) echo htmlspecialchars($_POST['company_code'], ENT_QUOTES); ?>">
              </div>
            </div>

            <div class="form-group row">
              <label for="email" class="col-sm-4 col-form-label">E-mail: </label>
              <div class="col-sm-8">
                <input type="email" name="email" required id="email" placeholder="E-mail" value="<?php if (isset($_POST['email'])) echo htmlspecialchars($_POST['email'], ENT_QUOTES); ?>">
              </div>
            </div>

            <div class="form-group row">
              <label for="website" class="col-sm-4 col-form-label">Website: </label>
              <div class="col-sm-8">
                <input type="text" name="website" required id="website" placeholder="Website" value="<?php if (isset($_POST['website'])) echo htmlspecialchars($_POST['website'], ENT_QUOTES); ?>">
              </div>
            </div>

            <div class="form-group row">
              <label for="phone" class="col-sm-4 col-form-label">Phone: </label>
              <div class="col-sm-8">
                <input type="tel" name="phone" required id="phone" placeholder="Tel." value="<?php if (isset($_POST['phone'])) echo htmlspecialchars($_POST['phone'], ENT_QUOTES); ?>">
              </div>
            </div>

            <div class="form-group row">
              <label for="image" class="col-sm-4 col-form-label">Image: </label>
              <div class="col-sm-8">
                <input type="file" name="file" required id="file"  value="<?php if (isset($_POST['file'])) echo htmlspecialchars($_POST['file'], ENT_QUOTES); ?>">
              </div>
            </div>

            <div class="form-group row">
            	<label for="" class="col-sm-4 col-form-label"></label>
                <div class="col-sm-8">
            	     <input id="submit" class="btn btn-primary" type="submit" name="submit" value="Add">
                </div>
            	</div>


          </form>
        </div>

        <!-- Right Side Column Content Section -->
        <!-- <aside class="col-sm-2">
          <?php include('includes/info-col.php'); ?>
        </aside>
      </div> -->

      <!-- Footer Content Section! -->
      <footer >
        <?php include('includes/footer.php'); ?>
      </footer>
    </div>
  </body>
</html>
