<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$email = $_POST['email_address'];

	if (checkEmailExists($email)) {

		$verificationCode = generateVerificationCode();
		saveVerificationCode($email, $verificationCode);

		$smtpServer = 'smtp.sendgrid.net';
		$smtpPort = 465;
		$smtpUsername = 'apikey';
		$smtpPassword = 'nnoreply250';
		$smtpEncryption = 'tls';

		$subject = 'Password Reset Code';
		$message = 'Your password reset code is: ' . $verificationCode;
		$from = 'nnoreply250@gmail.com';
		$headers = 'From: ' . $from . "\r\n" .
			'Reply-To: ' . $from . "\r\n" .
			'X-Mailer: PHP/' . phpversion();

		if (mail($email, $subject, $message, $headers)) {
			header('Location: verify_code.php?email=' . $email);
			exit;
		} else {
			$error = 'Email sending failed. Please try again.';
		}
	} else {
		$error = 'Email not found. Please enter a valid email address.';
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Forgot Password - Besa iTech</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="icon" href="logo.png">
</head>

<body class="body-login">
	<div class="black-fill"><br /> <br />
		<div class="d-flex justify-content-center align-items-center flex-column">
			<form class="login" method="post" action="">
				<div class="text-center">
					<img src="Logo 1_a v5.png" width="200" height="200">
				</div>
				<h2 style="text-align: center;">Forgot Password</h2>
				<?php if (isset($error)) { ?>
					<div class="alert alert-danger" role="alert">
						<?= $error ?>
					</div>
				<?php } ?>
				<div class="mb-3">
					<label class="form-label">Email Address</label>
					<input type="email" class="form-control" name="email_address" required>
				</div>
				<div class="text-center">
					<button type="submit" class="btn btn-primary" style="width: 200px;">Send Verification Code</button>
				</div>
			</form>
			<br /><br />
			<div class="text-center text-light">
				<p>&copy; 2023 Besa iTech. All rights reserved.</p>
			</div>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
function checkEmailExists($email)
{
	$servername = "localhost: 3307";
	$username = "root";
	$password = "";
	$dbname = "sms_db";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die("Lidhja me bazën e të dhënave dështoi: " . $conn->connect_error);
	}

	$email = $conn->real_escape_string($email);
	$sql = "SELECT * FROM admin WHERE email_address = '$email'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		$conn->close();
		return true;
	} else {
		$conn->close();
		return false;
	}
}


function generateVerificationCode($length = 6)
{
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$characterCount = strlen($characters);

	$code = '';
	for ($i = 0; $i < $length; $i++) {
		$randomIndex = random_int(0, $characterCount - 1);
		$code .= $characters[$randomIndex];
	}

	return $code;
}



function saveVerificationCode($email, $verificationCode)
{

	$servername = "localhost: 3307";
	$username = "root";
	$password = "";
	$dbname = "sms_db";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die("Lidhja me bazën e të dhënave dështoi: " . $conn->connect_error);
	}

	$email = $conn->real_escape_string($email);
	$verificationCode = $conn->real_escape_string($verificationCode);

	$sql = "UPDATE admin SET activation = '$verificationCode' WHERE email_address = '$email'";

	if ($conn->query($sql) === TRUE) {
		echo "Kodi verifikues u ruajt me sukses.";
	} else {
		echo "Gabim gjatë ruajtjes së kodit verifikues: " . $conn->error;
	}

	$conn->close();
}
?>