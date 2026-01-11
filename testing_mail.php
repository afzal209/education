<?php
$to = "afzal02747@gmail.com";
$subject = "Test Email from Namecheap Server";
$message = "This is a test email.";
$headers = "login@moalym.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

if (mail($to, $subject, $message, $headers)) {
    echo "Mail sent successfully!";
} else {
    echo "Mail sending failed!";
}
?>
