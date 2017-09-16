
$(document).ready(function(){
  
  /*!
    
    Содержит значения true или false, обозначающие готовность к отправке
    
    sn         - поле "Фамилия"
    fn         - поле "Имя"
    pt         - поле "Отчетсво"
    email      - поле "E-mail"
    grp        - поле "Группа"
    address    - поле "Адрес"
    cell_phone - поле "Сотовый телефон"
    password   - поля "Пароль" и "Повторить пароль"
    
  */
    
  var status_send = {
    status: {
      sn: false,
      fn: false,
      email: false,
      grp: false,
      address: false,
      cell_phone: false,
      password: false
    },
    isTrue: function(){
      var st = true;
      
      $.each(this.status, function(index, value){
        st *= value;
      });
      
      return st;
    },
    setStatusTo: function(key, stat) {
      if (key in this.status) {
        this.status[key] = stat;
        return true;
      } else {
        return false;
      }
    }
  };
  
  /*!
    
    Устанавливает класс has-error/has-success/has-warning элементу, в зависимости от переданного stat
    
  */
  
  function setStatus(input, stat) {
    for (var i = 0; i < input.length; i++) {
      document.getElementById(input[i]).setAttribute("class", "form-group has-" + stat);
    }
  }
  
  var isExists = false;
  
  $("[name='email']").change(function(){
    var email = document.registration.email.value;
    
    $.ajax({
      url: "php/getEmail.php",
      type: "POST",
      data: "email="+email,
      success: function(replay){
        var data = jQuery.parseJSON(replay);
        isExists = data;
        
        if (data == true) {
          setStatus(["emailDiv"], "error");
          status_send.setStatusTo("email", false);
        } else {
          setStatus(["emailDiv"], "success");
          status_send.setStatusTo("email", true);
        }
      }
    });
    
  });
  
  $("[name='registration']").submit(function(event){
    var form = $("[name='registration']");
    
    if (status_send.isTrue()) {
      return true;
    } else {
      alert("Заполните нужные поля");
      return false;
    }
  });
  
  $("[name='second_name']").change(function(){
    
    var sn = document.registration.second_name.value;
    
    if ((sn.length <= 30) && (sn != "")) {
      setStatus(["snDiv"], "success");
      status_send.setStatusTo("sn", true);
    } else {
      setStatus(["snDiv"], "error");
      status_send.setStatusTo("sn", false);
    }
    
  });
  
  $("[name='first_name']").change(function(){
    
    var fn = document.registration.first_name.value;
    
    if ((fn.length <= 30) && (fn != "")) {
      setStatus(["fnDiv"], "success");
      status_send.setStatusTo("fn", true);
    } else {
      setStatus(["fnDiv"], "error");
      status_send.setStatusTo("fn", false);
    }
    
  });
  
  $("[name='password'], [name='retry_password']").change(function(){
    
    var password = document.registration.password.value;
    var retry_password = document.registration.retry_password.value;
    
    //And меньше 32 символов
    if (password.length >= 6 && retry_password.length >= 6) {
      if (password.length == retry_password.length) {
        if (password == retry_password) {
          setStatus(["passwordDiv", "retryPasswordDiv"], "success");
          status_send.setStatusTo("password", true);
        } else {
          setStatus(["passwordDiv", "retryPasswordDiv"], "error");
          status_send.setStatusTo("password", false);
        }
      } else {
        setStatus(["passwordDiv", "retryPasswordDiv"], "error");
        status_send.setStatusTo("password", false);
      }
    } else {
      setStatus(["passwordDiv", "retryPasswordDiv"], "error");
      status_send.setStatusTo("password", false);
    }
    
  });

  /*!

    Задаём группу по умолчанию

   */

  var current_group = $($("[name='grp']")[0]).val();

  if (current_group > 0) {
    setStatus(["grpDiv"], "success");
    status_send.setStatusTo("grp", true);
  } else {
    setStatus(["grpDiv"], "error");
    status_send.setStatusTo("grp", false);
  }

  $("[name='grp']").change(function(){
    
    var grp = document.registration.grp.value;
    
    //Проверять из БД
    if ((grp != "")) {
      setStatus(["grpDiv"], "success");
      status_send.setStatusTo("grp", true);
    } else {
      setStatus(["grpDiv"], "error");
      status_send.setStatusTo("grp", false);
    }
    
  });
  
  $("[name='home_address']").change(function(){
    
    var ha = document.registration.home_address.value;
    
    if ((ha.length <= 30) && (ha != "")) {
      setStatus(["addressDiv"], "success");
      status_send.setStatusTo("address", true);
    } else {
      setStatus(["addressDiv"], "error");
      status_send.setStatusTo("address", false);
    }
    
  });
  
  $("[name='cell_phone_child']").change(function(){
    
    var cp = document.registration.cell_phone_child.value;
    
    if ((cp.length <= 20) && (cp != "")) {
      setStatus(["cellPhoneDiv"], "success");
      status_send.setStatusTo("cell_phone", true);
    } else {
      setStatus(["cellPhoneDiv"], "error");
      status_send.setStatusTo("cell_phone", false);
    }
    
  });
  
});
