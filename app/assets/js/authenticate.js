$(document).ready(function(){
	const username_email = $("#username-email");
	$("#login").click(function(e){
		e.preventDefault();
		let username_email_val = username_email.val();
		let password = $("#password").val();

		$.ajax({

			"url":"../controllers/authenticate.php",
			"type":"POST",
			"data":{
				"username-email": username_email_val,
				"password": password
			},
			"success":function(jsondata){
				if (jsondata == "login_failed") {
					username_email.next().text("Please provide the correct credentials")

				}else{
					window.location.replace("index.php");
				}
			}
		});

	});
});