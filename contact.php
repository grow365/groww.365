<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);



$to = "grow.365up@gmail.com";
$subject = "Test Email";
$message = "This is a test email";
$headers = "From: test@example.com";

if (mail($to, $subject, $message, $headers)) {
    echo "Mail sent successfully!";
} else {
    echo "Failed to send mail.";
}





// Enable error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect the form data
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Specify your email address
    $to = "grow.365up@gmail.com"; // Replace with your email address
    $headers = "From: " . $email . "\r\n" .
               "Reply-To: " . $email . "\r\n" .
               "Content-Type: text/html; charset=UTF-8";

    // Compose the email
    $emailBody = "<strong>Email:</strong> " . $email . "<br>";
    $emailBody .= "<strong>Subject:</strong> " . $subject . "<br>";
    $emailBody .= "<strong>Message:</strong><br>" . nl2br($message);

    // Send the email
    if (mail($to, $subject, $emailBody, $headers)) {
        echo "success"; // This is returned to the JavaScript on success
    } else {
        echo "error";
    }
}
