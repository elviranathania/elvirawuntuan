<?php
// Basic contact form handler without external library

$receiving_email_address = 'contact@example.com'; // Replace with your real email

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    $body = "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Subject: $subject\n\n";
    $body .= "Message:\n$message\n";

    if (mail($receiving_email_address, $subject, $body, $headers)) {
        echo 'OK';
    } else {
        echo 'Error sending email.';
    }
} else {
    echo 'Invalid request method.';
}
?>
