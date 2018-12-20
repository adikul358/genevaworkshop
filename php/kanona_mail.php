<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require $_SERVER['DOCUMENT_ROOT'] . '/PHPMailer/src/Exception.php';
require $_SERVER['DOCUMENT_ROOT'] . '/PHPMailer/src/PHPMailer.php';
require $_SERVER['DOCUMENT_ROOT'] . '/PHPMailer/src/SMTP.php';

function kanona_mail($credentials, $content) {
    // |-- credentials 
    // |   |-- username
    // |   |-- recipents
    // |       |-- recipent1
    // |       |   |-- email
    // |       |   |-- name
    // |       |-- recipent2
    // |       |   |-- email
    // |       |   |-- name
    // |       |-- ...
    // |-- content
    //     |-- subject
    //     |-- HTML_body
    //     |-- body
    //     |-- attachments (optional)
    //         |-- attachment1
    //         |   |-- path
    //         |   |-- name    
    //         |-- attachment2
    //         |   |-- path
    //         |   |-- name
    //         |-- ...    

    $mail = new PHPMailer(true);
    $mail->Debugoutput = 'error_log';
    try {
        $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->Host = 'smtp.hostinger.com';
        $mail->SMTPAuth = true;
        $mail->Username = $credentials['username'];
        $mail->Password = 'Bs_02010021';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom($credentials['username'], 'Kanona');
        foreach ($credentials['recipents'] as $recipent) { 
            $mail->addAddress($recipent['email'], $recipent['name']); 
        }
        
        $mail->addReplyTo('adi.kul358@gmail.com', 'help');
        if(array_key_exists('attachments', $content)) {
            foreach ($content['attachments'] as $attachment) {
                $mail->addAttachment($attachment['path'], $attachment['name']); 
            }
        }
        $mail->isHTML(true);
        $mail->Subject = $content['subject'];
        $mail->Body    = $content['HTML_body'];
        $mail->AltBody = $content['body'];

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

?>