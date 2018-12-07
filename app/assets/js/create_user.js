$(document).ready(function(){

	const ADDUSER = $("#add-user");
	const username = $("#username");
	const password = $("#password");
	const confirmPassword = $("#confirm-password");
	const email = $("#email");
	const firstname = $("#firstname");
	const lastname = $("#lastname");
	const address = $("#address");

	function validateRegistrationForm(){
		let errors = 0;

		// username should be greater than or equal to 8 characters
		if(username.val().length < 8){
			//yung next() yung susunod na htmltag sa input
			username.next().text("*Username should be at least eight(8) characters");
			errors++;
		} else {
			username.next().text("");
		}

		// password shoudld be greater than or equal 8
		if(password.val().length < 8){
			password.next().text("Password should be at least eight(8) characters");
			errors++;
		} else {
			password.next().text("");
		}

		//email should follow the email pattern
		if(!email.val().includes("@")){
			email.next().text("Please provide a valid email");
			errors++;
		} else {
			email.next().text("");
		}

		//address should not be empty
		if(address.val() == ""){
			address.next().text("Please provide and address");
			errors++;
		} else {
			address.next().text("");
		}

		//first name
		if(firstname.val() == ""){
			firstname.next().text("Please provide your First Name");
			errors++;
		} else {
			firstname.next().text("");
		}

		//last name
		if(lastname.val() == ""){
			lastname.next().text("Please provide your Last Name");
			errors++;
		} else {
			lastname.next().text("");
		}

		//confirm password
		if(confirmPassword.val() !== password.val()){
			confirmPassword.next().text("Password does not match");
			errors++;
		}else {
			confirmPassword.next().text("")
		}

		if(errors > 0){
			return false;
		} else {
			return true;
		}
	}

	ADDUSER.click(function(e){
		//validate registration form
		e.preventDefault();
		if (validateRegistrationForm()) {
			let usernameVal = username.val();
			let passwordVal = password.val();
			let firstnameVal = firstname.val();
			let lastnameVal = lastname.val();
			let emailVal = email.val();
			let addressVal = address.val();

			$.ajax({
				"url": "../controllers/create_users.php",
				"type": "POST",
				"data":{
					"username":usernameVal,
					"password":passwordVal,
					"firstname":firstnameVal,
					"lastname":lastnameVal,
					"email":emailVal,
					"home-address":addressVal
				},
				"success": function(jsondata){
					if(jsondata == "user and email exists"){
						username.next().text("Username already exists");
						email.next().text("E-mail is already taken");
					}else if(jsondata == "user exists"){
						username.next().text("Username already exists");
					}else if(jsondata == "email exists"){
						email.next().text("E-mail is already taken");
					} else {
						alert(`You have successfully registered`);
						username.val(" "),
						password.val(""),
						firstname.val(""),
						lastname.val(""),
						email.val(""),
						address.val(""),
						confirmPassword.val("")
					}
				}
			})
		}
	});
});