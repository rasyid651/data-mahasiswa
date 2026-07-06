<?php 
include 'layout/header.php';

if (isset($_POST['tambah'])) {
    if (create_barang($_POST) > 0) {
        echo "<script>
        alert('Data berhasil ditambahkan!');
        document.location.href = 'index.php';
        </script>";
    }else {
        echo "<script>
        alert('Data gagal ditambahkan!');
        document.location.href = 'index.php';
        </script>";
    }
}
?>

<div class="container mt-5">
    <h1>Tambah Data Barang</h1>
    <hr>

    <form action="tambah-barang.php" method="post">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Barang" required>
        </div>

        <div class="mb-3">
            <label for="nama" class="form-label">Jumlah</label>
            <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah Barang" required>
        </div>
        
        <div class="mb-3">
            <label for="nama" class="form-label">Harga Barang</label>
            <input type="number" class="form-control" name="harga" id="harga" placeholder="Harga Barang" required>
        </div>
        <input type="submit" class="btn btn-primary" style="float: right;" value="Simpan" name="tambah">
    </form>
</div>

<?php include 'layout/footer.php'; ?>