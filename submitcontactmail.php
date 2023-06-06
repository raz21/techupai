<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
//require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'ucmpt0002@gmail.com';                     //SMTP username
    $mail->Password   = 'Pass$123';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('ucmpt0002@gmail.com', 'Mailer');
    $mail->addAddress('rbsaroj@gmail.com', 'Joe User');     //Add a recipient
    $mail->addAddress('raju21@gmail.com');               //Name is optional
    $mail->addReplyTo('rbsarojtest@gmail.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    $subject = " Contacts Details for ".$_REQUEST['mobile'];
    $msgbody = "First Name : " .$_REQUEST['first_name'] ."<br>"; 
    $msgbody .= "Last Name : " .$_REQUEST['last_name']."<br>"; 
    $msgbody .= "Email : " .$_REQUEST['email']."<br>";
    $msgbody .= "Phone : " .$_REQUEST['phone']."<br>";
    $msgbody .= "comments : " .$_REQUEST['comments']."<br>";


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $msgbody;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}