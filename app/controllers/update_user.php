<?php
session_start();

	$user_id = $_POST["user_id"];
	$newusername = $_POST["username"];
	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$email = $_POST["email"];
	$homeaddress = $_POST["homeaddress"];
	$oldpassword = $_POST["oldpassword"];


	if(isset($_POST["newpassword"])){
		$newpassword = password_hash(htmlspecialchars($_POST["newpassword"]),PASSWORD_BCRYPT);
		if(!password_verify($oldpassword, $_SESSION['user']['password'])){
			echo "Incorrect";
		} else {
			require_once("connect.php");
				$sql_query = "UPDATE users SET username = '$newusername', first_name = '$firstname', last_name = '$lastname', email = '$email', home_address = '$homeaddress', password = '$newpassword' WHERE id = '$user_id'";
		}
	} else {
		if(!password_verify($oldpassword, $_SESSION['user']['password'])){
			echo "Incorrect";
		} else {
			require_once("connect.php");
				$sql_query = "UPDATE users SET username = '$newusername', first_name = '$firstname', last_name = '$lastname', email = '$email', home_address = '$homeaddress' WHERE id = '$user_id'";
		}
	}



		$result = mysqli_query($conn, $sql_query);

		if(!$result){
			echo mysqli_error($conn);
		}

		$sql_query2 = "SELECT * FROM users WHERE id = '$user_id'";
		$result2 = mysqli_query($conn, $sql_query2);
		$_SESSION['user'] = mysqli_fetch_assoc($result2);
		mysqli_close($conn);
		echo "Success";
?>