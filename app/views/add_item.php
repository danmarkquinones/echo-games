<?php
$pageTitle = "Catalog";
require_once("../partials/start_body.php");
require_once("../controllers/get_categories.php");
?>
	<?php require_once("../partials/navbar.php") ?>
	<main class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2">
				<form method="POST" action="../controllers/process_new_item.php" enctype="multipart/form-data">
					<div class="form-group mt-3 row">
						<div class="col-md-3">
							<h2>Add Items</h2>
						</div>
						<div class="col-md-3">
							<a class="btn btn-primary" href="items.php">Edit Item</a>
						</div>
						<div class="col-md-12">
							<label for="name">Name:</label>
							<input id="name" class="form-control" type="text" name="name" required>
							<label for="price">Price:</label>
							<input id="price" class="form-control" type="number" min="1" name="price">
							<label for="description">Description:</label>
							<textarea name="description" id="description" class="form-control mb-1" cols="30" rows="5"></textarea>
							<label for="image">Upload image:</label>
							<input id="image" class="d-block" name="image" type="file" accept="image/*">
							<label for="category">Category:</label>
							<select name="category_id" id="category" class="form-control mt-1">
								<?php foreach($categories as $category):?>
									<option value="<?php echo $category["id"]?>"><?php echo $category["name"]?></option>
								<?php endforeach ;?>
							</select>
							<button id="add-item" class="btn btn-success mt-1" type="submit">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</main>

<?php
	require_once("../partials/end_body.php");
?>