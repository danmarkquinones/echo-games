<?php

require_once("connect.php");

if(isset($_POST["search"])) {
	$searchVal = htmlspecialchars($_POST["search"]);
	$searchVal = preg_replace("#[^0-9a-z]#i", "", $searchVal);
} else {
	$searchVal = NULL;
}

$sql = "SELECT * FROM items WHERE LOWER(name) LIKE '%$searchVal%'";

$result = mysqli_query($conn, $sql);

$searchedItems = mysqli_fetch_all($result, MYSQLI_ASSOC);

if($searchedItems) {
	echo json_encode($searchedItems);
} else {
	echo "";
}

mysqli_close($conn);
