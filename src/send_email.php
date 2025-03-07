<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $comment = htmlspecialchars($_POST['comment']);

    // Set your email address where you want to receive comments
    $to = "migelbrian3@gmail.com"; // Replace with your email
    $subject = "Hey you have a New Comment from your Portfolio Website";

    // Email message
    $message = "Name: $name\n";
    $message .= "Email: $email\n";
    $message .= "Comment:\n$comment\n";

    // Email headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        echo "<p>Thank you for your comment, $name! I will get back to you soon.</p>";
    } else {
        echo "<p>Sorry, there was an error sending your comment. Please try again later.</p>";
    }
} else {
    echo "<p>Invalid request.</p>";
}
?>