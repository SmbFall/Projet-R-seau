<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; 

$mail = new PHPMailer(true);
try {
    // Paramètres du serveur SMTP
    $mail->isSMTP();
    $mail->Host       = 'mail.smarttech.sn';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'postmaster@smarttech.sn';  // compte mail de notification
    $mail->Password   = 'root';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;  // Port de soumission

    // Destinataires
    $mail->setFrom('notification@smarttech.local', 'Smarttech Notifications');
    $mail->addAddress('utilisateur@example.com', 'Nom Utilisateur');

    // Contenu de l'email
    $mail->isHTML(true);
    $mail->Subject = 'Notification de Smarttech';
    $mail->Body    = 'Bonjour, voici une notification depuis le serveur iRedMail de Smarttech.';
    $mail->AltBody = 'Bonjour, voici une notification depuis le serveur iRedMail de Smarttech.';

    $mail->send();
    echo 'Le message a été envoyé';
} catch (Exception $e) {
    echo "Erreur lors de l'envoi : {$mail->ErrorInfo}";
}
?>
