<?php

require "../PHPMailer/PHPMailerAutoload.php";

$mail = new PHPMailer;

// sending emails via mail.amvara.de
$mail->isSMTP();
$mail->Host = "mail.amvara.de";
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->Username = "tec_dev@amvara.de";
$mail->Password = "PoHEqbH9dszX7LPHhwoG";    
$mail->SMTPOptions = ['ssl'=> ['allow_self_signed' => true]];

$to = "tec_dev@amvara.de";

$name = $_POST['name'];
$from = $_POST['email'];
$title = $_POST['subject'];
$message = nl2br($_POST['message']);

// echo $name . "<br>" . $from . "<br>" . $title . "<br>" . $message;

$mail->From = "tec_dev@amvara.de";
$mail->addAddress($to);
$mail->Subject = "[COMETA WEBSITE] ". $title;
$mail->isHtml(TRUE);
$mail->Body = "Message sent from: $from<br>$name sends his message from cometa.amvara.consulting: <br> $message";
$mail->CharSet = 'UTF-8';
if(!$mail->send()) {
    echo 'Message was not sent.';
    echo 'Mailer error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent.';
}

?>