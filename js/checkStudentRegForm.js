$(document).ready(function(){
  $("#message").hide();

  $("[name='passwd']").on("change", function() {

    if ($(this).val().length < 6) {
      $("#message").text("Пароль должен иметь длинну не менее 6-ти символов");
      $("#message").show();
    } else {
      $("#message").hide();
    }

  });

  $("[name='registrationForm']").submit(function(event){
    $("#message").hide();
    $("#message").text("");

    var pass = $("#passwd").val();
    var retry_password = $("#retry_passwd").val();

    if (pass === retry_password) {
      return true;
    } else {
      $("#message").text("Пароли не совпадают");
    }
      
    $("#message").show();
    return false;
  });

})