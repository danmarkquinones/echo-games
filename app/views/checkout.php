<?php
	$pageTitle = "Checkout";
	require_once("../partials/start_body.php");
	require_once("../partials/navbar.php");
?>

<?php
	if(!isset($_SESSION["user"])){
		header("Location: login.php");
	}else{
?>
	<main id="main">
		<div class="container py-5">
			<section class="row">
				<div class="col">
					<h1 class="text-center">Checkout Page</h1>
					<form method="POST" action="../controllers/placeorder.php">
						<!-- TODO: placeorder.php controller -->
						<div class="container">
							<div class="row mt-4">
								<div class="col-lg-8">
									<h4>Shipping address</h4>
									<div class="form-group">
										<input type="text" name="addressLine" class="form-control" value="<?php echo $_SESSION['user']['home_address'] ?>">
									</div>
								</div>
								<div class="col-lg-4">
									<h4>Amount to pay</h4>
									<span id="total-price" class="font-weight-bold d-block">
										<?php
											$cart_total=0;
											require_once("../controllers/connect.php");
											foreach ($_SESSION["cart"] as $id => $qty) {
												$sql_query = "SELECT * FROM items WHERE id = $id";
												$item_info = mysqli_query($conn,$sql_query);
												$item = mysqli_fetch_assoc($item_info);

												$subtotal = $_SESSION["cart"][$id] * $item["price"];
												$cart_total += $subtotal;
											}
											echo $cart_total;
										?>
									</span>
									<button type="submit" class="btn btn-primary"> Place Order Now</button>
								</div>
							</div>
						</div>
					</form>
					<div class="table-responsive">
						<h4>Order Summary</h4>
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>Item Name</th>
									<th>Item Price</th>
									<th>Item Quantity</th>
									<th>Subtotal</th>
								</tr>
							</thead>
							<tbody>
								<?php if(isset($_SESSION["cart"]) && count($_SESSION["cart"]) != 0 ):?>
									<?php
										require_once("../controllers/connect.php");
										$cart_total = 0;
										foreach ($_SESSION["cart"] as $id => $qty) {
											$sql = "SELECT * FROM items WHERE id = '$id' ";
											$item_info = mysqli_query($conn,$sql);
											$item = mysqli_fetch_assoc($item_info);
											$subtotal = $_SESSION["cart"][$id] * $item["price"];
									?>
										<tr>
											<td class="item_name"><?php echo $item["name"] ?></td>
											<td class="item_price"><?php echo $item["price"] ?></td>
											<td class="item_quantity"><?php echo $qty ?></td>
											<td class="item_subtotal text-center"><?php echo $subtotal ?></td>
										</tr>
									<?php } mysqli_close($conn); ?>
								<?php endif; ?>
							</tbody>
						</table>
					</div>
				</div>
			</section>
		</div>
	</main>
<?php } ?>





<?php
	require_once("../partials/end_body.php")
?>