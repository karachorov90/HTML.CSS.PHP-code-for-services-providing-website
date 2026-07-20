<?php
// 1. Check if the form was actually submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 2. Collect and sanitize form inputs to prevent Cross-Site Scripting (XSS)
    $name    = htmlspecialchars(trim($_POST['name']));
    $email   = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(trim($_POST['message']));

    // 3. Simple backend validation
    if (empty($name) || empty($email) || empty($message)) {
        echo "<p style='color: red;'>Please fill out all fields.</p>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p style='color: red;'>Invalid email format.</p>";
    } else {
        // 4. Process the data (Example: Display success message)
        // You can also insert this data into a database or use mail() to send an email here.
        echo "<p style='color: green;'>Thank you, <strong>$name</strong>! Your form was successfully submitted.</p>";
    }
}
?>