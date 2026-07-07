<?php
include 'config/app.php';

// mengambil id mahasiswa
$id_mahasiswa = (int)$_GET['id_mahasiswa'];

if (delete_mahasiswa($id_mahasiswa) > 0) {
    echo "<script>
        alert('Data berhasil dihapus!');
        document.location.href = 'mahasiswa.php';
        </script>";
} else {
    echo "<script>
        alert('Data gagal dihapus!');
        document.location.href = 'mahasiswa.php';
        </script>";
}

?>