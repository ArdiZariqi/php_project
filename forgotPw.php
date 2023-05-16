<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login - Besa iTech</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="icon" href="logo.png">
</head>

<body class="body-login">
	<div class="black-fill"><br /> <br />
		<div class="d-flex justify-content-center align-items-center flex-column">
			<form class="login" method="post" action="verifyAcc.php" autocomplete="">

				<div class="text-center">
					<img src="Logo 1_a v5.png" width="200" height="200">
				</div>
				<h2 style="text-align: center;">Verify account</h2>
				<?php if (isset($_GET['error'])) { ?>
					<div class="alert alert-danger" role="alert">
						<?= $_GET['error'] ?>
					</div>
				<?php } ?>

				<div class="my-5 mx-5">
					<label class="form-label">Enter your email</label>
					<input type="email" class="form-control" name="email">
				</div>

				<div class="text-center">
					<button type="submit" class="btn btn-primary" style="width: 200px;">Verify account</button>
				</div>

				<div class="text-center mt-2">
				</div>
			</form>

			<br /><br />
			<div class="text-center text-light">
				<?php
				$pass = 895;
				$pass = password_hash($pass, PASSWORD_DEFAULT);
				echo $pass;
				?>
				<p>&copy; 2023 Besa iTech. All rights reserved.</p>
			</div>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>