<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Collect and sanitize form data
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $name = htmlspecialchars($_POST['name']);
  $message = htmlspecialchars($_POST['message']);

  $to = "holly.k.mchugh@gmail.com";
  // Set the email subject
  $subject = "Website Contact Form";
  // Construct the email body
  $body = "You have received a new message from the contact form.\n\n";
  $body .= "Email: $email\n";
  $body .= "Name: $name\n";
  $body .= "Message:\n$message\n";
  // Set the email headers
  $headers = "From: noreply.holly.website@gmail.com";

  // Send the email
  if (mail($to, $subject, $body, $headers)) {
    echo "Message sent successfully.";
  } else {
    echo "Failed to send message.";
  }
} else {
  echo "Invalid request.";
}
?>
