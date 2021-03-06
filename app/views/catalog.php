<?php
$pageTitle = "Catalog";
require("../controllers/get_categories.php");
require("../controllers/get_products.php");
require_once("../partials/start_body.php"); ?>

	<?php require_once("../partials/navbar.php") ?>

	<main id="main" class="role">
		<div class="container">
			<section class="row pt-5">
				<div class="col-md-3">
					<h2 class="text-center"> COLLECTION </h2>
				</div>
				<div class="col">
					<div class="input-group">
						<input id="search-form" type="text" name="search" class="form-control" placeholder="Search Product">
						<div class="input-group-append">
							<span class="input-group-text" id="search-icon"><i class="fas fa-search"></i></span>
						</div>
					</div>
				</div>
			</section>

			<hr>

			<section class="row">
				<div class="category-container col-md-3">
					<ul class="list-group">
					  <?php foreach($categories as $category): ?>
					  	<li id="<?php echo $category["id"] ?>" class="list-group-item"><?php echo $category["name"] ?></li>
					  <?php endforeach; ?>
					</ul>
				</div>
				<div class="products-container col-md-9">
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

							    <!-- FOR ADD TO CART -->
							    <input type="number" class="form-control mb-2" value=1>
							    <button data-id="<?php echo $item["id"] ?>" class="btn btn-sm btn-outline-primary add-cart">Add To Cart</button>
							  </div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</section>
		</div>
		<div id="snackbar"><i class="fas fa-check-circle"></i> Successfully Added to Cart</div>
	</main>

<?php require_once("../partials/end_body.php") ?>