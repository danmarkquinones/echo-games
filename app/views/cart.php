<?php

	$pageTitle = "Cart";
	require_once("../partials/start_body.php");
?>

	<?php require_once("../partials/navbar.php") ?>

	<main id="main">
		<div class="container py-5">
			<section class="row">
				<div class="col">
					<h1 class="text-center">My Cart</h1>
					<div class="table-reponsive">
						<table id="cart-items" class="table table-striped table-bordered">
							<thead>
								<tr class="text-center">
									<th>Item Name</th>
									<th>Item Price</th>
									<th>Item Quantity</th>
									<th>Item Subtotal</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php $cart_total = 0; ?>
								<?php if(isset($_SESSION["cart"]) && count($_SESSION["cart"]) != 0 ):?>
									<?php
										require_once("../controllers/connect.php");
										foreach ($_SESSION["cart"] as $id => $qty) {
											$sql = "SELECT * FROM items WHERE id = '$id' ";
											$item_info = mysqli_query($conn,$sql);
											$item = mysqli_fetch_assoc($item_info);
														// Quantity
											$subtotal = $_SESSION["cart"][$id] * $item["price"];
											$cart_total += $subtotal;
									?>
										<tr>
											<td class="item_name"><?php echo $item["name"] ?></td>
											<td class="item_price"><?php echo $item["price"] ?></td>
											<td class="item_quantity"><input class="form-control text-right" type="number" value="<?php echo $qty ?>" data-id="<?php echo $id ?>"></td>
											<td class="item_subtotal text-center"><?php echo $subtotal ?></td>
											<td><button class="btn btn-block btn-danger item-remove text-center" data-id="<?php echo $id ?>"> <i class="fas fa-times-circle"></i> Remove</button></td>
										</tr>
								<?php } mysqli_close($conn); ?>
							<?php endif; ?>
							</tbody>
							<tfoot>
								<tr>
									<td class="text-right font-weight-bold align-middle" colspan="3">Total:</td>
									<td id="total_price" class="text-center font-weight-bold align-middle">
										<?php echo $cart_total; ?>
									</td>
									<td><a class="btn btn-block btn-warning clear-all text-center" href="../controllers/clear_cart.php"><i class="far fa-times-circle"></i> Clear Cart</a></td>
								</tr>
								<tr>
									<td class="text-right align-middle" colspan="5">
										<a href="checkout.php" class="btn btn-primary">Checkout</a>
									</td>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</section>
		</div>
	</main>








	<?php require_once("../partials/end_body.php") ?>