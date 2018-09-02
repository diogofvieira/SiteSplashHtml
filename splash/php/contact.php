<?php

require('class.phpmailer.php');
$mail = new PHPMailer();
// Only process POST reqeusts.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form fields and remove whitespace.
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $phone = strip_tags(trim($_POST["phone"]));
    $message = trim($_POST["message"]);

    // ================================================================================
    // =================== Update this to your desired email address. =================
    // ================================================================================
    $recipient = "contato@splash.com";
    // Set the email subject.
    $subject = "Nova mensagem de $name";

    $mail->FromName  = "De: $name <$email>";
    /*$mail->setFrom('mail@example.com', 'example.com');*/ // mailbox created on a server.
    $mail->Subject   = $subject;
    $mail->isHTML(true); 
    $mail->Body    = "<b>Informações do contato.</b><br>"
    ."<p>Nome: ".$name."</p>"
    ."<p>Email: ".$email."</p>"
    ."<p>Telefone: ".$phone."</p>"
    ."<p>Mensagem: ".$message."</p>";
    $mail->AddAddress( $recipient ); 
    $mail->CharSet = "UTF-8";

    $mail->Send();
} 
?>