<?php
session_start();

if (!isset($_SESSION['login'])) {
    echo "<script>
    alert('Login dulu dong');
    document.location.href = 'login.php';
    </script>";
}

include 'config/app.php';

// mengambil id barang
$id_akun = (int)$_GET['id_akun'];

if (delete_akun($id_akun) > 0) {
    echo "<script>
        alert('Akun berhasil dihapus!');
        document.location.href = 'crud-modal.php';
        </script>";
} else {
    echo "<script>
        alert('Akun gagal dihapus!');
        document.location.href = 'crud-modal.php';
        </script>";
}
