<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if email fields are filled
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($_POST['message']);

    if (empty($name) || empty($email) || empty($message)) {
        echo "All fields are required!";
        exit;
    }

    // Email settings
    $to = "mdsishuvo254@gmail.com";  // Your email address here
    $subject = "New Message from Website Contact Form";
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    
    // Message body
    $body = "<h2>Message from: " . $name . "</h2>";
    $body .= "<p>Email: " . $email . "</p>";
    $body .= "<p>Message:</p>";
    $body .= "<p>" . nl2br($message) . "</p>";

    // Send the email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }
    
    else if (mail($to, $subject, $body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Message could not be sent.";
    }
} else {
    echo "Invalid request.";
}
?>
