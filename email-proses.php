<?php
use PHPMailer\PHPMailer\PHPMailer;      
use PHPMailer\PHPMailer\Exception;

// load composer autoloader
require 'vendor/autoload.php';


// create object phpmailer
$email = new PHPMailer(true);

// Server Settings
$email->SMTPDebug = 0; //Enable verbose debug output
$email->isSMTP(); //Send using SMTP
$email->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
$email->SMTPAuth = true; //Enable SMTP authentication
$email->Username = 'muhammadalrasyid789@gmail.com'; //SMTP username
$email->Password = 'fzyvpzfvxmojoali'; //SMTP password
$email->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
$email->Port = 465;

if (isset($_POST['kirim'])) {
    // Reciptients
    $email->setFrom('muhammadalrasyid789@gmail.com', 'Rasyid anak telkom');
    $email->addAddress($_POST['email_penerima']);
    $email->addReplyTo('muhammadalrasyid789@gmail.com', 'Rasyid anak telkom');

    $email->isHTML(true);
    $email->Subject = $_POST['subject'];
    $email->Body = $_POST['pesan'];

    if ($email->send()) {
        echo "<script>
        alert('Email berhasil dikirimkan!');
        document.location.href = 'email.php';
        </script>";
    }else {
        echo "<script>
        alert('Email gagal dikirimkan!');
        document.location.href = 'email.php';
        </script>";
    }
}
exit();
?>