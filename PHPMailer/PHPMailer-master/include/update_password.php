<?php
include "db.php";

$email = $_POST['email'];
$otp   = $_POST['otp'];

$sql = "SELECT * FROM users WHERE email='$email' AND otp='$otp'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){
?>
<form action="save_password.php" method="POST">
    <input type="hidden" name="email" value="<?php echo $email; ?>">
    <input type="password" name="pass" placeholder="New Password" required>
    <input type="password" name="cpass" placeholder="Confirm Password" required>
    <button type="submit">Update Password</button>
</form>
<?php
}else{
    echo "Invalid OTP!";
}
?>
