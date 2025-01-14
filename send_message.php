<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $message = htmlspecialchars(trim($_POST['message']));

    // Check for empty fields
    if (empty($name) || !$email || empty($message)) {
        header('Location: contact.php?error=1');
        exit();
    }

    // Prepare email
    $to = 'your_email@example.com'; 
    $subject = 'Новое сообщение с сайта PS5 Игры';
    $headers = [
        'From' => $email,
        'Reply-To' => $email,
        'Content-Type' => 'text/html; charset=UTF-8',
    ];
    $body = "<h2>Новое сообщение</h2>
            <p><strong>Имя:</strong> {$name}</p>
            <p><strong>Email:</strong> {$email}</p>
            <p><strong>Сообщение:</strong></p>
            <p>{$message}</p>";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        header('Location: contact.php?success=1');
    } else {
        header('Location: contact.php?error=1');
    }
    exit();
}
