<?php
include 'db.php';
include 'header.php';
$err = "";
$msg = "";

if (isset($_POST['submit'])) {
    $email = trim($_POST['email']);

    if (empty($email)) {
        $err = 'Please enter your email address';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $err = 'Invalid email format';
    } else {
        $email = mysqli_real_escape_string($con, $email);
        $check_mail = mysqli_query($con, "SELECT * FROM user WHERE email = '$email'");

        if (mysqli_num_rows($check_mail) == 0) {
            $err = 'No account found with this email';
        } else {
            $token = bin2hex(random_bytes(50)); // Generate a secure token
            $expiry = date("Y-m-d H:i:s", strtotime("+1 hour")); // Token expires in 1 hour

            mysqli_query($con, "UPDATE user SET reset_token='$token', reset_expiry='$expiry' WHERE email='$email'");

            $reset_link = "https://yourwebsite.com/reset_password.php?token=$token";
            $subject = "Password Reset Request";
            $body = "<p>Click the link below to reset your password:</p>
                     <p><a href='$reset_link'>$reset_link</a></p>
                     <p>This link will expire in 1 hour.</p>";

            sendMail($email, $subject, $body);

            $msg = 'A password reset link has been sent to your email';
        }
    }
}

if (!empty($err)) echo customAlert('error', $err);
if (!empty($msg)) echo customAlert('success', $msg);
?>

<!-- HTML Form -->
<form method="POST" action="forgot_password.php">
    <input type="email" name="email" placeholder="Enter your email" required>
    <button type="submit" name="submit">Send Reset Link</button>
</form>
