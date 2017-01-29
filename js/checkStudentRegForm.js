
$(document).ready(function(){
		
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
					
					if(data == true) document.getElementById('emailDiv').setAttribute("class", "form-group has-error");
					else document.getElementById('emailDiv').setAttribute("class", "form-group has-success");
				}
			});
			
			
		});
		
	});

document.registration.password.addEventListener("change", setStatus, false);
document.registration.retry_password.addEventListener("change", setStatus, false);

function setStatus(e)
{
	var password = document.registration.password.value;
	var retry_password = document.registration.retry_password.value;
	
	if(password != retry_password)
	{
		document.getElementById('passwordDiv').setAttribute("class", "form-group has-error");
		document.getElementById('retryPasswordDiv').setAttribute("class", "form-group has-error");
	}
	else
	{
		document.getElementById('passwordDiv').setAttribute("class", "form-group has-success");
		document.getElementById('retryPasswordDiv').setAttribute("class", "form-group has-success");
	}
}

function checkRegistrationForm(form)
{
	var password = form.password.value;
	var retry_password = form.retry_password.value;
	
	if(((password != "") && (retry_password != "")) && password.length >= 6)
	{
		if(password == retry_password) return true;
		else
		{
			alert('Пароли не совпадают');
			return false;
		}
	}
	else
	{
		alert("Пароль должен иметь более 6 символов");
		return false;
	}
}

