<?php
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

?>