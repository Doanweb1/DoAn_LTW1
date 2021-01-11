<?php
define('EMAIL','xuannam2512@gmail.com');
define('PASSWORD','frhojmxzxlfbesar');
require_once 'vendor/autoload.php';
// require_once 'database/configuration.php';
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
        <p>Thank ................... for you
        </p>
            <a href="duonglinkdentrangchu local...../index.php?token= '.$token.'"></a>
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

        <p>Hello there,
        Please click on the link  below to reset your password. 

        reset password here!!!

        http://localhost:8080/DoAn/MainApp.php?password-token= '.$token.' 

        </p>

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
