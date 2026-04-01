<?php
session_start();
include "db.php";   // your DB connection

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$email = $_POST['email'];
$otp = rand(100000, 999999);

// Save OTP in DB
mysqli_query($conn, "UPDATE users SET otp='$otp' WHERE email='$email'");

$mail = new PHPMailer(true);

try {
    // SMTP Settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'yourgmail@gmail.com';   // YOUR EMAIL
    $mail->Password   = 'your_app_password';     // GMAIL APP PASSWORD
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Email Content
    $mail->setFrom('yourgmail@gmail.com', 'Your Project Name');
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject = 'Your OTP Code';
    $mail->Body    = "<h2>Your OTP is: <b>$otp</b></h2>";

    $mail->send();
    echo "OTP Sent Successfully. <a href='verify_otp.php'>Verify OTP</a>";

} catch (Exception $e) {
    echo "Email Error: {$mail->ErrorInfo}";
}
?>
