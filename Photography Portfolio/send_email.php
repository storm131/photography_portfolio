<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Validate email address
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Set the recipient email
        $to = "youremail@example.com";  // Replace with your email
        $subject = "New message from $name";
        $headers = "From: $email" . "\r\n" .
                   "Reply-To: $email" . "\r\n" .
                   "Content-Type: text/html; charset=UTF-8";

        // Compose the email body
        $body = "<h2>New Contact Form Submission</h2>
                 <p><strong>Name:</strong> $name</p>
                 <p><strong>Email:</strong> $email</p>
                 <p><strong>Message:</strong><br> $message</p>";

        // Send the email
        if (mail($to, $subject, $body, $headers)) {
            echo "Message sent successfully!";
        } else {
            echo "Error sending message. Please try again.";
        }
    } else {
        echo "Invalid email address.";
    }
}
?>
