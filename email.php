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
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container mt-5">
    <h1><i class="fas fa-envelope"></i> Kirim Email</h1>
    <hr>

    <form action="email-proses.php" method="post">
        <div class="mb-3">
            <label for="email_penerima" class="form-label">Email Penerima</label>
            <input type="text" class="form-control" name="email_penerima" id="email_penerima" placeholder="Email Penerima" required>
        </div>

        <div class="mb-3">
            <label for="subject" class="form-label">Subject</label>
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
        </div>

        <div class="mb-3">
            <label for="pesan" class="form-label">Pesan</label>
            <textarea name="pesan" id="pesan" cols="30" rows="10" class="form-control" required></textarea>
        </div>

        <button type="submit" name="kirim" class="btn btn-primary" style="float: right;">
            Kirim
        </button>
    </form>
</div>
  </div>

  <?php include 'layout/footer.php'; ?>
