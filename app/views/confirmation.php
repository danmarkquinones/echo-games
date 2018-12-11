<?php
	$pageTitle = "confirmation";
	require_once ("../partials/start_body.php");
	require_once ("../partials/navbar.php");
?>
<?php
	if(isset($_SESSION['txn_number']) && isset($_SESSION['address'])){
?>
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<h1>Confirmation Page</h1>
				<h3>Reference No.: <?php echo $_SESSION['txn_number']?></h3>
				<h3>Shippped to: <?php echo $_SESSION['address'] ?></h3>
				<p>Thank you for shopping! Your order is now being process</p>
				<a class="btn btn-primary" href="catalog.php"> Continue Shopping </a>
				<?php
					unset($_SESSION['txn_number']);
					unset($_SESSION['address']);
				?>
			</div>
		</div>
	</div>
<?php
	} else {
		header("Location: catalog.php");
	}
?>




<?php
require_once("../partials/end_body.php")
?>