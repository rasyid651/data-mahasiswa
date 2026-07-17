<?php
session_start();

if (!isset($_SESSION['login'])){
    echo "<script>
    alert('Login dulu dong');
    document.location.href = 'login.php';
    </script>";
}

$title = "Tambah Mahasiswa";
include 'layout/header.php';

if (isset($_POST['tambah'])) {
    if (create_mahasiswa($_POST) > 0) {
        echo "<script>
        alert('Data berhasil ditambahkan!');
        document.location.href = 'mahasiswa.php';
        </script>";
    } else {
        echo "<script>
        alert('Data gagal ditambahkan!');
        document.location.href = 'mahasiswa.php';
        </script>";
    }
}

?>

<div class="content-wrapper pt-2">
<section class="content">
<div class="container-fluid">
    <h1>Tambah Data Mahasiswa</h1>
    <hr>

    <form action="tambah-mahasiswa.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Mahasiswa</label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Siswa" required>
        </div>

        <div class="row">
            <div class="mb-3 col-6">
                <label for="prodi" class="form-label">Program Studi</label>
                <select name="prodi" id="prodi" class="form-control" required>
                    <option value=""> -- pilih Prodi --</option>
                    <option value="Teknik Informatika">Teknik Informatika</option>
                    <option value="Teknik Mesin">Teknik Mesin</option>
                    <option value="Teknik Listrik">Teknik Listrik</option>
                </select>
            </div>

            <div class="mb-3 col-6">
                <label for="jk" class="form-label">Jenis Kelamin</label>
                <select name="jk" id="jk" class="form-control" required>
                    <option value="">-- Jenis Kelamin --</option>
                    <option value="laki-laki">Laki-Laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>
            </div>
        </div>

        <div class="mb-3">
            <label for="telepon" class="form-label">Telepon</label>
            <input type="number" class="form-control" name="telepon" id="telepon" placeholder="Telepon" required>
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" id="alamat"></textarea>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" class="form-control" name="foto" id="foto">
        </div>

        <button type="submit" name="tambah" class="btn btn-primary" style="float: right;">
            <i class="fa fa-plus" style="font-size:14px"></i> Tambah
        </button>
    </form>
</div>
</section>
</div>

<?php include 'layout/footer.php'; ?>