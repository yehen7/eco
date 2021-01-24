<?php


require_once './vendor/autoload.php';
require_once './db/constant.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465,'ssl'))
  ->setUsername(EMAIL)
  ->setPassword(PASSWORD)
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);



function      
sendEmail($email,$nic,$type,$tele,$name){
    
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
        <img src="../assets/pin.png" class="img-fluid">
     </a>
        <h1>You"re Successfully 
        registered to the EcoCycle.</h1>

        <P>Hi '.$name.'</P>
        <P>Now please download  EcoCycle App from playstore to connect with our system.</P>
            <p>If you have any problem conntact on us <a href="Ecocycle@gmail.com"></a></p>
            <p>User name='.$name.'</p>
            <p>NIC='.$nic.'</p>
            <p>Vehicle Type='.$type.'</p>
            <p>Mobile Number='.$tele.'</p>
          
        
        </div>
    </body>
    </html>';

// Create a message
$message = (new Swift_Message('Welcome to EcoCycle'))
->setFrom(EMAIL)
->setTo($email)
->setBody($body,'text/html');
;

// Send the message
$result = $mailer->send($message);

}




?>