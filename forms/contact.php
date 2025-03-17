<?php
// Allow CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

// Your Email Address
$to = "vaidikadharmam108@gmail.com";

// Getting Form Data
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$subject = $_POST['subject'] ?? '';
$message = $_POST['message'] ?? '';

if (empty($name) || empty($email) || empty($subject) || empty($message)) {
  echo 'Please fill all the fields!';
  exit;
}

// Email Body
$body = "Name: $name\nEmail: $email\nSubject: $subject\n\n$message";

// Email Headers
$headers = "From: $email\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// Send Mail
if (mail($to, $subject, $body, $headers)) {
  echo 'OK';
} else {
  echo 'Failed to send email!';
}
