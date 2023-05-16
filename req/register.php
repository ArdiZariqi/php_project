<?php

include("DB_connection.php");

if(isset($_POST['register_btn']))
{
    $name = $_POST['name'];
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    // Email Exists or not
    $check_email_query = "SELECT email_address FROM teachers WHERE email_address= '$email' LIMIT 1";
}
