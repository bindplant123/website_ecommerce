<?php
include "db.php";

$email = $_POST['email'];
$pass  = $_POST['pass'];
$cpass = $_POST['cpass'];

if($pass == $cpass){
    $hash = password_hash($pass, PASSWORD_DEFAULT);
    mysqli_query($conn, "UPDATE users SET password='$hash', otp='' WHERE email='$email'");
    echo "Password Updated Successfully!";
}else{
    echo "Password Not Match!";
}
?>
