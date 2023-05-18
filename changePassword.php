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
            <form class="login" method="post" action="">

                <div class="text-center">
                    <img src="Logo 1_a v5.png" width="200" height="200">
                </div>
                <h2 style="text-align: center;">Change Password</h2>
                <div class="mb-3">
                    <label class="form-label">New Password</label>
                    <input type="password" class="form-control" name="new_password">
                </div>

                <div class="mb-3">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="confirm_password">
                </div>
                <div class="mb-3">
                    <!-- <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>"> -->
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary" style="width: 200px;">Change Password</button>
                </div>

                <div class="text-center mt-5">
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

<?php
function saveNewPassword($email, $newPassword)
{
    // Kryeni lidhjen me bazën e të dhënave
    $servername = "localhost: 3307";
    $username = "root";
    $password = "";
    $dbname = "sms_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kontrolloni lidhjen
    if ($conn->connect_error) {
        die("Lidhja me bazën e të dhënave dështoi: " . $conn->connect_error);
    }

    // Hash fjalëkalimin e ri për siguri
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    // Përgatitni query-n për të azhurnuar fjalëkalimin në bazën e të dhënave
    $sql = "UPDATE admin SET password = '$hashedPassword' WHERE email_address = '$email'";

    // Ekzekutoni query-n
    if ($conn->query($sql) === TRUE) {
        echo "Paswordin u nderrua me sukses.";
    } else {
        echo "Gabim gjatë azhurnimit të fjalëkalimit: " . $conn->error;
    }

    // Mbylleni lidhjen me bazën e të dhënave
    $conn->close();
}


?>