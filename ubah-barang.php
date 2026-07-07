<?php 
$title = "Ubah Barang";
include 'layout/header.php';

if (isset($_POST['update'])) {
    if (update_barang($_POST) > 0) {
        echo "<script>
        alert('Data berhasil diubah!');
        document.location.href = 'index.php';
        </script>";
    }else {
        echo "<script>
        alert('Data gagal diubah!');
        document.location.href = 'index.php';
        </script>";
    }
}

// ambil data melalui id_barang
$id_barang = (int)$_GET['id_barang'];
$barang = select("SELECT * FROM barang WHERE id_barang = $id_barang")[0];

?>

<div class="container mt-5">
    <h1>Ubah Data Barang</h1>
    <hr>

    <form method="post">
        <input type="hidden" name="id_barang" value="<?= $barang['id_barang']; ?>">

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Barang"
            value="<?= $barang['nama'] ?>" required>
        </div>

        <div class="mb-3">
            <label for="nama" class="form-label">Jumlah</label>
            <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah Barang" 
            value="<?= $barang['jumlah'] ?>" required>
        </div>
        
        <div class="mb-3">
            <label for="nama" class="form-label">Harga Barang</label>
            <input type="number" class="form-control" name="harga" id="harga" placeholder="Harga Barang" 
            value="<?= $barang['harga'] ?>" required>
        </div>
        <input type="submit" class="btn btn-primary" style="float: right;" value="Simpan" name="update">
    </form>
</div>

<?php include 'layout/footer.php'; ?>