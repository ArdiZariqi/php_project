<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Besa iTech</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="logo.png">
</head>

<body class="body-login">
    <div class="black-fill"><br /> <br />
        <div class="d-flex justify-content-center align-items-center flex-column">
            <form class="login" method="post" action="req/register.php">

                <div class="text-center">
                    <img src="Logo 1_a v5.png" width="200">
                </div>
                <h2 style="text-align: center;">REGISTER</h2>
                <?php if (isset($_GET['error'])) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $_GET['error'] ?>
                    </div>
                <?php } ?>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" name="uname">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="pass">
                </div>

                <div class="mb-3">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="confirm_pass">
                </div>
                <div class="mb-3">
                    <label class="form-label">Register As</label>
                    <select class="form-control" name="role">
                        <option value="3">Student</option>
                        <option value="2">Teacher</option>
                        <option value="1">Admin</option>
                        <option value="4">Registrar Office</option>
                    </select>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary" style="width: 200px;">Register</button>
                </div>

                <div class="text-center mt-2">
                    <p>Already have an account? <a href="login.php" class="text-decoration-none">Login here</a></p>
                </div>
            </form>

            <br /><br />
            <div class="text-center text-light">
                <p>&copy; 2022 Besa iTech. All rights reserved.</p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>