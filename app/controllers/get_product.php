<?php

require("connect.php");

if(isset($_GET['id']) && is_numeric($_GET['id']) /*ctype_digit($_GET['id'])*/) {
	$prod_id = htmlspecialchars($_GET['id']);
} else {
	$prod_id = NULL;
}

$sql = "SELECT * FROM items where id = '$prod_id'";

$result = mysqli_query($conn, $sql);;

$product = mysqli_fetch_assoc($result);	

mysqli_close($conn);