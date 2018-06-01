
$("[name='loginCPForm']").submit(function() {
	
	var login = document.loginCPForm.login.value;
	var paswd = document.loginCPForm.paswd.value;
	
	if ((login != "") && (paswd != "")) {
		return true;
	} else {				
		alert('Введите данные для входа');
		return false;
	}
	
});