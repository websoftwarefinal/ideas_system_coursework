<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once __DIR__ . './../vendor/autoload.php'; // Adjust the path as needed

class SendEmail{
    public static function send($subject, $body, $email_to){
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'websoftwaredevelopmetfinalyear@gmail.com';
        $mail->Password = 'zkef jsrb shvx hnio';
        $mail->SMTPSecure = 'ssl'; // Enable TLS encryption, 'ssl' also accepted
        $mail->Port = 465;

        $mail->setFrom('noreply@ewsd.com', 'Enterprise Web Software Development');
        $mail->addAddress($email_to, '');
        $mail->IsHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $body;

        try {
            $mail->send();
            echo 'Email has been sent successfully';
        } catch (Exception $e) {
            echo 'Email could not be sent. Error: ', $mail->ErrorInfo;
        }
    }
}