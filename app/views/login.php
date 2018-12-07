
<?php
$pageTitle = "Login";
require_once("../partials/start_body.php")

?>
<!-- Navbar -->
<?php require_once("../partials/navbar.php")?>

<!-- Register Layout -->
<main id="main" role="main">
	<div class="container py-5">
		<section class="row">
			<div class="col">
			<h1 class="text-center"><img class="brand-logo img-fluid" width="50" height="50" src="../assets/images/brand-logo-1.png" alt="">Login</h1>
			<div class=" col-6 d-block mx-auto">
				<form class="form-group">
					<div class="row">
						<div class="col-12">
							<label for="username-email">Username or Email:</label>
							<input id="username-email" class="form-control" type="text" name="username-email" placeholder="Enter Username or E-mail">
							<span class="text-danger small"></span>
						</div>
						<div class="col-12">
							<label for="password">Password:</label>
							<input id="password" class="form-control" type="password" name="password" placeholder="Enter Password">
							<span class="text-danger small"></span>
						</div>
						<div class="col-12">
							<button id="login" type="submit" class="btn btn-success btn-block mt-2">Log In</button>
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