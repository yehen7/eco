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



function      
sendEmail($email,$total,$payment,$cvv,$address,$name){
    
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
        <a class="navbar-brand"  style="max-width: 3%;  ">
        <img src="https://drive.google.com/file/d/1ZtgvvLldY5sJhkO3ToG1JOZ5h8EIW9CQ/view?usp=sharing" class="img-fluid">
     </a>
        <h1>You Payment was Successful!</h1>

        <P>Hi '.$name.'</P>
        <P>Payment for your order is confirmed.we wil let you know when your order ships.</P>
            <p>Thank you to shopping  with our website.</p>
            <p>User name='.$name.'</p>
            <p>Card Type='.$payment.'</p>
            <p>Payment='.$total.'</p>
            <p>Shipping Address='.$address.'</p>
          
        
        </div>
    </body>
    </html>';

// Create a message
$message = (new Swift_Message('Thank you'))
->setFrom(EMAIL)
->setTo($email)
->setBody($body,'text/html');
;

// Send the message
$result = $mailer->send($message);

}




?>