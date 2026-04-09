<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // For now, just save to a file. In production, use a database.
        $file = 'emails.txt';
        $current = file_get_contents($file);
        $current .= $email . "\n";
        file_put_contents($file, $current);
        echo "Thank you! Your email has been submitted.";
    } else {
        echo "Invalid email address.";
    }
} else {
    echo "No data submitted.";
}
?>
