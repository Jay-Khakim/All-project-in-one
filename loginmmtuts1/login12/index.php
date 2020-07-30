<?php
  // header.php
  include 'header.php';
 ?>
  <?php
    if($_SERVER['REQUEST_METHOD']== 'POST'){
      require('login.php');
    }
   ?>

      <!-- Registration area -->
       <section id="register">
         <div class="row m-0">
           <div class="col-lg-4 offset-lg-2">
             <div class="text-center pb-5">
               <h1 class="login-title text-dark">Register</h1>
               <p class="p-1 m-0 font-ubuntu text-black-50">Register and enjoy with additional features</p>
               <span class="font-ubuntu text-black-50">I already have <a href="login.php">Login</a></span>
             </div>
             <div class="upload-profile-image d-flex justify-content-center pb-5">

               <div class="text-center">
                 <div class="d-flex justify-content-center">
                   <img class="camera-icon" src="./assets/camera_solid.png" alt="camera">
                 </div>
                 <img id="profile-picture" class="img rounded-circle" style="width: 200px; height: 200px;" src="./assets/profile/beard.png" alt="profile">
                 <small class="form-text text-black-50">Choose image</small>
                 <input type="file" class="form-control-file" name="profileUpload" id='upload-profile'>
               </div>
             </div>
             <div class="d-flex justify-content-center">
               <form class="" action="index.php" method="post" enctype="multipart/form-data" id="reg-form">
                 <div class="form-row">
                   <div class="col">
                     <input type="text" value="<?php if(isset($_POST['firstName'])) echo $_POST['firstName']; ?>" name="firstName" id='firstName' class="form-control" placeholder="First Name">
                   </div>
                   <div class="col">
                     <input type="text" value="<?php if(isset($_POST['secondName'])) echo $_POST['secondName']; ?>" name="secondName" id='secondName' class="form-control" placeholder="Second Name">
                   </div>
                 </div>

                 <div class="form-row my-4">
                   <div class="col">
                     <input type="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>"  required name="email" id='email' class="form-control" placeholder="Email*">
                   </div>
                 </div>

                 <div class="form-row my-4">
                   <div class="col">
                     <input type="password" required name="password" id='password' class="form-control" placeholder="Password*">
                   </div>
                 </div>

                 <div class="form-row my-4">
                   <div class="col">
                     <input type="password" required name="cofirm_pwd" id='confirm_pwd' class="form-control" placeholder="Confirm Password*">
                     <small id='#confirm_error' class="text-danger"></small>
                   </div>
                 </div>

                 <div class="form-check form-check-inline">
                   <input type="checkbox" name="agreement" class="form-check-input" required>
                   <label for="agreement" class="form-check-label font-ubuntu text-black-50">I agree <a href="#">terms, conditions, and policy</a>(*) </label>
                 </div>

                 <div class="submit-btn text-center my-5">
                   <button type="submit" class="btn btn-warning rounded-pill text-dark px-5" name="button">Countinue </button>
                 </div>

               </form>
             </div>
           </div>
         </div>
       </section>
      <!-- #Registration area -->

<?php
  // footer
  include "footer.php";
 ?>
