<?php

include "./mvc/core/mail/PHPMailer-master/src/Exception.php";
// include "./mvc/core/mail/PHPMailer-master/src/OAuth.php";
include "./mvc/core/mail/PHPMailer-master/src/PHPMailer.php";
include "./mvc/core/mail/PHPMailer-master/src/POP3.php";
include "./mvc/core/mail/PHPMailer-master/src/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mail {
    public function index() {
        $mail = new PHPMailer(true); 
        // print_r($mail);
        try {
            //Server settings
            $mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'giahuy.mailer@gmail.com';                 // SMTP username
            $mail->Password = 'qbnvmgheeczbgcsz';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to
         
            //Recipients
            $mail->setFrom('giahuy.mailer@gmail.com', 'Tran Gia Huy');

            $mail->addAddress('giahuytran14301@gmail.com', 'Gia Huy Trần');     // Add a recipient
            $mail->addAddress('tonytran0314@gmail.com', 'Tony Tran');     // Add a recipient

            $mail->addCC('giahuy.mailer@gmail.com');
         
            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
         
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'PHPMailer';
            $mail->Body    = 'Xin chào, tôi là Gia Huy';
            // $mail->AltBody = 'Xin chào, tôi là Gia Huy';
         
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }
}
?>