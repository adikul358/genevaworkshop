<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require $_SERVER['DOCUMENT_ROOT'] . '\PHPMailer\src\Exception.php';
require $_SERVER['DOCUMENT_ROOT'] . '\PHPMailer\src\PHPMailer.php';
require $_SERVER['DOCUMENT_ROOT'] . '\PHPMailer\src\SMTP.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;
    $mail->isSMTP();
    $mail->Host = 'smtp.hostinger.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'registrations@heisenbergscorner.org';
    $mail->Password = 'Bs_02010021';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    //Recipients
    $mail->setFrom('registrations@heisenbergscorner.org', 'Kanona');
    $mail->addAddress('adi.kul358@gmail.com','Aditya Kulshrestha');            
    $mail->addReplyTo('adi.kul358@gmail.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo '<br><h1>Message has been sent</h1>';
} catch (Exception $e) {
    echo '<h1>Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?>