<?php declare(strict_types=1);
session_start();
require __DIR__ . './../vendor/autoload.php';

use Twilio\Rest\Client;

$email = 'phamhuyhoang02.06.2000@gmail.com';// $_POST['email'];
$password = 'huyhoang';//$_POST['password'];

// validate the email address and password
// then store in the database for later processing with a not verified flag

// create a new Twilio Rest Client
$client = new Client(
   getenv('TWILIO_ACCOUNT_SID'),
   getenv('TWILIO_AUTH_TOKEN')
);

// send the verification request to the Twilio API
$verification = $client->verify
   ->v2
   // service id of the verification service we created
   ->services("<YOUR TWILIO VERIFY SERVICE SID>")
   ->verifications
   ->create($email, "email", [
           'channelConfiguration' => [
               'substitutions' => [
                   'email_address' => $email,
               ]
           ],
       ]
   );

// store the email address in the session for use when the verify link is clicked
$_SESSION['email_address_verify'] = $email;
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <title>Register for Pied Piper</title>
   <style>
       html, body {
           height: 100%;
           width: 100%;
       }

       body, body {
           display: flex;
       }

       h1 {
           margin: auto;
       }
   </style>
</head>
<body>
<h1>Thanks for registering, check your email to complete registration.</h1>
</body>
</html>