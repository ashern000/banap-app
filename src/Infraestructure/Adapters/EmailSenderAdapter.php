<?php

declare(strict_types=1);

namespace src\Infraestructure\Adapters;

use src\Application\Contracts\EmailSender;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use src\Domain\Entities\User;

final class EmailSenderAdapter implements EmailSender
{
    public function sendEmailWelcome(User $user)
    {
        try{
        $mail = new PHPMailer(true);                     //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'your_email@gmail.com';                     //SMTP username
        $mail->Password   = '';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;
        $mail->setFrom('your_email@gmail.com', 'Mailer');
        $mail->addAddress($user->getEmail(), $user->getName()); 
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Banap te deseja as boas vindas';
        $mail->Body    = 'Ficamos muito felizes que você tenha se cadastrado em nossa plataforma!<br> Garantimos que iremos proporcionar a melhor experiencia para você e sua produção!<br> Abertos a Feedback ;)';
        $mail->send();
    }catch(Exception $e){
        
    }
    }
}
