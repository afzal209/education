<?php
if (isset($_POST['submit'])) {

    include('../db/connect.php');
include_once '../../function/query.php';
$get_url = get_url($con);
    if (empty($_POST['email'])) {
        header('location: ../forgetpassword.php?response=error&class=danger&message=Email is required');
        exit;
    }

    $email = mysqli_real_escape_string($con, $_POST['email']);

    $check = mysqli_query($con, "SELECT id FROM user WHERE email='$email'");

    if (mysqli_num_rows($check) > 0) {

        // Generate token
        $token = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 20);

        // 🔹 Dynamic base URL
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
        $base_url = $protocol . "://" . $_SERVER['HTTP_HOST'];

        // 🔹 Reset URL
        // $reset_url = $base_url . "/resetpassword.php?token=$token&email=$email";
        $reset_url = $get_url['url'] . "admin/resetpassword.php?token=" . urlencode($token) . "&email=$email";

        // Email content
        $subject = "Reset Your Password";

        $message = "
        <html>
        <body>
            <p>Hello,</p>
            <p>Click the button below to reset your password:</p>
            <p>
                <a href='$reset_url'
                   style='background:#026502;color:#fff;padding:10px 15px;text-decoration:none;border-radius:5px;'>
                    Reset Password
                </a>
            </p>
            <p>If you didn’t request this, please ignore this email.</p>
        </body>
        </html>
        ";

        // 🔹 Headers (IMPORTANT)
        $headers  = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8\r\n";
        $headers .= "From: Safa Solo <no-reply@safasolo.com>\r\n";
        $headers .= "Reply-To: no-reply@safasolo.com\r\n";

        // Send mail
        if (mail($email, $subject, $message, $headers)) {

            // Save token
            mysqli_query($con, "UPDATE user SET token='$token' WHERE email='$email'");

            header('location: ../forgetpassword.php?response=success&class=success&message=Check your email to reset password');
            exit;

        } else {
            header('location: ../forgetpassword.php?response=error&class=danger&message=Mail sending failed');
            exit;
        }

    } else {
        header('location: ../forgetpassword.php?response=error&class=danger&message=Email does not exist');
        exit;
    }
}
?>
