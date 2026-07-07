<?php
$title = "Daftar Akun";
include 'layout/header.php';

$data_akun = select("SELECT * FROM akun");
if (isset($_POST['tambah']) > 0) {
    if (create_akun($_POST) > 0) {
        echo "<script>
        alert('Berhasil menambahkan akun!');
        document.location.href = 'crud-modal.php';
        </script>";
    } else {
        echo "<script>
        alert('Gagal menambahkan akun!);
        document.location.href = 'crud-modal.php';
        </script>";
    }
}

if (isset($_POST['edit']) > 0) {
    if (update_akun($_POST) > 0) {
        echo "<script>
        alert('Berhasil mengedit akun!');
        document.location.href = 'crud-modal.php';
        </script>";
    } else {
        echo "<script>
        alert('Gagal mengedit akun!);
        document.location.href = 'crud-modal.php';
        </script>";
    }
}
?>

<div class="container mt-5">
    <h1><i class='fas fa-clipboard-list' style='font-size:36px'></i> Data Akun</h1>
    <hr>

    <!-- Button modal -->
    <button type="button" class="btn btn-primary mb-1" data-bs-toggle="modal" data-bs-target="#modalTambah">
        Tambah
    </button>

    <table id="example" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Email</th>
                <th>Password</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($data_akun as $akun): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $akun['nama'] ?></td>
                    <td><?= $akun['username'] ?></td>
                    <td><?= $akun['email'] ?></td>
                    <td><?= $akun['password'] ?></td>
                    <td class="text-center">
                        <button type="button" class="btn btn-primary mb-1" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $akun['id_akun']; ?>">
                            Ubah
                        </button><button type="button" class="btn btn-danger mb-1" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $akun['id_akun']; ?>">
                            Hapus
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Modal tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Akun</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post">

                    <div class="mb-3">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="passowrd">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required
                            minlength="4">
                    </div>

                    <div class="mb-3">
                        <label for="level">Level</label>
                        <select name="level" id="level" class="form-control" required>
                            <option value="">-- Pilih level --</option>
                            <option value="1">Admin</option>
                            <option value="2">Operator</option>
                        </select>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- modal hapus -->
<?php foreach ($data_akun as $akun) : ?>
    <div class="modal fade" id="modalHapus<?= $akun['id_akun']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Akun</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Yakin ingin menghapus akun : <b><?= $akun['nama']; ?></b> ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <a href="hapus-akun.php?id_akun=<?= $akun['id_akun']; ?>" type="submit" name="tambah" class="btn btn-danger">Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- modal edit -->
<?php foreach ($data_akun as $akun) : ?>
    <div class="modal fade" id="modalUbah<?= $akun['id_akun'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Akun</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <input type="hidden" name="id_akun" value="<?= $akun['id_akun'] ?>">
                        <div class="mb-3">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control"
                                value="<?= $akun['nama']; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control"
                                value="<?= $akun['username']; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control"
                                value="<?= $akun['email']; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="passowrd">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required
                                value="<?= $akun['password']; ?>" minlength="4">
                        </div>

                        <div class="mb-3">
                            <label for="level">Level</label>
                            <select name="level" id="level" class="form-control" required>
                                <?php $level = $akun['level'] ?>
                                <option value="1" <?= $level == '1' ? 'selected' : null ?>>Admin</option>
                                <option value="2" <?= $level == '2' ? 'selected' : null ?>>Operator</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" name="edit" class="btn btn-primary">Ubah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php endforeach; ?>

<?php include 'layout/footer.php'; ?>