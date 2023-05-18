<?php
// Generate a random verification code
$verificationCode = generateVerificationCode();

// Save the verification code in the database for the given user
$email = $_POST['mail']; // Get the email from the form
saveVerificationCode($email, $verificationCode);

// Send the email with the verification code
$apiKey = 'nnoreply250';
$fromEmail = 'nnoreply250@gmail.com';
$subject = 'Verification Code';
$message = 'Your verification code is: ' . $verificationCode;

$url = 'https://api.sendgrid.com/v3/mail/send';

$headers = array(
    'Authorization: Bearer ' . $apiKey,
    'Content-Type: application/json'
);

$data = array(
    'personalizations' => array(
        array(
            'to' => array(
                array(
                    'email' => $email
                )
            )
        )
    ),
    'from' => array(
        'email' => $fromEmail
    ),
    'subject' => $subject,
    'content' => array(
        array(
            'type' => 'text/plain',
            'value' => $message
        )
    )
);

$options = array(
    'http' => array(
        'header'  => implode("\r\n", $headers),
        'method'  => 'POST',
        'content' => json_encode($data)
    )
);

$context  = stream_context_create($options);
$response = file_get_contents($url, false, $context);

if ($response !== false) {
    // Redirect the user to the verification page
    header('Location: verify_code.php');
    exit;
} else {
    // Failed to send email
    echo 'Email sending failed. Please try again.';
}

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
    $code = '';

    $characterCount = strlen($characters);
    for ($i = 0; $i < $length; $i++) {
        $randomIndex = rand(0, $characterCount - 1);
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
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE admin SET activation = '$verificationCode' WHERE email_address = '$email'";

    if ($conn->query($sql) === true) {
        echo "Verification code saved successfully.";
    } else {
        echo "Error saving verification code: " . $conn->error;
    }

    $conn->close();
}
