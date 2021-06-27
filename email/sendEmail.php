<?php

///Applications/XAMPP/xamppfiles/etc/php.ini

$to = $_POST['to'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

$success  = mail($to, $subject, $message, $headers);

echo $success;
?>