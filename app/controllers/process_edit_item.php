<?php
	// print_r($_POST);
	require_once("connect.php");
	$id = $_GET['id'];
	$name = $_POST['name'];
	$price = $_POST['price'];
	$description = $_POST['description'];
	$category_id = $_POST['category_id'];

	if($_FILES['image']['size'] !== 0){

		move_uploaded_file($_FILES['image']['tmp_name'], '../assets/images/' . $_FILES['image']['name']);
		$image_path = $_FILES['image']['name'];
		$sql = "UPDATE items SET name = '$name' , price = $price , description = '$description' , category_id = $category_id , image =  '$image_path' WHERE id = $id";

	} else {
		$sql = "UPDATE items SET name = '$name' , price = $price , description = '$description' , category_id = $category_id  WHERE id = $id";
	}

	if(!mysqli_query($conn, $sql)) die (mysqli_error($conn));

	header("Location: ../views/items.php");

	mysqli_close($conn);
?>