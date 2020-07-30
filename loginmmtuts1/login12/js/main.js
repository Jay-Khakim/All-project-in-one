$(document).ready(function (e) {

  let $uploadfile = $('#upload-profile input[type="file"]');

  $uploadfile.change(function () {
    readUrl(this);
  });

  $("#reg-form").submit(function(event){
    let $password = $("#password");
    let $confirm = $("#confirm_pwd");
    let $error = $("#confirm_error");
    if($password.val() === $confirm.val()){
      return true;
    }else{
      $error.text("Password not Match");
      event.preventDefault();
    }
  });
});

function readUrl(input){
  if(input.files && input.files[0]){
    let reader = new FileReader();
    reader.onload = function(e){
      $("#profile-picture").attr('scr', e.target.result);
      $('.camera-icon').css({display: "none";})

    }

    reader.readAsDataUrl(input.files[0]);
  }
}
