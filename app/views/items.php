<?php
	$pageTitle = "Catalog";
	require("../controllers/get_products.php");
	require_once("../partials/start_body.php");
?>
<?php require_once("../partials/navbar.php") ?>

	<main id="main" class="role">
		<div class="container">
			<section class="row pt-5">
				<div class="col-md-3">
					<h2 class="text-center"> COLLECTIONS </h2>
				</div>
				<div class="col-md-3">
					<a class="btn btn-success" href="add_item.php"> Add an Item</a>
				</div>
				<!-- <div class="col-md-6">
					<div class="input-group">
						<input id="search-form" type="text" name="search" class="form-control" placeholder="Search Product">
						<div class="input-group-append">
							<span class="input-group-text" id="search-icon"><i class="fas fa-search"></i></span>
						</div>
					</div>
				</div> -->
			</section>

			<hr>

			<section class="row">
				<!-- <div class="category-container col-md-3">
					<ul class="list-group">
					  <?php foreach($categories as $category): ?>
					  	<li id="<?php echo $category["id"] ?>" class="list-group-item"><?php echo $category["name"] ?></li>
					  <?php endforeach; ?>
					</ul>
				</div> -->
				<div class="products-container col-md-12">
					<div class="card-columns">
						<?php foreach($items as $item): ?>
							<div class="card p-3">
							  <img class="card-img-top" src="../assets/images/<?php echo $item["image"] ?>" alt="Card image cap">
							  <div class="card-body p-0 pt-2">
							    <h5 class="card-title mb-1">
							    	<a href="product.php?id=<?php echo $item['id'] ?>">
							    		<?php echo $item["name"]; ?>
							    	</a>
							    </h5>
							    <p class="card-text mb-1 text-danger">PHP <?php echo number_format($item["price"], 2, ".", ",") ?></p>

						    	<a id="editbtn" name="edit" class="btn btn-primary" href="edit_items.php?id=<?php echo $item['id']; ?>">Edit Item</a>


							    <!-- pinasa yung id using GET NOT SAFE-->
							    <!-- <a class="btn btn-danger item-remove text-center" href="../controllers/delete_items.php?id=<?php echo $item['id']; ?> "> <i class="fas fa-times-circle"></i> Remove</a> -->

							    <!-- USING POST mas safe-->
								<form method="POST" action="../controllers/delete_items.php?id=<?php echo $item['id']; ?> "> <button class="btn btn-danger" name="delete"><i class="fas fa-times-circle"></i> Remove</button></form>
							  </div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</section>
		</div>
		<!-- <div id="snackbar"><i class="fas fa-check-circle"></i> Successfully Added to Cart</div> -->
	</main>




<?php
 require_once("../partials/end_body.php");
?>