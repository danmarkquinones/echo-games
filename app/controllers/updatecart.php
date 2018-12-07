<?php
//WE'RE GOIN TO MODIFY THIS ONE TO CHANGE THE QUANTITY IN CART PAGE
//we dont need db collect we are just manipulating the update cart
	session_start();

	function getCartCount(){
		return array_sum($_SESSION["cart"]);
	}

	$item_id = htmlspecialchars($_POST["item_id"]);
	$item_quantity = htmlspecialchars($_POST["item_quantity"]);
	$ifFromCatalogPage = $_POST["ifFromCatalogPage"];
//since galing sa input palaging string ang value
	if($item_quantity == "0"){
		unset($_SESSION["cart"]["$item_id"]);
	} else {

		if(isset($_SESSION["cart"][$item_id])){
			// Add it to our session variable
			if($ifFromCatalogPage == 1){
				$_SESSION["cart"][$item_id] += $item_quantity;
				//in catalog, we keep on adding
			}else{
				$_SESSION["cart"]["$item_id"] = $item_quantity;
				//in cart, we assign
			}
		}else{
			$_SESSION["cart"]["$item_id"] = $item_quantity;
		}
	}

	echo getCartCount();
?>