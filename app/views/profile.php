<?php
	$pageTitle = "Profile";
	require_once("../partials/start_body.php");
	require_once("../partials/navbar.php");
	require_once("../controllers/connect.php");
?>

	<div class="container mt-5">
		<div class="row">
			<div class="col-lg-3">
				<div id="list-tab" class="list-group"  role="tab-list">
					<a href="#profile" class="list-group-item" data-toggle="list" role="tab">User Information</a>
					<a href="#history" class="list-group-item" data-toggle="list" role="tab">Order History</a>
				</div>
			</div>
			<div class="col-lg-7">
				<div class="tab-content">
					<div id="profile" class="tab-pane" role="tabpanel">
						<h3>User Information</h3>
						<h4 >HELLO, <?php echo $_SESSION['user']['username']?></h4>
						<span id="updatestatus" class="text-success"></span>
						<form action="">

							<div class="form-group">
								<input id="user_id" type="text" name="user_id" class="form-control" value="<?php echo $_SESSION['user']['id']; ?>" hidden readonly>

								<label for="username" class="d-block">Username:</label>
								<input id="username" class="form-control" type="text" name="username" value="<?php echo $_SESSION['user']['username']?>" disabled>
								<span class="validation text-danger"></span>

								<label for="firstname" class="d-block">First Name:</label>
								<input id="firstname" class="form-control" type="text" name="firstname" value="<?php echo $_SESSION['user']['first_name'] ?>" >
								<span class="validation text-danger"></span>

								<label for="lastname" class="d-block">Last Name:</label>
								<input id="lastname" class="form-control" type="text" name="lastname" value="<?php echo $_SESSION['user']['last_name'] ?>">
								<span class="validation text-danger"></span>

								<label for="email" class="d-block">Email:</label>
								<input id="email" class="form-control" type="text" name="email" value="<?php echo $_SESSION['user']['email'] ?>">
								<span class="validation text-danger"></span>

								<label for="homeaddress" class="d-block">Home Address:</label>
								<input id="homeaddress" class="form-control" type="text" name="homeaddress" value="<?php echo $_SESSION['user']['home_address'] ?>">
								<span class="validation text-danger"></span>

								<label for="password" class="d-block">Old Password:</label>
								<input id="password" class="form-control" type="text" name="password">
								<span class="validation text-danger"></span>

								<label for="newpassword" class="d-block">New Password: <small>Leave this blank if you dont want to change your password</small></label>
								<input id="newpassword" class="form-control" type="text" name="newpassword">
								<span class="validation text-danger"></span>

								<label for="confirmnewpassword" class="d-block">Confirm New Password:</label>
								<input id="confirmnewpassword" class="form-control" type="text" name="confirmnewpassword">
								<span class="validation text-danger"></span>

								<button id="updateinfo" class="btn btn-success mt-1 btn-block" type="button">Update Info</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

	</div>

<?php
	require_once("../partials/end_body.php")
?>