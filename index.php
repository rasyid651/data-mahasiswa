<?php 
session_start();

// membatasi halaman sebelum login
if (!isset($_SESSION['login'])){
    echo "<script>
    alert('Login dulu dong');
    document.location.href = 'login.php';
    </script>";
}

// membatasi halaman sesuai user
if ($_SESSION['level'] != 1 and $_SESSION['level'] != 2){
    echo "<script>
    alert('Perhatian anda tidak punya hak akses!');
    document.location.href = 'crud-modal.php';
    </script>";
}

$title = "Daftar Barang";
include 'layout/header.php';

$data_barang = select("SELECT * FROM barang ORDER BY id_barang DESC");
?>

<div class="container mt-5">
        <h1><i class='fas fa-clipboard-list' style='font-size:36px'></i> Data Barang</h1>
        <hr>
        <a href="tambah-barang.php" class="btn btn-primary mb-1"><i class="fa-solid fa-circle-plus"></i> Tambah</a>
        <table id="example" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($data_barang as $barang) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $barang["nama"] ?></td>
                    <td><?= $barang["jumlah"] ?></td>
                    <!-- format rupiah -->
                    <td>Rp<?= number_format($barang["harga"],0,',','.')  ?></td>
                    <!-- format tanggal indoenesia -->
                    <td><?= date("d/m/Y | H:i:s", strtotime($barang["tanggal"])); ?></td>
                    <td width="15%" class="text-center">
                        <a href="ubah-barang.php?id_barang=<?= $barang['id_barang']; ?>" class="btn btn-primary">Ubah</a>
                        <a href="hapus-barang.php?id_barang=<?= $barang['id_barang']; ?>" class="btn btn-danger"
                         onclick="return confirm('Yakin ingin menghapus barang?');">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?php include 'layout/footer.php'; ?>