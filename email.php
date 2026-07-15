<?php
session_start();

if (!isset($_SESSION['login'])){
    echo "<script>
    alert('Login dulu dong');
    document.location.href = 'login.php';
    </script>";
}

$title = "Kirim Email";
include 'layout/header.php';

use PHPMailer\PHPMailer\PHPMailer;
// load composer autoloader
require 'vendor/autoload.php';
// Server Settings
$email->SMTDebug = 2;
$email->issSMTp();
$email->Host = 'smtp.gmail.com';
$email->SMTPAuth = true;
$email->Username = 'user@example.com';
$email->Password = 'secret';
$email->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$email->Port = 465;

if (isset($_POST['kirim'])) {
    // Reciptients
    $email->setForm('tutormubatekno@gmail.com', 'Tutorial Muba Teknologi');
    $email->addAddress($_POST['email_penerima']);
}
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container mt-5">
    <h1><i class="fas fa-envelope"></i> Kirim Email</h1>
    <hr>

    <form action="" method="post">
        <div class="mb-3">
            <label for="email_penerima" class="form-label">Email Penerima</label>
            <input type="text" class="form-control" name="email_penerima" id="email_penerima" placeholder="Email Penerima" required>
        </div>

        <div class="mb-3">
            <label for="subject" class="form-label">Subject</label>
            <input type="number" class="form-control" name="subject" id="subject" placeholder="Subject" required>
        </div>

        <div class="mb-3">
            <label for="pesan" class="form-label">Pesan</label>
            <textarea name="pesan" id="pesan" cols="30" rows="10" class="form-control"></textarea>
        </div>

        <button type="submit" name="kirim" class="btn btn-primary" style="float: right;">
            Kirim
        </button>
    </form>
</div>
  </div>

  <?php include 'layout/footer.php'; ?>
