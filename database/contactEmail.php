<?php


require_once './vendor/autoload.php';
require_once './database/constant.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465,'ssl'))
  ->setUsername(EMAIL)
  ->setPassword(PASSWORD)
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);



function sendEmail($email,$name){
    
    global $mailer;
    $body='<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bill </title>
    </head>
    <body>
        <div class="wrapper">
     
            <p>Thank you  MR/MRS'.$name.' for your feedback.</p>
          
        </div>
    </body>
    </html>';

// Create a message
$message = (new Swift_Message('Thank you for your feedback'))
->setFrom(EMAIL)
->setTo($email)
->setBody($body,'text/html');
;

// Send the message
$result = $mailer->send($message);

}




?>