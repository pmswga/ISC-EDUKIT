$(document).ready(function(){

  $("#message").hide();

  $("[name='registrationForm']").submit(function(event){
    $("#message").hide();
    $("#message").text("");

    var password = $("[name='password']").val();
    var retry_password = $("[name='retry_password']").val();

    if (password.length >= 6 && retry_password.length >= 6) {
      if (password === retry_password) {
        return true;
      } else {
        $("#message").text("Пароли не совпадают");
      }
    } else {
      $("#message").text("Пароль должен иметь длинну не менее 6-ти символов");
    }

    $("#message").show();
    return false;
  });

})