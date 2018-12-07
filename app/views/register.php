<?php
$pageTitle = "Register";
require_once("../partials/start_body.php")

?>
<!-- Navbar -->
<?php require_once("../partials/navbar.php")?>

<!-- Register Layout -->
<main id="main" role="main">
	<div class="container py-5">
		<section class="row">
			<div class="col">
			<h1 class="text-center"><img class="brand-logo img-fluid" width="50" height="50" src="../assets/images/brand-logo-1.png" alt="">Register</h1>
			<div class=" col-6 d-block mx-auto">
				<form class="form-group" method="post" action="">
					<div class="row">
						<div class="col-6">
							<label for="firstname">First Name:</label>
							<input id="firstname" class="form-control" type="text" name="firstname" placeholder="Enter First Name">
							<span class="text-danger small"></span>
						</div>
						<div class="col-6">
							<label for="lastname">Last Name:</label>
							<input id="lastname" class="form-control" type="text" name="lastname" placeholder="Enter Last Name">
							<span class="text-danger small"></span>
						</div>
						<div class="col-12">
							<label for="address">Home Address:</label>
							<input id="address" class="form-control" type="text" name="address" placeholder="Enter Home Address">
							<span class="text-danger small"></span>
						</div>
						<div class="col-6">
							<label for="username">Username:</label>
							<input id="username" class="form-control" type="text" name="username" placeholder="Enter Username">
							<span class="text-danger small"></span>
						</div>
						<div class="col-6">
							<label for="email">E-mail:</label>
							<input id="email" class="form-control" type="email" name="email" placeholder="Enter E-mail Address">
							<span class="text-danger small"></span>
						</div>
						<div class="col-6">
							<label for="password">Password:</label>
							<input id="password" class="form-control" type="password" name="password" placeholder="Enter Password">
							<span class="text-danger small"></span>
						</div>
						<div class="col-6">
							<label for="confirm-password">Confirm Password:</label>
							<input id="confirm-password" class="form-control" type="password" name="confirm-password" placeholder="Retype Password">
							<span class="text-danger small"></span>
						</div>
						<div class="col-12">
							<button id="add-user" type="submit" class="btn btn-success btn-block mt-2">Sign Up</button>
							<span class="text-success"></span>
						</div>
					</div>
				</form>
			</div>

			</div>
		</section>
	</div>
</main>
<?php require_once("../partials/end_body.php")?>