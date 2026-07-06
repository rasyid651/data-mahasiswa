<?php
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

<div class="container mt-5">
    <h1>Tambah Data Barang</h1>
    <hr>

    <form action="tambah-barang.php" method="post">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Mahasiswa</label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Siswa" required>
        </div>

        <div class="row">
            <div class="mb-3 col-6">
                <label for="prodi" class="form-label">Program Studi</label>
                <select name="prodi" id="prodi" class="form-control" required>
                    <option value=""> -- pilih prodi --< /option>
                    <option value="Teknik Informatika">Teknik Informatika</option>
                    <option value="Teknik Mesin">Teknik Mesin</option>
                    <option value="Teknik Listrik">Teknik Listrik</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="nama" class="form-label">Harga Barang</label>
                <input type="number" class="form-control" name="harga" id="harga" placeholder="Harga Barang" required>
            </div>
            <input type="submit" class="btn btn-primary" style="float: right;" value="Simpan" name="tambah">
    </form>
</div>

<?php include 'layout/footer.php'; ?>