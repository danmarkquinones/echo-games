<?php
	require_once("connect.php");


	if(isset($_POST['delete'])){//button name
		$id =$_GET['id']; //try lang sa get

		$image = $_FILES['image']['name'];
		$sql_img = "SELECT image FROM items";
		$result_img = mysqli_query($conn,$sql_img);


		unlink('../assets/images' . $_FILES['image']['name']);

		var_dump($result_img);
		// $sql = "DELETE FROM items WHERE items.id = $id";
		// $result = mysqli_query($conn, $sql);
		echo "successfully deleted";
	}else{
		echo "you dont have permission to access this page";
	}

	// header("Location: ../views/items.php");

	mysqli_close($conn);

?>