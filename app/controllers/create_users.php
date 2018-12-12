<?php
	require_once("connect.php");

	$username = htmlspecialchars($_POST["username"]);
	//para di makita sa database, BCRYPT -> i-encrypt yung password.
	$password = password_hash( htmlspecialchars($_POST["username"]), PASSWORD_BCRYPT);
	$firstname = htmlspecialchars($_POST["firstname"]);
	$lastname = htmlspecialchars($_POST["lastname"]);
	$email = htmlspecialchars($_POST["email"]);
	$address = htmlspecialchars($_POST["home-address"]);
	$role_id = 2;
	//bakit nag query eh wala pa , para macheck kung may taken na yung username
	$sql_username = "SELECT*FROM users WHERE username = '$username' ";
	$result_username = mysqli_query($conn,$sql_username);
	// para macheck na nag eexist na si email
	$sql_email = "SELECT*FROM users WHERE email = '$email' ";
	$result_email = mysqli_query($conn,$sql_email);
	//Chinecheck kung may username na sa database
	if(mysqli_num_rows($result_username) > 0 && mysqli_num_rows($result_email) > 0){
		die("user and email exists");
	}elseif(mysqli_num_rows($result_username) > 0 ) {
		die("user exists");
	}elseif(mysqli_num_rows($result_email) > 0 ) {
		die("email exists");
	}else{
		$insert_query = "INSERT INTO users (username,password,first_name,last_name,email,home_address,role_id) VALUES ('$username','$password','$firstname','$lastname','$email','$address', $role_id)";
		$result = mysqli_query($conn, $insert_query);
	}

	mysqli_close($conn);
?>