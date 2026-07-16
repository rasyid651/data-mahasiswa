<?php
session_start();

if (!isset($_SESSION['login'])) {
    echo "<script>
    alert('Login dulu dong');
    document.location.href = 'login.php';
    </script>";
}

// membatasi halaman sesuai user
if ($_SESSION['level'] != 1 and $_SESSION['level'] != 3){
    echo "<script>
    alert('Perhatian anda tidak punya hak akses!');
    document.location.href = 'akun.php';
    </script>";
}

$title = "Daftar Mahasiswa";
include 'layout/header.php';

$data_mahasiswa = select("SELECT * FROM mahasiswa ORDER BY id_mahasiswa DESC");
?>

<div class="content-wrapper">
<section class="content">
<div class="container-fluid">
    <h1> <i class="fa fa-list-ul" style="font-size: 36px;"></i> Data Mahasiswa</h1>
    <hr>
    <a href="tambah-mahasiswa.php" class="btn btn-primary mb-1"> <i class="fas fa-plus"></i> Tambah</a>
    <a href="download-excel-mahasiswa.php" class="btn btn-success mb-1"><i class="fas fa-file-excel"></i> Download Excel</a>
    <a href="download-pdf-mahasiswa.php" class="btn btn-danger mb-1"><i class="fas fa-file-pdf"></i> Download PDF</a>

    <table id="serverside" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Prodi</th>
                <th>Jenis Kelamin</th>
                <th>Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
          
        </tbody>
    </table>
</section>
</div>

<?php include 'layout/footer.php' ?>