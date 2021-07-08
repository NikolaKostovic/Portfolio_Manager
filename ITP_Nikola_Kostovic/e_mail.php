<?php
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;

$mail = new PHPMailer();
$mail->isSMTP();

$mail->Host = 'smtp.mailtrap.io';
$mail->SMTPAuth = true;
$mail->Username = '085bed6bbcdb6b';
$mail->Password = 'fedce3bbb825ff';
$mail->SMTPSecure = 'tls';
$mail->Port = 2525;
?>

