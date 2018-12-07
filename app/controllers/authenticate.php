<?php

session_start();

require_once("connect.php");

$username_email = htmlspecialchars($_POST["username-email"]);
$password = htmlspecialchars($_POST["password"]);

$sql = "SELECT * FROM users WHERE username = '$username_email' OR email = '$username_email'";
$result = mysqli_query($conn,$sql);
//assoc nalang kasi isang user lang ang kinukuha
$user_info = mysqli_fetch_assoc($result);

/*this will verify the username*/
if ($user_info) {
	//This will verify the password
	if (!password_verify($password, $user_info['password'])) {
		die("login_failed");
	} else {
		$_SESSION['user'] = $user_info;
	}
} else {
	die("login_failed");
}
echo "login_success";

mysqli_close($conn);

?>