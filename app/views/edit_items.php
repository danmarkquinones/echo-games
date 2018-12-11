<?php
$pageTitle = "EDIT ITEM";
require_once("../partials/start_body.php");
	require_once("../controllers/connect.php");
	$id = $_GET['id'];
	$sql = "SELECT * FROM items WHERE id = $id";
	$item = mysqli_fetch_assoc(mysqli_query($conn , $sql));
	extract($item);

?>
	<?php require_once("../partials/navbar.php") ?>
	<main class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2">
				<form method="POST" action="../controllers/process_edit_item.php?id=<?php echo $item['id']; ?>" enctype="multipart/form-data">
					<div class="form-group mt-3 row">
						<div class="col-md-3">
							<h2>Edit Item</h2>
						</div>
						<div class="col-md-12">
								<label for="name">Name:</label>
								<input id="name" class="form-control" type="text" name="name" required value="<?php echo $name; ?>">

								<label for="price">Price:</label>
								<input id="price" class="form-control" type="number" min="1" name="price" value="<?php echo $price; ?>">

								<label for="description">Description:</label>
								<textarea name="description" id="description" class="form-control mb-1" cols="30" rows="5"><?php echo $description; ?>
								</textarea>

								<label for="image" value="<?php $item['image']?>">Upload image:</label>
								<input id="image" class="d-block" name="image" type="file" accept="image/*">

								<label for="category">Category:</label>
								<select name="category_id" id="category" class="form-control mt-1">
									<!-- kailangan kasi si category -->
									<?php require_once("../controllers/get_categories.php"); ?>
									<?php foreach($categories as $category):?>
									<?php
										if($category['id'] === $category_id) {
											echo "<option selected value='".$category['id']."'>".$category['name']."</option>";
										}else{
											echo "<option value='".$category['id']."'>".$category['name']."</option>";
										}

									?>
									<?php endforeach ;?>
								</select>
							<button id="add-item" class="btn btn-success mt-1" type="submit">Edit Item</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</main>

<?php
	require_once("../partials/end_body.php");
?>