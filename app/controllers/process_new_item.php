<?php
	require_once("connect.php");
	$name = htmlspecialchars($_POST["name"]);
	$price = htmlspecialchars($_POST["price"]);
	$description = htmlspecialchars($_POST["description"]);
	$category_id = htmlspecialchars($_POST["category_id"]);

	$image = $_FILES['image']['name'];


print_r($_POST);
print_r($_FILES['image']['name']);

//para masave sa folder
move_uploaded_file($_FILES['image']['tmp_name'], '../assets/images/' . $_FILES['image']['name']);
	// $sql = "SELECT*FROM items";
	$sql = "INSERT INTO items(name, price , description , image , category_id) VALUES ('$name',$price,'$description','$image',$category_id)";
	mysqli_query($conn, $sql) or die(mysqli_error($conn));

	header('Location: ../views/catalog.php');
	mysqli_close($conn);
?>