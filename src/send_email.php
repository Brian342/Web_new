<?php
error_reporting(0);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $comment = isset($_POST['comment']) ? trim($_POST['comment']) : '';

    // Simple validation
    if (empty($name) || empty($email) || empty($comment)) {
        echo "error";
        exit;
    }

    // Email configuration
    $to = "migelbrian3@gmail.com";
    $subject = "New Comment from Portfolio Website";
    
    // Email message
    $message = "Name: " . $name . "\n";
    $message .= "Email: " . $email . "\n";
    $message .= "Date: " . date("Y-m-d H:i:s") . "\n\n";
    $message .= "Message:\n" . $comment . "\n";

    // Try to send email
    @mail($to, $subject, $message);

    // Save to file as well
    $file_path = "messages.txt";
    $file_content = "=====================================\n";
    $file_content .= "Name: " . $name . "\n";
    $file_content .= "Email: " . $email . "\n";
    $file_content .= "Date: " . date("Y-m-d H:i:s") . "\n";
    $file_content .= "Message: " . $comment . "\n";
    $file_content .= "=====================================\n\n";
    
    // Attempt to write to file
    @file_put_contents($file_path, $file_content, FILE_APPEND);
    
    // Always return success
    echo "success";
    exit;
}

echo "error";
exit;
?>