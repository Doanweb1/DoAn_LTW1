<?php

define('EMAIL','');
define('PASSWORD','');
require('vendor/autoload.php');

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465,'ssl'))
    ->setUsername(EMAIL)
    ->setPassword(PASSWORD);
;

// Create the Mailer using your created Transport
    $mailer = new Swift_Mailer($transport);

function sendVerificationEmail($userEmail,$token)
{
        global $mailer;
        $body='<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verify Email .div.wrapp</title>
</head>
<body>
        <div class="wrapper">
        <p>Thank you sign up on our website . Please click on the link below to verify your email !!!.
        </p>
            <a href="http://localhost:4433/.../MainAppp.php?token= '.$token.'"></a>
            Verify Your Email Adress
        </div>
</body>
</html>';
         // Create a message
        $message = (new Swift_Message('Verify your mail address'))
            ->setFrom(EMAIL)
            ->setTo($userEmail)
            ->setBody($body,'text/html');
        
        // Send the message
        $result = $mailer->send ($message);
       // var_dump($result);
}
function  senPasswordResetLink($userEmail, $token){
    global $mailer;
    $body='<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verify Email .div.wrapp</title>
</head>
<body>
        <div class="wrapper">
        <p>Hello there,
            Please click on the link  below to reset your password. 
        
        reset password here!!!
        </p>
            <a href="http://localhost:4433/...../MainApp.php?password-token= '.$token.'"></a>
                    reset your password here!!!
                    </div>
</body>
</html>';
    // Create a message
    $message = (new Swift_Message('Reset Your Password'))
        ->setFrom(EMAIL)
        ->setTo($userEmail  )
        ->setBody($body,'text/html');
    ;
    // Send the message
    $result = $mailer->send ($message);
}
