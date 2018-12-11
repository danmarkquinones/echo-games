$(document).ready(function(){

	function validateUpdateForm(){
		let user_id = $("#user_id").val();
		let username = $("#username").val();
		let firstname = $("#firstname").val();
		let lastname = $("#lastname").val();
		let email = $("#email").val();
		let homeaddress = $("#homeaddress").val();
		let oldpassword = $("#password").val();
		let newpassword = $("#newpassword").val();
		let confirmnewpassword = $("#confirmnewpassword").val();

		// console.log(user_id);
		// console.log(username);
		// console.log(firstname);
		// console.log(lastname);
		// console.log(email);
		// console.log(homeaddress);
		// console.log(password);
		// console.log(newpassword);
		// console.log(confirmnewpassword);
		let errors = 0;
		if(username.length < 8){
			$("#username").next().text("Please provide valid username");
			errors++;
		}else{
			$("#username").next().text("")
		}

		if(firstname.length == 0){
			$("#firstname").next().text("Please provide valid your name");
			errors++;
		}else{
			$("#firstname").next().text("");
		}

		if(lastname.length == 0){
			$("#lastname").next().text("Please provide valid your lastname");
			errors++;
		}else{
			$("#lastname").next().text("");
		}

		if(!$("#email").val().includes("@")){
			$("#email").next().text("Please provide valid Email");
			errors++;
		}else{
			$("#email").next().text("");
		}

		if(homeaddress.length == 0){
			$("#homeaddress").next().text("Please provide valid your Home Address");
			errors++;
		}else{
			$("#homeaddress").next().text("");
		}

		if(oldpassword.length <8){
			$("#oldpassword").next().text("Password must be atleast 8 characters");
			errors++;
		}else{
			$("#oldpassword").next().text("");
		}

		if(newpassword.length < 8){
			$("#newpassword").next().text("New Password must be atleast 8 characters");
			errors++;
		}else{
			$("#newpassword").next().text("");
		}

		if(oldpassword == newpassword){
			$("#newpassword").next().text("New password can't be the same as old password");
			errors++;
		}else{
			$("#newpassword").next().text("");
		}

		if(newpassword != confirmnewpassword){
			$("#confirmnewpassword").next().text("Password does not match");
			errors++;
		}else{
			$("#confirmnewpassword").next().text("");
		}

		if(errors > 0){
			return false;
		}else{
			return true;
		}
	}

	$("#updateinfo").on("click", function(){
		validateUpdateForm();
		let user_id = $("#user_id").val();
		let username = $("#username").val();
		let firstname = $("#firstname").val();
		let lastname = $("#lastname").val();
		let email = $("#email").val();
		let homeaddress = $("#homeaddress").val();
		let oldpassword = $("#password").val();
		let newpassword = $("#newpassword").val();

		if(newpassword != ''){
			$.ajax({
				"url":"../controllers/update_user.php",
				"type":"POST",
				"data":{
					"user_id":user_id,
					"username":username,
					"firstname":firstname,
					"lastname":lastname,
					"email":email,
					"homeaddress":homeaddress,
					"oldpassword":oldpassword,
					"newpassword":newpassword
				},
				"success": function (dataFromController){
					if (dataFromController == "Success") {
						$("#updatestatus").text("You have successfully edited your profile")
					};
					if(dataFromController == "Incorrect"){
						$("#updatestatus").text("Incorrect old password provided")
					};
				}
			})
		} else {
			$.ajax({
				"url":"../controllers/update_user.php",
				"type":"POST",
				"data":{
					"user_id":user_id,
					"username":username,
					"firstname":firstname,
					"lastname":lastname,
					"email":email,
					"homeaddress":homeaddress,
					"oldpassword":oldpassword
				},
				"success": function (dataFromController){
					if (dataFromController == "Success") {
						$("#updatestatus").text("You have successfully edited your profile")
					};
					if(dataFromController == "Incorrect"){
						$("#updatestatus").text("Incorrect old password provided")
					};
				}
			})
		}
	})


});